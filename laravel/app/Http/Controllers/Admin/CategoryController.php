<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = DB::table('categories')->get();
    	return view('admin.category.index', ['categories' => $categories]);
    }

    public function add()
    {
    	return view('admin.category.add');
    }

    public function store(Request $request)
    {
        // Lay request tu input cua nguoi dung gui qua form
        $name = $request->input('cate-name');
        DB::table('categories')->insert(['name' => $name]);

        return $this->index();
    }

    public function edit()
    {
    	return view('admin.category.edit');
    }

    public function delete($id)
    {
        $category = DB::table('categories')->where('id', $id)->get()->toArray();
        if (count($category)) {
            DB::table('categories')->delete($id);
        } 

        return $this->index();
    }
}
