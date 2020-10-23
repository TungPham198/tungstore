<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //getlogin
    public function getLogin(){
    	return view('admin.login');
    }
    //postlogin
    public function postLogin(Request $request){
    	if (Auth::attempt(['email'=>$request->email,'password'=>$request->pass])) {
    		# code...
    		return redirect('admin/dashboard');
    	}else{
    		return back()->withInput()->with('errlogin','Đăng nhập thất bại !!!');
    	}
    }
}
