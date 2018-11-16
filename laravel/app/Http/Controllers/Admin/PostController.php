<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
    	// $posts = Post::all();
    	$posts = Post::with('category')->get();
    	$categories = Category::all();
    	// dd($posts);
    	return view('admin.post.index', [
    		'posts' => $posts, 
    		'categories' => $categories
    	]);
    }

    public function store()
    {

    }

    public function update() {

    }

    public function delete() {

    }
}
