<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\InvestmentRepository;

class InvestmentController extends Controller
{

	protected $stock;

	public function __construct(InvestmentRepository $stocks)
	{
			$this->stocks = $stocks;
	}

	public function index(Request $request)
	{
		if(Auth::check()){
		return view('investment', [
			'page' => 'investment',
			'stocks' => $this->stocks->manager($request, Auth::user()->id),
		]);
	}else{
		return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
	}
	}

	public function privacy(){
		return view('privacy');
	}

	public function stock(){
		if(Auth::check()){
			return view('stock', [
				'page' => 'stock'
			]);
		}else{
			return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
		}
	}

	public function stockStore(Request $request){

		$request->merge(['user_id' => Auth::user()->id]);
		$this->stocks->create($request->all());

		return redirect()->route('investment')->with('message', 'Investimento inserido com sucesso!');
	}

	public function stockDelete($id){
		$this->stocks->destroy($id);

		return redirect()->route('investment')->with('message', 'Investimento removido com sucesso!');
	}
}
