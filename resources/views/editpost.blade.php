@extends("layout")

@section("content")


<div class="container-fluid">
	<div class="row">
		<div class="col-8 mt-4">
		<form action="{{ route('updatepost', $post->id) }} " method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="userid"  value=" {{ Auth::user()->id or ''}} ">
			<div class="form-group row">
				<label for="title" class="col-2">Post Title</label>
				<div class="col-10">
					<input id="title" type="text" name="title" value="{{ $post->title  }}" class="form-control"/>
				</div>
			</div>
			<div class="form-group row">
				<label for="content" class="col-2">Post Content</label>
				<div class="col-10">
					<input id="content" type="text" name="content" value="{{ $post->content }}"class="form-control"/>
				</div>
			</div>

			<div class="form-group">
                  <label for="image" >Post Image</label>
                  <input type="file" class="form-control-file" name="image">
                </div>

			
              <input type="submit" value="Update" class="btn btn-primary mt-3">
            
		</form>
	</div>



</div>
<div class="col-12">
    	

        @if ($errors->any())  <!-- displaying the validation errors -->
          <div class="alert alert-danger mt-4">
          	<ul>


    	@foreach( $errors->all() as $eror)  

    	  
    	   <li>	{{ $eror }}</li>


    	@endforeach
    	</ul>
       </div>
      @endif

    </div>


@endsection