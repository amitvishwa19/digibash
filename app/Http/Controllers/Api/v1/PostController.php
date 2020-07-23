<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\PostResource;

class PostController extends Controller
{

    public function index()
    {
        $posts = auth()->user()->posts->where('status','published');
        return PostResource::collection($posts);
    }


    public function store(Request $request)
    {

        $post = $request->isMethod('put') ? Post::findOrFail($request->post_id) : new Post;

        $post->user_id  = auth()->user()->id;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->status = 'published';

        if($post->save()){
            return new PostResource($post);
        }
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(!$post){
            return response()->json(['error'=>'Bad Request'],400);
        }
        if($post->delete()){
            return new PostResource($post);
        }
    }
}
