<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        // se o usuario estiver logado com o middleware guest, ira avaliar qual o guard associado e redirecionará para
        // a pagina principal de acordo com o guard
        switch ($guard){
        case 'aluno':
            if(Auth::guard($guard)->check()){
                return redirect()->route('aluno.index');
            }
            break;
         case 'exaluno':
            if(Auth::guard($guard)->check()){
                return redirect()->route('exaluno.index');
            }
            break;
        default:
            if (Auth::guard($guard)->check()) {
                return redirect('/admin');
            }
            break;
        }

        return $next($request);
    }
}
