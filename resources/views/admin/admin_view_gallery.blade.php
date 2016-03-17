@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<h3>Gallery: {{ $users->name }}</h3>

			</div>
		</div>
		<div class="row">
			 <div class="col-md-9">
					@if(count($galleries)> 0)
					<table class="table table-striped table-bordered table-responsive">
						<thead>
							<tr class="text-center">
								<th>Name of the Gallery</th>
								<td>Total Images</td>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($galleries as $gallery)
							<tr>
								<td>{{	$gallery->name }}</td> 
								<td class="text-center"> {{ $gallery->images()->count() }}</td>
								<td><a href="{{ url('/admin/view/images/'.$gallery->id)}}">View</a></td>
							</tr>
							@endforeach
						
						</tbody>
					</table>
					@endif
			
			</div> 
			
		</div>
		<div class="row">
		<div class="col-md-12">
			<a href="{{ url('admin') }}" class="btn btn-primary btn-raised">Back</a>
			
		</div>
	</div>



@endsection