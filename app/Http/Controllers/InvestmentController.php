<?php

namespace App\Http\Controllers;

use Auth;

class InvestmentController extends Controller
{

	public function index()
	{
		if(Auth::check()){
		return view('investment', [
			'page' => 'investment'
		]);
	}else{
		return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
	}
	}

	public function privacy(){
		return view('privacy');
	}
}
