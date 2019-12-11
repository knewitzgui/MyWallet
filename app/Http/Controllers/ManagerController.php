<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\ExpenseRepository;
use App\Repositories\ExtraRepository;

class ManagerController extends Controller
{
	protected $expense;
	protected $extra;

	public function __construct(ExpenseRepository $expenses, ExtraRepository $extras)
	{
			$this->expenses = $expenses;
			$this->extras = $extras;
	}

	public function index(Request $request)
	{

		if(Auth::check()){
			$all_expenses = $this->expenses->manager($request, Auth::user()->id);
			$all_extras = $this->extras->manager($request, Auth::user()->id);

			$merge = $all_expenses->merge($all_extras);

			$expense_saldo = $this->expenses->saldo(Auth::user()->id);
			$extra_saldo = $this->extras->saldo(Auth::user()->id);

			$saldo = (Auth::user()->income + $extra_saldo) - $expense_saldo;

		return view('manager', [
			'page' => 'manager',
			'moviments' => $merge->sortBy('vcto'),
			'saldo' => $saldo,
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
		$request->merge(['user_id' => Auth::user()->id]);
		$this->expenses->create($request->all());

		return redirect()->route('manager')->with('message', 'Conta inserida com sucesso!');
	}

	public function expenseDelete($id)
	{

		$this->expenses->destroy($id);

		return redirect()->route('manager')->with('message', 'Conta removida com sucesso!');
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

	public function extraStore(Request $request)
	{
		$request->merge(['user_id' => Auth::user()->id]);
		$this->extras->create($request->all());

		return redirect()->route('manager')->with('message', 'Ganho inserido com sucesso!');
	}

	public function extraDelete($id)
	{

		$this->extras->destroy($id);

		return redirect()->route('manager')->with('message', 'Ganho removido com sucesso!');
	}

}
