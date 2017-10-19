<?php

namespace App\Http\Controllers\Auth\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoLoginController extends Controller
{
    public function __construct()
    {
        // middleware "guest" - nao permite que acesse o dashboard de administracao enquanto estiver logado como usuario
        // middleware "guest:funcionario" - isso nos permite acessar este formulário, mesmo que estivéssemos logados como
        //                            um usuário, porque ainda somos convidados no administrador
        //redireciona para login se a pessoa nao estiver logada como funcionario
        // o array como segundo parametro é para que o middleware "guest" nao seja aplicado ao acessar o logout
        $this->middleware('guest:aluno', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('auth.users.login-aluno');
    }

    public function login(Request $request)
    {
        // Validação do formulário de login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Tentativa de autenticação do usuário
        if(Auth::guard('aluno')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)){
            // If successful, then redirect to their intened location
            return redirect()->intended(route('aluno.index'));
        }
        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('aluno')->logout();
        return redirect('/');
    }
}
