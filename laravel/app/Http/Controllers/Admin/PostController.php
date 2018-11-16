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

    public function store(Request $request)
    {
        // $data = $request->all();
        $data = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'description' => $request->get('desc'),
            'category_id' => $request->get('category_id'),
            'status' => $request->get('status')
        ];

        Post::create($data);

        return redirect('admin/post');
    }

    public function edit($id) {
        // Tim bai post can duoc update theo id
        $post = Post::find($id);
        // Lay ra tat ca category
        $categories = Category::all();
        //Tra ve view kem du lieu $post
        return view('admin.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request) {
        $data = $request->all();
        $data['description'] = $request->get('desc');
        $post = Post::find($data['id']);
        $post->update($data);

        return redirect('admin/post');
    }

    public function delete($id) {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
        } 

        return redirect('/admin/post');
    }
}
