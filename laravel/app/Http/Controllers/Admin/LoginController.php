<?php

namespace App\Http\Controllers\Admin;

use Auth; // Dang nhap
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
    		return redirect('admin');
    	}

    	return view('login.login');
    }

    public function checkLogin(Request $request)
    {
    	$username = $request['username'];
    	$password = $request['password'];

    	$user = Auth::attempt(['username' => $username, 'password' => $password]);

    	if ($user) {
    		return redirect('admin');
    	} else {
    		return $this->index();
    	}
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('admin/login');
    }
}
