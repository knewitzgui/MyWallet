<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\ExpenseRepository;

class ManagerController extends Controller
{
	protected $expense;

	public function __construct(ExpenseRepository $expenses)
	{
			$this->expenses = $expenses;
	}

	public function index(Request $request)
	{
		if(Auth::check()){
		return view('manager', [
			'page' => 'manager',
			'expenses' => $this->expenses->manager($request),
		]);
	}else{
		return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
	}
	}

	public function recurrent()
	{
		if(Auth::check()){
			return view('recurrent', [
				'page' => 'recurrent'
			]);
		}else{
			return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
		}
	}

	public function expenseStore(Request $request)
	{

		$this->expenses->create($request->all());

		return redirect()->route('manager')->with('message', 'Conta inserida com sucesso!');
	}

	public function expense()
	{
		if(Auth::check()){
			return view('expense', [
				'page' => 'expense'
			]);
		}else{
			return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
		}
	}

	public function extra()
	{
		if(Auth::check()){
			return view('extra', [
				'page' => 'extra'
			]);
		}else{
			return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
		}
	}

}
