<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;


class CommentController extends Controller
{
    //

  public function postComments($id){
    $post= Post::findOrFail($id);
    $comments=Comment::where('post_id','=',$post->id)->get();
    return view("comments")->with(array("post" => $post, "comments" => $comments));
  }



public function store(Request $request,Post $post)
{

   $this->validate(request(),['content' =>'required|min:2']);

    
      if(Auth::user()){
        $userId=Auth::user()->id;
      } 
      else{
        $userId=null;
      }
     
      Comment::create([
     'content' => $request->content,
     'user_id' => $userId,
     'post_id' => $post->id,
     ]);
       return back();
 }

}