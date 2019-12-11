<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/gerenciador';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function home(){
      return view('login');
    }

    public function logout()
    {
        Auth::guard('users')->logout();

        return redirect()->route('login');
    }

    public function login(Request $request)
    	{
        if(Auth::check()){
          return redirect()->route('manager');
        }else{

    			$credentials = $request->only('email', 'password');

    			if (Auth::guard('users')->attempt($credentials, $request->get('remember_token') == 1)) {
    					return redirect()->route('manager')->with('message','Login efetuado com Sucesso!');
    			}

    			return view('login')->with('error', 'Não encontramos nenhum usuário com os dados informados');
        }
    	}

    public function googleRedirect(){
      return Socialite::driver('google')->redirect();
    }

    public function googleReturn(){
        # se o usaurio já possui login

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
          dd($e);
            return redirect()->route('login')->with('error','Ocorreu um erro ao efetuar o login com o Google. Por favor tente novamente');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){
            // log them in
            auth('users')->login($existingUser, true);

            return redirect()->route('manager')->with('message', 'Autenticado com sucesso!');

        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->save();

            auth('users')->login($newUser, true);

            return redirect()->route('profile');
        }

    }

    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookReturn(){
        # se o usaurio já possui login

        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
          dd($e);
            return redirect()->route('login')->with('error','Ocorreu um erro ao efetuar o login com o Faebook. Por favor tente novamente');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){
            // log them in
            auth('users')->login($existingUser, true);

            return redirect()->route('manager')->with('message', 'Autenticado com sucesso!');

        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->facebook_id       = $user->id;
            $newUser->save();

            auth('users')->login($newUser, true);

            return redirect()->route('profile');
        }

      }

}
