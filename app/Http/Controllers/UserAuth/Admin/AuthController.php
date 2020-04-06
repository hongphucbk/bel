<?php

namespace App\Http\Controllers\UserAuth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Model\User\User;
use Illuminate\Support\Facades\Auth;

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
        $users = $this->userRepository->getAll();
        return view('v1.admin.auth.login', compact('users'));
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('v1/admin/dashboard');
        }
        else{
            return redirect('admin/login')->with('notification','Đăng nhập không thành công');
        }
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      //return redirect()->back()->with('notification','Add successful');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login');
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
