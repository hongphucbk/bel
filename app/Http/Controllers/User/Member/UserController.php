<?php

namespace App\Http\Controllers\User\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Model\User\User;
use Illuminate\Support\Facades\Auth;
use Cookie;

class UserController extends Controller
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
    public function getList()
    {
      $user_name = Cookie::get('user_name');
      $user_email = Cookie::get('user_email');
      $query = User::where('id', '>', 0);
      if (!empty($user_name)) {
        $query = $query->where('name','LIKE', '%'.$user_name.'%');
      }

      if (!empty($user_email)) {
        $query = $query->where('email','LIKE', '%'.$user_email.'%');
      }

      $insts = $query->paginate(10);
      $oldData = ['user_name' => $user_name,
                  'user_email' => $user_email,
                 ];
      return view('v1.member.user.list', compact('insts', 'oldData'));

        // $users = $this->userRepository->getUserAsAuth();
        // return view('v1.member.user.list', compact('users'));
    }

    public function postList(Request $req){
      $user_name = $req->user_name; Cookie::queue('user_name', $user_name, 20);
      $user_email = $req->user_email; Cookie::queue('user_email', $user_email, 20);
      $page = Cookie::get('page');
      
      $query = User::where('id', '>', 0);
      if (!empty($user_name)) {
        $query = $query->where('name','LIKE', '%'.$user_name.'%');
      }

      if (!empty($user_email)) {
        $query = $query->where('email','LIKE', '%'.$user_email.'%');
      }

      $insts = $query->paginate(10);
      $oldData = ['user_name' => $user_name,
                  'user_email' => $user_email,
                 ];
      return view('v1.member.user.list', compact('insts', 'oldData'));
    }

    public function getAdd()
    {
      //$infos = $this->postRepository->getAllSoft();
      return view('v1.member.user.add');
    }

    public function postAdd(Request $request)
    {
      try {
          $input = $request->only('name', 'email', 'phone');
          $input['password'] = bcrypt($request->password);
          $input['role'] = $request->role;
          $this->userRepository->create($input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notify','Add user successful');
    }

    public function getDisplay($id)
    {
      $inst = User::find($id);
      return view('v1.member.user.display', compact('inst'));
    }

    public function getEdit($id)
    {
      $inst = User::find($id);
      return view('v1.member.user.edit', compact('inst'));
    }

    public function postEdit($id, Request $request)
    {
      try {
        $user = User::find($id);
        $input = $request->only('name', 'email', 'phone', 'role');
        $input['password'] = $user->password;
        $input['is_active'] = $request->is_active;

        //dd($request->is_active);
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

      return redirect()->back()->with('notify','Edit successful');
    }

    public function getDelete($id)
    {
      $this->userRepository->delete($id);
      return redirect()->back()->with('notify','Delete successful');
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

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $post = $this->postRepository->create($data);

        return view('home.post', compact('post'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $post = $this->postRepository->update($id, $data);

        return view('home.post', compact('post'));
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return view('home.post');
    }
}
