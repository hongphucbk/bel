<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\News\Content\ContentRepositoryInterface;
use App\Model\News\Info;
use App\Model\News\Content;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $contentRepository;

    // public function __construct(PostEloquentRepository $postRepository)
    // {
    //     $this->postRepository = $postRepository;
    // }

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $contents = $this->contentRepository->getAll();
        return view('v1.admin.news.content.list', compact('contents'));
    }

    public function getAdd()
    {
      $infos = Info::all();
      return view('v1.admin.news.content.add', compact('infos'));
    }

    public function postAdd(Request $request)
    {
      try {
          $input = $request->only('info_id', 'title', 'content', 'note');
          $input['user_id'] = Auth::user()->id;
          //$input[''] = 1;
          //dd($request->info_id);
          $this->contentRepository->create($input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notification','Add successful');
    }

    public function getEdit($id)
    {
      $content = Content::find($id);
      $infos = Info::all();
      return view('v1.admin.news.content.edit', compact('content', 'infos'));
    }

    public function postEdit($id, Request $request)
    {
      try {
          $input = $request->only('info_id', 'title', 'content', 'note');
          $input['user_id'] = Auth::user()->id;
          $this->contentRepository->update($id, $input);
      } catch (Exception $e) {
          Log::debug($e);
          return back()->withErrors('Error');
      }

      return redirect()->back()->with('notification','Edit successful');
    }

    public function getDelete($id)
    {
      $this->contentRepository->delete($id);
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
