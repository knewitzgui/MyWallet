<?php

namespace App\Http\Controllers;

use Auth;

class ManagerController extends Controller
{

	public function index()
	{
		if(Auth::check()){
		return view('manager', [
			'page' => 'manager'
		]);
	}else{
		return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
	}
	}
}