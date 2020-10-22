<?php

namespace App\Http\Controllers\UserAuth\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Model\User\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailNotify;
use App\Mail\PasswordReset;
use App\Model\User\PassReset;
use Hash;
use Mail;
use App\Model\User\Social;
use Carbon\Carbon;


class AuthController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepository;

    // public function __construct(PostEloquentRepository $postRepository)
    // {
    //     $this->postRepository = $postRepository;
    // }

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        //$label = "danger";
        //return view('v1.member.auth.login', compact('label'));
        return view('v1.member.auth.login');
    }

    public function postLogin(Request $request)
    {

      try {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32',   
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu có tối đa 32 kí tự',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, ]))
        {
          if (!Auth::user()->is_active) {
            $label = "danger";
            return redirect()->back()
                             ->with('label', $label)
                             ->with('notify','Tài khoản của bạn đã vô hiệu hóa.');
          }
          return redirect('');
        }
        else{
          $label = "danger";
          //dd($label);
          return redirect()->back()
                           ->with('label', $label)
                           ->with('notify','Email or password is incorrect');
        }
      } catch (Exception $e) {
        dd("Error");
          Log::debug($e);
          return back()->withErrors('Error');
      }

      //return redirect()->back()->with('notification','Add successful');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getRegister()
    {
      // $users = $this->userRepository->getAll();
      return view('v1.member.auth.register');
    }

    public function postRegister(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password'=>'required|min:5|max:32',
        're_password' => 'required|same:password'
          
      ],
      [
        'name.required'=>'* Please input your name',
        'email.required'=>'* Please input your email',
        'email.unique'=>'* Email had exist',
        'password.required'=>'* Please input password',
        'password.min'=>'* Password is 5 character minimum',
        'password.max'=>'* Password is 32 character maximum',
        're_password.required' =>'* Please input password again',
        're_password.same' =>'* Password again is not same',
      ]);

      $confirmation_code = time().uniqid(true);

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->role = 0;
      $user->confirmation_code = $confirmation_code;
      $user->password = bcrypt($request->password); //rand_string(6);
      $user->save();

      //Mail::to($user)->send(new UserVerify($user, $confirmation_code));
      
      
      Mail::to($user)->send(new MailNotify($user, $confirmation_code));
 
      if (Mail::failures()) {
        $notify = 'Sorry! Please try again latter';
        $label = 'danger';
      }else{
        $notify = 'Register successfully. Please check mail to verify your account';
        $label = 'success';
      }

      return redirect()->back()
                       ->with('notify', $notify)
                       ->with('label', $label);

    }
    
    public function getConfirm($code)
    {
      $user = User::where('confirmation_code', $code);
      if ($user->count() > 0) {
          $user->update([
              'confirmation_code' => null,
              'email_verified_at' => now()
          ]);
          $notify = 'Verify successfully';
          $label = 'success';
      } else {
          $notify ='Verify fail';
          $label = 'danger';
      }
      return redirect('login')->with('notify', $notify)->with('label', $label);
 
    }
    
    public function getResetPass()
    {
      return view('v1.member.auth.resetpass');
    }

    public function postResetPass(Request $req)
    {
      $this->validate($req,[
              'email' => 'required',           
          ],
          [
              'email.required'=>'* Please input your email',
          ]);

      $new_pass = rand_string(10);
      $token = Hash::make($new_pass);

      $user = User::where('email',$req->email)->first();
      if ($user) {
        $passreset = new PassReset;
        $passreset->email = $req->email;
        $passreset->token = $token;
        $passreset->save();

        Mail::to($user)->send(new PasswordReset($user, $new_pass));
        return redirect()->back()->with('notify','Please check mail to get password')
                                 ->with('label','success');

      } else {
        return redirect('resetpass')->with('notify','Email is not exist. Please register')
                                    ->with('label','danger');
      }
        
    }

    public function getNewPass($new_password)
    {
      $pass_resets = PassReset::all();
      foreach ($pass_resets as $key => $val) {
        if(Hash::check($new_password, $val->token)){
          $email = $val->email;
          return view('v1.member.auth.newpass',compact('new_password','email'));
        } else {

        }
      }
      $notify = "Đường dẫn không đúng!";
      $label = "danger";
      return redirect('login')->with('notify', $notify)->with('label', $label);
    }

    public function postNewPass($new_password, Request $request)
    {
      $this->validate($request,[
        'password'=>'required|min:5|max:32',
        're_password' => 'required|same:password'         
      ],
      [
        'password.required'=>'* Please input password',
        'password.min'=>'* Password is 5 character minimum',
        'password.max'=>'* Password is 32 character maximum',
        're_password.required' =>'* Please input password again',
        're_password.same' =>'* Password again is not same',
      ]);

      $user = User::where('email',$request->email)->first();
      $user->password = bcrypt($request->password);
      $user->save();

      $token = PassReset::where('email',$request->email)->first();
      $token->delete();

      return redirect('login')->with('notify','Changed password successfully. Please login to page');      
    }

    public function getLoginZalo(Request $req)
    {
      $uid = $req->uid;
      $code = $req->code;
      $state = $req->state;
      $scope = $req->scope;
      
      $client = new \GuzzleHttp\Client();
      $response = $client->request('GET', 'https://oauth.zaloapp.com/v3/access_token?app_id=37451824035019569&app_secret=01u2owO24P7Y6GyVEoui&code='.$code);

      if ($response->getStatusCode() == 200) {
        $body = $response->getBody();
        $res = ""; $res1 = "";
        while (!$body->eof()) {
          $res = $res.$body->read(2048);
        }
        $res = json_decode($res);
        //dd(isset($res->error_name));
        if ( isset($res->error_name) ) {
          return redirect('login')->with('notify', 'Lỗi của hệ thống không phải của bạn. Vui lòng đăng nhập bằng cách khác giúp admin nha')->with('label','danger');
        }

        //dd(isset($res->error_name));

        $user_token = $res->access_token;
        //dd($user_token);

        // Gọi Api lấy user sau khi có token
        $client1 = new \GuzzleHttp\Client();
        $response1 = $client1->request('GET', 'https://graph.zalo.me/v2.0/me?access_token='.$user_token.'&fields=id,birthday,name,gender,picture');
          // Kiểm tra có phản hồi không
        if ($response1->getStatusCode() == 200) {
          $body1 = $response1->getBody();
          //dd($response1);
          while (!$body1->eof()) {
            $res1 = $res1.$body1->read(2048);
          }
          $res1 = json_decode($res1);

          //dd($res1);

          $check_user = query_user("zalo", $res1->id);

          if( ! is_exist_social_user($check_user) ){
            $user = new User;
            $user->name = $res1->name;
            $user->email = "zalo@zalo".strTimeNow();
            $user->phone = 0;
            $user->role = 0;
            $user->is_social = 1;
            $user->avata = $res1->picture->data->url;
            $user->confirmation_code = null;
            $user->password = bcrypt("zalo"); //rand_string(6);
            $user->save();


            $dt_birthday = Carbon::createFromFormat('d/m/Y', $res1->birthday);
            $social_user = new Social;
            $social_user->name = $res1->name;
            $social_user->social_name = "zalo";
            $social_user->social_id = $res1->id;
            $social_user->user_id = $user->id;
            $social_user->birthday = $dt_birthday;
            //Carbon::parse()->format('d/M/Y');
            $social_user->gender = $res1->gender;
            $social_user->picture = $res1->picture->data->url;

            
            $social_user->save();

            if( Auth::loginUsingId($user->id) )
            {
              return redirect('');
            }
          }

          if(Auth::loginUsingId($check_user->user->id) )
          {
            return redirect('');
          }
        }
        
      }
      else{
        return redirect('login')->with('notify', 'Lỗi của hệ thống không phải của bạn. Vui lòng đăng nhập bằng cách khác giúp admin nha')->with('label','danger');
      }
      
    }

  

    //Test 
    public function getLoginZalo1()
    {
      $str = "18/01/1994";
      
      $a = Carbon::createFromFormat('d/m/Y', $str);
      $formatted_date = $a->format('Y-m-d');

      dd(gettype($formatted_date));

      $d = new Date($str);


      $formatted_date = $d->format('Y-m-d'); // 2003-10-16

      dd($formatted_date);

      //dd(date('Y-m-d',) );
      
     



    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        return view('home.post', compact('post'));
    }


    
}
