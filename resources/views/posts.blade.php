@extends("layout")

@section("content")

<div class="container  bg-light">

   
   @if (session('logout_message'))
       <div class="alert alert-success" role="alert">
        {{ session('logout_message') }}
      </div>
    @endif 



  @if(Session::get('success'))
    <div class="alert alert-success" role="alert">
       <strong>Success:</strong> {{ Session::get('success') }}
    </div>
    @endif

     @if(Session::get('message'))
    <div class="alert alert-success" role="alert">
       <strong>Success:</strong> {{ Session::get('message') }}
    </div>
    @endif

    @if(Session::get('remove'))
    <div class="alert alert-success" role="alert">
       <strong>Success:</strong> {{ Session::get('remove') }}
    </div>
    @endif
   

 <div class="row" style="margin-bottom: 100px;">
  
  
  <div class="card-columns">
      @foreach ($posts as $post)

<div class="card" >

  
   <img class="card-img-top" src="{{ asset("storage/$post->image") }}">
  <div class="card-body">
    <h5 class="card-title">
     <a href="{{ route('comments' , $post->id) }}" style="color: #212529;" > 
{{ $post->title }}</h5>
     </a>
      
    <p class="blog-post-meta"> By :<a href="{{ route('userposts' , $post->user->id) }} "  style="color: #17a2b8ad;">{{ $post->user->name  }}</a></p>
    
  <div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
   <p>
      @if (Auth::check() && $post->user->id == Auth::id()) <!-- only authorized user can edit and delete a post -->
      <a href=" {{ route('editpost' , $post->id) }}" class="btn btn-sm btn-outline-secondary" >Edit</a>
      @endif
    </p>
  

    <p>
      @if (Auth::check() && $post->user->id == Auth::id())
      <a onclick="return confirm('Are you sure you want to delete this post?')"  href=" {{ route('deletepost' , $post->id) }}" class="btn btn-sm btn-outline-secondary" >Delete</a>
      @endif

    </p>
  </div>


  </div>
</div>
</div>



   @endforeach


</div>

  
{{ $posts->links() }}


</div>


</div>

@endsection
