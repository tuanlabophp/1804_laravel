@extends('admin.dashboard')

@section('dashboard-content')
<div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Add new Category</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form 
	class="form-horizontal" 
	action="{{route('admin.cate.store')}}"
	method="post" 
>
	@csrf
	{{ csrf_field() }}
  <div class="box-body">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Category name</label>

      <div class="col-sm-10">
        <input name="cate-name" class="form-control" id="inputEmail3" placeholder="Category name">
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info pull-right">Create</button>
  </div>
  <!-- /.box-footer -->
</form>
</div>
@endsection