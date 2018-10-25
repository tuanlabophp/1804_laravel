<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
    	// Eloquent all() : Lay tat ca cac ban ghi trong bang
    	// $posts = Post::all()->toJson();
    	$posts = Post::all();

    	// Eloquent find() : Lay ra ban ghi theo id
    	// $post = Post::find(1);
    	// Eloquent findOrFail : Lay ra ban ghi theo id, neu k co thi bao loi
    	// $post = Post::findOrFail(2);

    	// Eloquent count() : Dem so ban ghi trong bang
    	$count = Post::count();

    	// Eloquent where()->get() : Truy van theo dieu kien
    	// $publicPosts = Post::where('status', 1)->get();
    	// Eloquent where()->fisrt : Truy van theo dieu kien lay ra ban ghi dau tien
    	$publicPosts = Post::where('status', 1)->first();
    	$idPosts = Post::where('id', '>', 1)->get();
    	return view('listPost', ['posts' => $posts]);
    }

    public function store()
    {
    	// Khoi tao doi tuong
    	$post = new Post();
    	// Gan gia tri
    	$post->title = 'New post';
    	$post->description = 'New desc';
    	$post->status = 1;
    	// Luu: Eloquent save()
    	$post->save();

    	return Post::all();
    }

    public function update()
    {
    	$post = Post::find(6);
    	// Cach 1
    	$post->title = 'Update post';
    	$post->description = 'Update desc';
    	$post->save();
    	// Cach 2: Eloquent update([du lieu])
    	$post->update([
    		'title' => 'Update cach 2',
    		'status' => 3
    	]);

    	return Post::all();
    }

    public function delete()
    {
    	// Cach 1, su dung Eloquent delete()
    	$post = Post::find(5);
    	// $post = Post::findOrFail(5);
    	if ($post) {
    		$post->delete();
    	} else {
    		echo 'Post not found';
    	}

    	//Cach 2, su dung Eloquent destroy(id)
    	Post::destroy(3);

    	return Post::all();
    }
}
