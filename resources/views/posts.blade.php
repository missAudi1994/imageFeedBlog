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
  <img src="{{ asset("storage/$post->image") }}" >
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->content }}</p>


    <p>
      @if (Auth::check() && $post->user == Auth::id()) <!-- only authorized user can edit and delete a post -->
      <a href=" {{ route('editpost' , $post->id) }}" >Edit</a>
      @endif
    </p>
  

    <p>
      @if (Auth::check() && $post->user == Auth::id())
      <a onclick="return confirm('Are you sure you want to delete this post?')"  href=" {{ route('deletepost' , $post->id) }}">Delete</a>
      @endif

    </p>

    <p class="card-text"><small class="text-muted">Last updated :  {{ $post->updated_at}}</small></p>

    <p class="card-text"><small class="text-muted">Created at :  {{ $post->created_at}}</small></p>
  </div>
</div>

   @endforeach
		</div


		</div>

	</div>

</div>

@endsection