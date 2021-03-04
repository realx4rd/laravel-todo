<form action="{{ route('todo.edit.bulk.submit') }}" class="appForm">
@csrf
@method('PUT')
<div class="row">
	@foreach ($todos as $todo)
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">{{ $todo->name }}</div>
				<div class="card-body">
					<div class="form-group">
						<label>Status</label>
						<input type="text" name="status[{{ $todo->id }}]" class="form-control form-control-sm" value="{{ $todo->status }}">
					</div>
					<div class="form-group">
						<label>Priority</label>
						<input type="number" min="1" name="priority[{{ $todo->id }}]" class="form-control form-control-sm"  value="{{ $todo->priority }}">
					</div>
				</div>
			</div>
		</div>
	@endforeach
	<div class="col-12 my-2 appForm--response"></div>
	<div class="col-12">
		<button class="btn btn-dark btn-submit appForm--submit btn-sm float-right">Update</button>
	</div>
</div>

</form>
