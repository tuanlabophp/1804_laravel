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
        Add Post
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
                  <th>Title</th>
                  <th>Description</th>
                  <th>Content</th>
                  <th>Category</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->description}}</td>
                  <td>{{$post->content}}</td>
                  <td>{{$post->category->name}}</td>
                  <td>{{$post->status}}</td>
                  <td>
                  	<a href="{{route('admin.post.delete', ['id' => $post->id])}}">
                      <button class="btn btn-warning">DELETE</button>
                    </a>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form 
              action="{{route('admin.post.store')}}"
              method="post"
            >
              {{@csrf_field()}}
              <div class="form-group">
                <label for="inputTitle">Title</label>
                <input name="title" class="form-control" id="inputTitle" aria-describedby="emailHelp" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="inputContent">Content</label>
                <input name="content" class="form-control" id="inputContent" aria-describedby="emailHelp" placeholder="Content">
              </div>
              <div class="form-group">
                <label for="inputDesc">Desc</label>
                <input name="desc" class="form-control" id="inputDesc" aria-describedby="emailHelp" placeholder="Desc">
              </div>
              <div class="form-group">
                <select name="category_id" id="">
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <input type="radio" name="status" value="1" checked> Public
                <input type="radio" name="status" value="0"> Unpublic
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div>
        </div>
      </div>
    </div>
@endsection
