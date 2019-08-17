@extends("layout")

@section("content")

<div class="container-fluid">
	<div class="row">
		<div class="col-18 col-md-10">

      @foreach ($posts as $post)

			<div class="card mb-3 mt-4">
  <img src="{{ asset("storage/$post->p_image") }}" >
  <div class="card-body">
    <h5 class="card-title">{{ $post->p_title }}</h5>
    <p class="card-text">{{ $post->p_content }}</p>
    <p>
      <a href=" {{ url('editpost/' . $post->p_id) }}">Edit</a>
    </p>

    <p>
      <a href=" {{ url('deletepost/' . $post->p_id) }}">Delete</a>
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