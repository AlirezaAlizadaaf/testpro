<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;
use Illuminate\validation\rule;

class commentController extends Controller
{

    public function store(Post $post){


        comment::create([
            'post_id' => $post->id,
            'content' => request('content')
        ]);
        return redirect('/posts/' . $post->id );
    }

    public function destroy(Comment $comment ){
             $comment->destroy($comment->id);
             return redirect('/posts/' . $comment->post->id );
    }
}
