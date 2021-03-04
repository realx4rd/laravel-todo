@extends('layout.app')
@section('contents')
		
	<div class="container-fluid my-4" >
		<div class="card shadow" style="min-height:90vh ">
			<div class="card-header">
				Todo List
				<a href="{{ route('todo.create') }}" class="btn btn-sm btn-dark float-right">Add</a>
				<button 
					data-url="{{ route('todo.destroy.bulk') }}"
					class="btn btn-sm btn-danger mx-1 float-right deleteRequest--bulk
					" style="display: none;">Delete Selected</button>
				<button 
					data-url="{{ route('todo.edit.bulk') }}"
					class="btn btn-sm btn-outline-info mx-1 float-right editRequest--bulk
					" style="display: none;">Edit Status/Priority Selected</button>
			</div>
			<div class="card-body ">

				@unless ($todos->count())
					<div class="alert alert-danger">No data found in system</div>
				@endunless

		    	<div class="row todoCards">

		    		@foreach ($todos as $key => $todo)
					<div class="col-lg-4 col-md-6  ">

						<div class="card shadow mb-4">
				  			<div class="card-header">
				  				{{ $todo->name }}

								<span class="badge float-right rounded-0 badge-dark">{{ $todo->status }}</span>
				  				<span class="badge float-right rounded-0 badge-info mx-1">{{ $todo->priority }}</span>
				  				
				  			</div>
					  		<div class="card-body">
			  					<table class="table  text-muted table-sm table-borderless">
			  						<tr><td>Time Left: </td> <td>{{ $todo->due_date->diffForHumans() }}</td><tr>
			  						<tr><td>Due Date: </td> <td>{{ $todo->due_date->format('Y-m-d') }}</td><tr>
			  						<tr><td>Author: </td> <td>{{ $todo->author }}</td><tr>
			  						<tr><td>Created at: </td> <td>{{ $todo->created_at }}</td><tr>
			  						<tr><td>Updated at: </td> <td>{{ $todo->updated_at }}</td><tr>
			  					</table>

					  		</div>
					  		<div class="card-footer p-1">
					  			<span class="border px-2 py-1 text-muted">
					  				<input type="checkbox" id="cp{{ $todo->id }}" value="{{ $todo->id }}" class="mx-2">
					  			<label for="cp{{ $todo->id }}">Select</label>
					  			</span>
					  			<button
						  				data-url="{{ route('todo.destroy',$todo->id) }}"
						  				class="btn btn-sm deleteRequest--btn btn-outline-danger mx-1 float-right "
						  			>Delete</button>

						  			<a
						  				href="{{ route('todo.edit',$todo->id) }}"
						  				class="btn btn-sm btn-outline-info float-right"
						  			>Edit</a>
					  		</div>
				  		</div>

					</div>
		    		@endforeach

				</div>

			</div>
		</div>	
	</div>
@include('modals.edit-bulk')
@endsection