<?php

namespace App\Http\Controllers\Post;

use App\Helpers\Uploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repository\Interfaces\PostRepositoryInterface;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
   private $repository;
   public function __construct(PostRepositoryInterface $repository)
   {
       $this->repository = $repository;
   }

   public function index()
   {
        $posts = $this->repository->authUserPosts(auth()->user()->id);
        return view('post',compact('posts'));
   }

   public function getAddPostForm()
   {
       return view('add-post');
   }

   public function store(PostStoreRequest $request)
   {
       $data = $request->all();
       $data['user_id'] = auth()->user()->id;
       if ($request->has('images'))
            $data['images'] = implode('|', Uploader::uploadMultiple($request->images)) ;

        $post = $this->repository->addPost($data);

       if(!$post){
          return redirect()->back()->with('msg', 'there is an error , please try again');
       }

       return redirect('posts')->with('msg', 'Post has been added successfully');

   }

}
