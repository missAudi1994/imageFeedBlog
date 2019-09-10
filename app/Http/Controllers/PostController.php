<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\User;

use Auth;
use Image;
use Session;

class PostController extends Controller
{
    //

    public function showpost(){
    $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);
       
    return view("posts" , compact("posts")) ;
    }




   public function showUserPosts($id){
    $user= User::findOrFail($id);
    $posts=Post::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->simplePaginate(10);
    return view("posts")->with(array("user" => $user, "posts" => $posts));

   }



    public function addpost(){
    return view("new_posts");
    }

    public function insertpost(Request $request){

          $validator = validator::make($request->all(),[
          'title' => 'required|max:100',
          'content'=> 'required',
           'image'=> 'required|mimes:jpeg,jpg,png|max:2000'
          
          ])->validate();

           $addpost =new Post;
           $addpost->title   = request("title");
           $addpost->content = request("content");
           $addpost->user_id    = auth()->id();

           $addpost->image = $request->file('image')->store('/images','public');
          
           $addpost->save();
           
          Session::flash('success','Your post has now been published');

           return redirect('/posts'); //here supposed to be a specific user posts "user profile"
       

    }


    public function editpost($id){
        $post = Post::findOrFail($id);
        //dd($id);
        return view("editpost",['post'=>$post]); 
        
    }

    public function updatepost(Request $request , $id){
      
         $validator = validator::make($request->all(),[
          'title' => 'required|max:100',
          'content'=> 'required',
           'image'=> 'required|mimes:jpeg,jpg,png|max:2000'
          
          ])->validate();

      $updatepost = Post::find($id);
      $updatepost->title   = request("title");
      $updatepost->content = request("content");
      $updatepost->image = $request->file('image')->store('/images','public');
      $updatepost->save();
       Session::flash('message','Your post has now been updated');
      return redirect('/posts');

    }

    

    public function deletepost($id){
        
        $post = Post::findOrFail($id);
        $post->delete();
         Session::flash('remove','Your post has now been removed');
        return redirect('/posts');
    }

}