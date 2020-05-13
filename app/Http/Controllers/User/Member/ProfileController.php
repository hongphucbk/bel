<?php

namespace App\Http\Controllers\User\Member;

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

class ProfileController extends Controller
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

	public function getIndex($id)
	{
		$user = User::find($id);
		return view('v1.member.profile.index', compact('user'));

	}

	public function postEditInfor($id, Request $request)
    {
      try {
        $user = User::find($id);
        $input = $request->only('name', 'email', 'phone');
        $input['password'] = $user->password;

        if ($request->changePassword == "on") {
          $this->validate($request,[
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
          ],
          [
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu có tối đa 32 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
          ]);
            $input['password'] = bcrypt($request->password);
        } else {
            
        }
        //$input['user_id'] = 1;
        
        $this->userRepository->update($id, $input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notify','Edit successful')
      												 ->with('label','success');
    }
    
  
}
