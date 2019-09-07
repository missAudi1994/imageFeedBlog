<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    //




public function showComment($id){
        $post = Post::findOrFail($id);
        
        return view("comments",['post'=>$post]); 
        
    }



public function store(Request $request,Post $post)
{


   $this->validate(request(),['content' =>'required|min:1']);

    
      if(Auth::user()){
        $userId=Auth::user()->id;
      } else{
        $userId=null;
      }
      
      Comment::create([
     'content' => $request->content,
     'user_id' => $userId,  //Auth::id()
     'post_id' => $post->id,
     ]);
       return back();
 }


}
