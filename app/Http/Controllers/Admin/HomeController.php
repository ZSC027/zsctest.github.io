<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //2020-4-6
	public function index(){
		return view('admin/home');       //加载输出模板文件home.blade.php
	}
}
