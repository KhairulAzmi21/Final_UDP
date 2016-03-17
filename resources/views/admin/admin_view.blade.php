@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                <h1>Admin Page</h1>
                <h3>Welcome Admin {{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-8">
			@if(count($users)>0)
				<table class="table table-striped table-bordered table-responsive">
					<thead>
						<tr class="text-center">
							<th>Name of the Gallery</th>
							<th>Upload Permission</th>
							<th>Download Permission</th>
							<th>Update</th>
							<th>View</th>
						</tr>
					</thead>
					<tbody>
						 @foreach($users as $username)
						 
						<tr>
							<td>{{ $username-> name }}</td> 
							<td>
							<form method="POST" action="{{ url('permission/save') }}" class="form">
							<input type="hidden" name="id_user" value="{{ $username->id}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<select class="form-control" id="upload_permission" name="upload_permission">
							@if( $username->upload_permission == "yes")
						    <option selected="selected" value="yes">Yes</option>
						    <option value="no">No</option>
						    @else
						    <option value="yes">Yes</option>
						    <option value="no" selected="selected">No</option>
							@endif
							</select></td>
							
							
							<td><select class="form-control" id="download_permission" name="download_permission">
							@if( $username->download_permission == "yes")
						    <option value="yes" selected="selected">Yes</option>
						    <option value="no">No</option>
						    @else
						    <option value="yes">Yes</option>
						    <option value="no" selected="selected">No</option>
							@endif
							</select></td>
							<td><button class="btn btn-primary ">Save</button></td>
						   </form>
							<td> <form class="form"  action="{{url('/admin/view/'.$username->id)}}">
								<button class="btn btn-default">View</button></form>
							</td>

						
							
						</tr>
						
						@endforeach
					</tbody>
				</table>
			@endif
			</div>
		</div>
            
    </div>
    
    
@endsection
