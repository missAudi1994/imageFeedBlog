@extends("layout")

@section("content")


<div class="container-fluid">
	<div class="row">
		<div class="col-8 mt-4">
		<form action="{{ route('insertpost') }} " method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="userid"  value=" {{ Auth::user()->id }} ">
			<div class="form-group row">
				<label for="title" class="col-2">Title</label>
				<div class="col-10">
					<input id="title" type="text" name="title" class="form-control"/>
				</div>
			</div>
			<div class="form-group row">
				<label for="content" class="col-2"> Content </label>
				<div class="col-10">
					<input id="content" type="text" name="content" class="form-control"/>
				</div>
			</div>

			<div class="form-group">
                  <label for="image" >Image</label>
                  <input type="file" class="form-control-file" name="image">
                </div>

			
              <input type="submit" class="btn btn-primary mt-3">
            
		</form>
	</div>

    <div class="col-12">
    	@foreach( $errors->all() as $err)

    	  <div class="alert alert-danger mt-4">
    	  	{{ $err }}

    	  </div>

          

    	@endforeach
    	

    </div>

</div>



@endsection