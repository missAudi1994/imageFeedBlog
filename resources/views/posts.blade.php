@extends("layout")

@section("content")

<div class="container-fluid">
	<div class="row">
		<div class="col-18 col-md-10">

      @foreach ($posts as $post)

			<div class="card mb-3 mt-4">
  <img src="{{ asset("storage/$post->image") }}" >
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->content }}</p>
    <p>
      <a href=" {{ route('editpost' , $post->id) }}">Edit</a>
    </p>
    <p>
      <a href=" {{ route('deletepost' , $post->id) }}">Delete</a>
    </p>

    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>

   @endforeach
		</div>
	




		</div>

	</div>

</div>

@endsection