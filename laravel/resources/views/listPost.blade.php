<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td>{{$post->title}}</td>
			<td>{{$post->description}}</td>
			<td>{{$post->status}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
