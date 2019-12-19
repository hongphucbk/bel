<?php

namespace App\Http\Controllers\Soft\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Soft\SoftRepositoryInterface;
use App\Model\Soft\Info;

class InfoController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $postRepository;

    // public function __construct(PostEloquentRepository $postRepository)
    // {
    //     $this->postRepository = $postRepository;
    // }

    public function __construct(SoftRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $infos = $this->postRepository->getAllSoft();
        return view('v1.admin.soft.info.list', compact('infos'));
    }

    public function getAdd()
    {
      //$infos = $this->postRepository->getAllSoft();
      return view('v1.admin.soft.info.add');
    }

    public function postAdd(Request $request)
    {
      try {
          $input = $request->only('name', 'description', 'rate');
          $input['user_id'] = 1;
          $this->postRepository->create($input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notification','Add successful');
    }

    public function getEdit($id)
    {
      $info = Info::find($id);
      return view('v1.admin.soft.info.edit', compact('info'));
    }

    public function postEdit($id, Request $request)
    {
      try {
          $input = $request->only('name', 'description', 'rate');
          $input['user_id'] = 1;
          $this->postRepository->update($id, $input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notification','Edit successful');
    }

    public function getDelete($id)
    {
      $this->postRepository->delete($id);
      return redirect()->back()->with('notification','Delete successful');
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
