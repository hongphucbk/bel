<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\News\NewsRepositoryInterface;
use App\Model\News\Info;
use App\Model\News\Category;
use Illuminate\Support\Facades\Auth;


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

    public function __construct(NewsRepositoryInterface $postRepository)
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
        $infos = $this->postRepository->getAll();
        return view('v1.admin.news.info.list', compact('infos'));
    }

    public function getAdd()
    {
      $categories = Category::all();
      return view('v1.admin.news.info.add', compact('categories'));
    }

    public function postAdd(Request $request)
    {
      try {
          $input = $request->only('name', 'description', 'rate', 'category_id', 'note');
          $input['user_id'] = Auth::user()->id;;
          $this->postRepository->create($input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notification','Add successful');
    }

    public function getEdit($id)
    {
      $categories = Category::all();
      $info = Info::find($id);
      return view('v1.admin.news.info.edit', compact('info','categories'));
    }

    public function postEdit($id, Request $request)
    {
      try {
          $input = $request->only('name', 'description', 'rate', 'category_id', 'note');
          $input['user_id'] = Auth::user()->id;
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
