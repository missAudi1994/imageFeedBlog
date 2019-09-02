@extends("layout")

@section("content")

<div class="container-fluid">
	<div class="row">
		<div class="col-18 col-md-10">

  

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

      @foreach ($posts as $post)

			<div class="card mb-3 mt-4">
  <img src="{{ asset("$post->image") }}">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="blog-post-meta"> By :<a href="{{ route('userposts' , $post->user->id) }} " >{{ $post->user->name  }}</a></p>
    <p class="card-text">{{ $post->content }}</p>


    <p>
      @if (Auth::check() && $post->user->id == Auth::id()) <!-- only authorized user can edit and delete a post -->
      <a href=" {{ route('editpost' , $post->id) }}" >Edit</a>
      @endif
    </p>
  

    <p>
      @if (Auth::check() && $post->user->id == Auth::id())
      <a onclick="return confirm('Are you sure you want to delete this post?')"  href=" {{ route('deletepost' , $post->id) }}">Delete</a>
      @endif

    </p>

    <p class="card-text"><small class="text-muted">Last updated :  {{ $post->updated_at->diffForHumans()}}</small></p>

    <p class="card-text"><small class="text-muted">Created at :  {{ $post->created_at->diffForHumans()}}</small></p>
  </div>
</div>





<!-- Displaying comments -->

      <hr>
      <div class="comments">
        <ul class="list-group">
          @foreach ($post->comments as $comment)
          <li class="list-group-item">
            <strong>
              
               @if(isset($comment->user))
                 {{ $comment->created_at->diffForHumans()}} by <a href="{{ route('userposts' , $comment->user->id) }} " > {{$comment->user->name }}</a> : &nbsp;
       
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
        <button type="submit" class="btn btn-primary"> Add Comment</button>
      </div>
    </form>
  </div>
</div>




   @endforeach
		</div


		</div>

</div>

@endsection