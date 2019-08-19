<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Post;
use Auth;
use Image;

class PostController extends Controller
{
    //

    public function showpost(){
    	$posts = Post::all();

    	return view("posts" , compact("posts")) ;
    }


    public function addpost(){
    	return view("new_posts");
    }

    public function insertpost(Request $request){
          
           $request->validate([
              "content" => "required|min:4", 
              "image" => "required",

           ]);

           $addpost =new Post;
           $addpost->title   = request("title");
           $addpost->content = request("content");
           $addpost->user    = request("userid");
          $addpost->image = $request->file('image')->store('/images','public');
           
           $addpost->save();
           return redirect('/posts');
       
	
    }


    public function editpost($id){
        
        $post = Post::findOrFail($id);
        //dd($id);
        return view("editpost",['post'=>$post]);
    }

    public function updatepost(Request $request , $id){
      $updatepost = Post::find($id);
      $updatepost->title   = request("title");
      $updatepost->content = request("content");
      $updatepost->user    = request("userid");
      $updatepost->image = $request->file('image')->store('/images','public');
      $updatepost->save();
      return redirect('/posts');

    }

    

    public function deletepost($id){
        
        $post = Post::findOrFail($id);
        $post->delete();
        //dd($id);
        return redirect('/posts');
    }

}
