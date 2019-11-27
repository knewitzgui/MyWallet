<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Http\Requests\AuthLoginRequest;

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

    public function login(Request $request)
    	{

    			$credentials = $request->only('email', 'password');

    			if (Auth::guard('users')->attempt($credentials, $request->get('remember_token') == 1)) {
    					return view('manager')->with('success','Login efetuado com Sucesso!');
    			}

    			return view('login')->with('error', 'Não encontramos nenhum usuário com os dados informados');
    	}

    public function googleRedirect(){
      return Socialite::driver('google')->redirect();
    }

    public function googleReturn(){
        # se o usaurio já possui login

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error','Ocorreu um erro ao efetuar o login com o Google. Por favor tente novamente');
        }

        // check if they're an existing user
        $existingUser = Donator::where('email', $user->email)->first();

        if($existingUser){
            // log them in
            auth('donators')->login($existingUser, true);

            if(Session::has('redirect_url')){
                return redirect()->to( session('redirect_url') );
            }

            return redirect()->route('auth.profile');

        } else {
            // create a new user
            $newUser                  = new Donator;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->complete = 0;
            $newUser->save();

            auth('donators')->login($newUser, true);

            return redirect()->route('auth.profile.create');
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
            return redirect()->route('home')->with('error','Ocorreu um erro ao efetuar o login com o Faebook. Por favor tente novamente');
        }

        // check if they're an existing user
        $existingUser = Donator::where('email', $user->email)->first();

        if($existingUser){
            // log them in
            auth('donators')->login($existingUser, true);

            if(Session::has('redirect_url')){
                return redirect()->to( session('redirect_url') );
            }

            return redirect()->route('auth.profile');

        } else {
            // create a new user
            $newUser                  = new Donator;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->complete = 0;
            $newUser->save();

            auth('donators')->login($newUser, true);

            return redirect()->route('auth.profile.create');
        }

      }

}
