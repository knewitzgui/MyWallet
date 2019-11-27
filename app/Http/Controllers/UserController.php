<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{

		protected $user;

		public function __construct(UserRepository $users)
		{
				$this->users = $users;
		}

	public function index()
	{
		return view('profile', [
			'page' => 'profile'
		]);
	}

	public function update($id, UserUpdateRequest $request)
    {
        $user = $this->users->update($id, $request->all());

		return response()->manager([
				'route'   => route('profile'),
				'message' => 'Dados atualizados com sucesso',
		]);
	}

	public function register()
		{
			return view('register', [
				'page' => 'register'
			]);
	}
}
