@extends('layout.app')
@section('contents')
		
	<div class="container my-4">
		<div class="card">
			<div class="card-header">
				Edit Todo
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-dark float-right">Back</a>
			</div>
			<div class="card-body">
		    	<form method="POST" class="appForm" action="{{ route('todo.update',$todo->id) }}">
		    		@csrf
		    		@method('PUT')
		    		<div class="row">
		    			
		    			<div class="col-12 form-group">
		    				<label>Name</label>
		    				<input type="text" class="form-control" name="name"  value="{{ $todo->name }}" />
		    			</div>

		    			<div class="col-md-6 form-group">
		    				<label>Author</label>
		    				<input type="text" class="form-control form-control-sm" value="{{ $todo->author }}" name="author"  />
		    			</div>
		    			<div class="col-md-6 form-group">
		    				<label>Due Date</label> 
		    				<input type="date" class="form-control form-control-sm"  value="{{ $todo->due_date->format('Y-m-d') }}" name="due_date"  />
		    			</div>
		    			<div class="col-md-6 form-group">
		    				<label>Status</label>
		    				<input type="text" class="form-control form-control-sm"  value="{{ $todo->status }}" name="status"  />
		    			</div>
		    			<div class="col-md-6 form-group">
		    				<label>Priority</label>
		    				<input type="number" min="1" class="form-control form-control-sm"  value="{{ $todo->priority }}" name="priority"  />
		    			</div>

		    			<div class="col-12 form-group ">
		    				Todo Items
		    			</div>

		    			<div class="col-12 itemsContainer">

		    				@foreach ($todo->items as $item)
		    					<div class="input-group mb-1 item">
		    						<div class="input-group-prepend">
									    <div class="input-group-text">
									      <input type="checkbox" aria-label="">
									    </div>
									</div>
								 	<input type="text" name="items[]" class="form-control form-control-sm" value="{{ $item->title }}">
								 	<div class="input-group-append">
								    	<button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button" >Delete</button>
								  	</div>
								</div>		
		    				@endforeach

		    				<div class="input-group mb-1 item">
		    					<div class="input-group-prepend">
								    <div class="input-group-text">
								      <input type="checkbox" aria-label="">
								    </div>
								</div>
							 	<input type="text" name="items[]" class="form-control form-control-sm" placeholder="New Item" >
							  	<div class="input-group-append">
							    	<button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button" >Delete</button>
							  	</div>
							</div>	

		    			</div>

		    			<div class="col-12">
		    				<button class="btn btn-outline-success btn-sm addItem--btn"  type="button">Add Item</button>
		    				<button class="btn btn-outline-danger btn-sm removeSelected--btn"  type="button" style="display: none;">Remove Selected</button>
		    			</div>

		    		</div>
		    		<div class="appForm--response my-2"></div>
		    		<button class="btn btn-dark btn-sm float-right ">Update</button>
		    	</form>
			</div>
		</div>	
	</div>

@endsection