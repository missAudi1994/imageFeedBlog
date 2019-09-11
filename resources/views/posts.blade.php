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

  
   <img class="card-img-top" src="{{ asset("$post->image") }}">
  <div class="card-body">
    <h5 class="card-title">
     <a href="{{ route('comments' , $post->id) }}" style="color: #212529;" > 
{{ $post->title }}</h5>
     </a>
      

    <p class="blog-post-meta"> By : <a href="{{ route('userposts' , $post->user->id) }} "  style="color: #17a2b8ad;">{{ $post->user->name  }}</a></p>

    
  <div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
   <p>
      @can('edit',$post) <!-- only authorized user can edit and delete a post -->
      <a href=" {{ route('editpost' , $post->id) }}" class="btn btn-sm btn-outline-secondary" >Edit</a>
      @endcan
    </p>
  

    <p>
      @can('destroy',$post)
       <form action="{{ route('deletepost' , $post->id) }}" method="POST">
        @method('DELETE')
         @csrf
           <button onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-sm btn-outline-secondary"> Delete 
           </button>
     </form>
      @endcan

    </p>
  </div>



  </div>
</div>
</div>



   @endforeach


</div>

<div class="pagination justify-content-center" style="padding-left: 500px;"> 
{{ $posts->links() }}
</div>

<style > 

  .pagination a 
  {
    color: #5b478d;
    background-color: #f8f9fa;
    border-color: #ddd;
  }

</style>

</div>


</div>


@endsection
