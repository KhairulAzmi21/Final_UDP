@extends('layouts.app')

@section('content')


	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('image/do-upload') }}" class="dropzone" id="addImages">
				
				{{ csrf_field() }}
				<input type="hidden" name="gallery_id" value="{{ $gallery->id}}">
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="{{ url('gallery/list') }}" class="btn btn-primary btn-raised">Back</a>
			
		</div>
	</div>

	

@endsection