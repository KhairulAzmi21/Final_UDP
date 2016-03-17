@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<h1>My Galleries</h1>
				<h3>Welcome {{ Auth::user()->name }}</h3>

			</div>
		</div>
		<div class="row">
			 <div class="col-md-8">
					@if(count($galleries)> 0)
					<table class="table table-striped table-bordered table-responsive">
						<thead>
							<tr class="text-center">
								<th>Name of the Gallery</th>
								<td>Total Images</td>
								@if($users->upload_permission == "yes")
								<th></th>@endif
								@if($users->download_permission == "yes")
								<th></th>@endif
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($galleries as $gallery)
							<tr>
								<td>{{	$gallery->name }}</td> 
								<td class="text-center"> {{ $gallery->images()->count() }}</td>

							
								<td><a href="{{ url('gallery/view/'.$gallery->id)}}">View</a></td>
								@if($users->upload_permission == "yes")
								<td><a href="{{ url('/upload/'.$gallery->id)}}">Upload</a></td>
								@endif
								@if($users->download_permission == "yes")
								<td><a href="{{ url('file/download/'. $gallery->id) }}">Download</a></td>
								@endif
								<td><a href="{{ url('gallery/delete/'.$gallery->id)}}">Delete</a></td>
								
							</tr>
							@endforeach
						
						</tbody>
					</table>
					@endif
			
			</div> 
			<div class="col-md-4">
				@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li> {{ $error}}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="POST" action="{{ url('gallery/save') }}" class="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<input type="text" name="gallery_name" id="gallery_name" placeholder="name of the gallery" 
						class="form-control" value= "{{ old('gallery_name') }}" />
					</div>
					

					<button class="btn btn-primary btn-raised">Save</button>
				</form>
			</div>
			
		</div>



@endsection