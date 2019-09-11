@extends("layout")

@section("content")


<div class="container-fluid bg-light" style="margin-bottom: 100px;">

<div class="row">
<div class="col-md-8 offset-md-2">


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

      

<div class="card mb-3 mt-4">
   <img class="card-img-top"src="{{ asset("$post->image") }}">
   
   <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    

     <p class="blog-post-meta"> By : <a href="{{ route('userposts' , $post->user->id) }} "  style="color: #17a2b8ad;">{{ $post->user->name  }}</a></p>

     
    <p class="card-text">{{ $post->content }}</p>
 
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
         
           <button onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-sm btn-outline-secondary"> Delete </button>

     </form>
      @endcan
    </p>
  </div>

    <p class="card-text"><small class="text-muted">Last updated :  {{ $post->updated_at->diffForHumans()}}</small></p>

    <p class="card-text"><small class="text-muted">Created at :  {{ $post->created_at->diffForHumans()}}</small></p>






<!-- Displaying comments -->

      <hr>
      <div class="comments">
        <ul class="list-group">
          @foreach ($post->comments as $comment)
          <li class="list-group-item">
            <strong>
              
               @if(isset($comment->user) )

                 {{ $comment->created_at->diffForHumans()}} by <a href="{{ route('userposts' , $comment->user->id ) }} " style="color: #17a2b8ad;" > {{$comment->user->name }}</a> : &nbsp;

       
               @else 

                {{ $comment->created_at->diffForHumans()}} by anonymous : &nbsp;

               @endif
      
               
            </strong>
         
          {{ $comment->content }}

          </li>

          @endforeach
        </ul>

      </div>

<!-- Adding comment -->
  <hr>
<div class="card">
  <div class="card-block">
    <form method="POST" action="{{ route( 'addcomment',$post->id) }} ">
      @csrf
      <div class="form-group">
        <textarea name="content" placeholder="Your comment here." class="form-control"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-outline-gray" style="background-color: #5b468d; color: #f8f9fa; border: #808080;"> 
        Add </button>
      </div>
    </form>
  </div>
</div>



</div>
</div>

  


</div>


</div>

</div>



@endsection

