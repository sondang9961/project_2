<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

/**
 * 
 */
class dang_nhap_controller extends Controllers
{
	
	function get_dang_nhap()
	{
		return view('view_dang_nhap');
	}

	function post_dang_nhap()
	{
		
	}
}