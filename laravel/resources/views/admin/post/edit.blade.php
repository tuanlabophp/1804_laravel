@extends('admin.dashboard')

@section('dashboard-content')
	<form 
	  action="{{route('admin.post.update')}}"
	  method="post"
	>
	  {{@csrf_field()}}
	  <div class="form-group">
	    <label for="inputTitle">Title</label>
	    <input name="title" class="form-control" id="inputTitle" aria-describedby="emailHelp" placeholder="Title" value='{{$post->title}}'>
	  </div>
	  <div class="form-group">
	    <label for="inputContent">Content</label>
	    <input name="content" class="form-control" id="inputContent" aria-describedby="emailHelp" placeholder="Content" value='{{$post->content}}'>
	  </div>
	  <div class="form-group">
	    <label for="inputDesc">Desc</label>
	    <input name="desc" class="form-control" id="inputDesc" aria-describedby="emailHelp" placeholder="Desc" value='{{$post->description}}'>
	  </div>
	  <!-- Truyen id dang hidden de nhan id khi update -->
	  <input type="hidden" value='{{$post->id}}' name='id'>
	  <div class="form-group">
	    <select name="category_id" id="">
	      @foreach($categories as $category)
	      <!-- Kiem tra neu co category_id thi se hien thi len truoc -->
	      	@if($category->id == $post->category_id)
	        	<option value="{{$category->id}}" selected>{{$category->name}}</option>
	        @endif
	        <option value="{{$category->id}}">{{$category->name}}</option>
	      @endforeach
	    </select>
	  </div>
	  <div class="form-group">
	  	<!-- Neu $post->status thi check vao -->
	  	@if($post->status)
		    <input type="radio" name="status" value="1" checked> Public
		    <input type="radio" name="status" value="0"> Unpublic
	  	@else
	  		<input type="radio" name="status" value="1" > Public
		    <input type="radio" name="status" value="0" checked> Unpublic
	  	@endif

	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection