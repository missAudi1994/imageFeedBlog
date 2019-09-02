<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;


class CommentController extends Controller
{
    //

public function store(Request $request,Post $post)
{


   $this->validate(request(),['content' =>'required|min:2']);

    // $post->addComment(request('content'));
     
    // return back();
    ;
      Comment::create([
     'content' => $request->content,
     'user_id' => Auth::user()->id,
     'post_id' => $post->id
     ]);
       return back();
 }

}
