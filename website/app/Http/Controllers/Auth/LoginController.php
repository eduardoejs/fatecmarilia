<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function login(Request $request)
    {
        // Valida as informações recebidas pelo Request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $username = $request->email;
        $password = $request->password;

        // Checa a tentativa de login do usuário. Só será aceito, se além das informações estiverem corretas,
        // o status do usuário for true (1).
        if(\Auth::attempt(['email' => $username, 'password' => $password, 'status' => 1])){
            return redirect()->route('admin.index');
        } else {
            return redirect()->to('/login')
                    ->withErrors(['email' => 'Credenciais inválidas!'])
                    ->withInput(['email' => $username]);
        }
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
