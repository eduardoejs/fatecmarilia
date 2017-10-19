@if(Auth::guard('web')->check())
    <a href="{{ route('users.logout') }}"> <i class="fa fa-sign-out pull-right" aria-hidden="true"></i> Sair</a>
@endif

@if(Auth::guard('aluno')->check())
    <a href="{{ route('aluno.logout') }}"> <i class="fa fa-sign-out pull-right" aria-hidden="true"></i> Sair</a>
@endif

@if(Auth::guard('exaluno')->check())
    <a href="{{ route('exaluno.logout') }}"> <i class="fa fa-sign-out pull-right" aria-hidden="true"></i> Sair</a>
@endif
