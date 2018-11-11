<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->get();
        $cates = Category::all();
        return view('admin.post.index')->with(['posts' => $posts, 'cates' => $cates]);
    }

    public function store(Request $request) {
        $data = $request->all();
        // dd($data);
        $post = new Post;
        $post['title'] = $data['title'];
        $post['content'] = $data['content'];
        $post['description'] = $data['desc'];
        $post['status'] = $data['status'];
        $post['category_id'] = $data['cate'];
        $post->save();

        return redirect('/admin/post');
    }

    public function delete($id) {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
        }
    }
}
