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


    public function index(){
    $posts = Post::orderBy('created_at', 'desc')->paginate(10);
       
    return view("posts" , compact("posts")) ;

    }


 

   public function show($id){
    $user= User::findOrFail($id);
    $posts=Post::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->paginate(10);

    return view("posts")->with(array("user" => $user, "posts" => $posts));

   }



    public function create(){
    return view("new_posts");
    }

  
    public function store(Request $request){

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
           
          // Session::flash('success','Your post has now been published');

           return redirect('/posts')->with('success','Your post has now been published'); //here supposed to be a specific user posts "user profile"
       

    }


    public function edit($id){

        $post = Post::findOrFail($id);
         $this->authorize('edit',$post);
        return view("editpost",['post'=>$post]); 
        
    }

    public function update(Request $request , $id){
      
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
       // Session::flash('message','Your post has now been updated');
      return redirect('/posts')->with('success','Your post has now been updated');

    }

    

    public function destroy($id){
        
        $post = Post::findOrFail($id);
        $this->authorize('destroy',$post);
        $post->delete();
         // Session::flash('remove','Your post has now been removed');
        return redirect('/posts')->with('success','Your post has now been removed');
    }

}