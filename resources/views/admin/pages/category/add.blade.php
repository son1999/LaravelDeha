@extends('admin.layouts.master')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Category</h6>
	</div>
	<div class="row" style="margin: 5px">
		<div class="col-lg-12 mb-2">
			<form role="form" action="{{ route('category.store') }}" method="post">
				@csrf
				<fieldset class="form-group">
					<label>Name</label>
					<input class="form-control" name="name" placeholder="Nhập tên category">
					@if($errors->has('name'))
						<div class="alert alert-danger mt-2">{{ $errors->first('name') }}</div>
					@endif
				</fieldset>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" id="status" name="status">
						<option value="1">Hiển Thị</option>
						<option value="0">Không Hiển Thị</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success">Thêm</button>
				<button type="reset" class="btn btn-primary">Cancel</button>
			</form>
		</div>
	</div>
</div>
@endsection