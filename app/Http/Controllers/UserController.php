<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class UserController extends Controller
{

		protected $user;

		public function __construct(UserRepository $users)
		{
				$this->users = $users;
		}

	public function index()
	{
		if(Auth::check()){
				$user =  $this->users->findOrFail(Auth::id());

				return view('profile', [
					'page' => 'profile',
					'user' => $user
				]);
		}else{
			return redirect()->route('login')->with('error', 'Você precisa efetuar login para acessar esta página!');
		}

	}

	public function update($id, UserUpdateRequest $request)
    {
        $user = $this->users->update($id, $request->all());

		return redirect()->route('profile')->with('message', 'Dados atualizados com sucesso!');
	}

	public function register()
		{
			return view('register', [
				'page' => 'register'
			]);
	}
}
