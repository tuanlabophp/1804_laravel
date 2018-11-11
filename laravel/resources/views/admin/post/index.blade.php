@extends('admin.dashboard')

@section('dashboard-content')
    <section class="content-header">
      <h1>
        Post Table
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Post table</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add more Post
        </button>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr id="post-row-{{$post->id}}">
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>
                  	<!-- <a href="javascript:void(0)"> -->
                  		<button post-id='{{$post->id}}' class="remove-post btn btn-warning">DELETE</button>
                  	<!-- </a> -->
                  	<a href="{{route('admin.post.edit', ['id' => $post->id])}}">
                  		<button class="btn btn-success">UPDATE</button>
                  	</a>
                  </td>
              	</tr>
              	@endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form
            class="form-horizontal"
            action="{{route('admin.post.store')}}"
            method="post"
        >
            @csrf
            {{ csrf_field() }}
            <div class="box-body">
                <div class="col-sm-10">
                    <input name="title" class="form-control" placeholder="Post title">
                </div>
                <div class="col-sm-10">
                    <input name="desc" class="form-control" placeholder="Post desc">
                </div>
                <div class="col-sm-10">
                    <textarea name="content" class="form-control" placeholder="Post content"></textarea>
                </div>

                <div class="col-sm-10">
                    <input type="radio" name='status' value='1'>Public
                    <input type="radio" name='status' value='0'>Unpublic
                </div>
                <div class="col-sm-10">
                    <select name="cate" id="">
                        @foreach($cates as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Create</button>
            </div>
        <!-- /.box-footer -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type='text/javascript'>
    $(document).ready(function() {
        $('.remove-post').on('click', function() {
        console.log(123);
            var id = $(this).attr('post-id');
            $.ajax(
                {
                    url: '/admin/post/delete/' + id,
                    method: 'get',
                    success: function() {
                        $('#post-row-' + id).remove();
                    }
                }
            );
        })
    });
</script>
@endsection
