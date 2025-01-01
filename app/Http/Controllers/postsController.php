<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class postsController extends Controller
{


    public function index()
    {
        $posts = post::with('user')->latest()->paginate(3);

        return view('posts.index',[ "posts" => $posts]);
    }
    public function edit(Post $post){
        return view('posts.update',[ "post" => $post]);
    }
    public function create()
    {

        return view('posts.create');
    }
    public function show(Post $post){
        $comment = $post->comment;
        return view('posts.show',[ "post" => $post ,'comment' => $comment]);
    }


    public function store(){
        request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required' , 'min:10'],
        ]);
        post::create(
            ['title' => request('title'),
                'body' => request('body'),
                'user_id' => Auth::id()]);
        return redirect( '/posts' );
    }

    public function destroy(Post $post){

        $post->delete();
        return redirect('/posts');
    }



    public function update(post $post){
        $post->update(
            [
                'title' => request('title'),
                'body' => request('body'),
            ]
        );
        return redirect('/posts');
    }


}
