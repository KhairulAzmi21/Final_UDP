@extends('layouts.app')

@section('content')

<style type="text/css">
	#gallery-images1 {
		width: 160px;
		height: 240px;
		border: 2px solid black;
		margin-bottom: 10px;

	}
	#gallery-image2 {
		margin: 0;
		padding: 0;
	}
	#gallery-imag3 {
		margin: 0;
		padding: 0;
		list-style:none;
		float: left;
		padding-right: 10px;
	}
</style>
	
	<div class="row">
		<div class="col-md-12">
			
			<h1>{{ $gallery->name }} </h1>
			
		</div>
	
	</div>
	
	<div class="row">
		<div class="col-md-12 center">
			<div class="gallery-images">
				<ul id="gallery-image2">
					@foreach($gallery->images as $image)
					<li id='gallery-imag3'>
						<a href="{{ url($image->file_path) }}" data-lightbox="roadtrip">
							<img id="gallery-images1" src="{{ url('/gallery/images/thumbs/'. $image->file_name)}}" alt="">
					
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

	<!--  <div class="row">
			<div class="col-md-12">
				<form action="{{ url('image/do-upload') }}" class="dropzone" id="addImages">
					
					{{ csrf_field() }}
					<input type="hidden" name="gallery_id" value="{{ $gallery->id}}">
				</form>
			</div>
		</div> -->
 
	<div class="row">
		<div class="col-md-12">
			<a href="{{ url('gallery/list') }}" class="btn btn-primary btn-raised">Back</a>
			
		</div>
	</div>

	

@endsection