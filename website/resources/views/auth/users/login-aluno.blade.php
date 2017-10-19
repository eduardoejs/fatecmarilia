@extends('layouts.admin.app-login')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection

@section('conteudo')
  <div class="login-logo">
    <a href="#">Fatec Marília</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">.: ALUNO :. Faça login para iniciar sua sessão</p>

    <form action="{{ route('aluno.login.submit') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group{{$errors->has('email') ? ' has-error' : ''}} has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"  {{$errors->has('email') ? 'id=inputError' : ''}} required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
          <label for="inputError" class="control-label">
            <i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}
          </label>
        @endif
      </div>
      <div class="form-group{{$errors->has('password') ? ' has-error' : ''}} has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
          <label for="inputError" class="control-label">
            <i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}
          </label>
        @endif
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="recuperar_senha">
      <a href="#"><i  class="fa fa-envelope-square"></i> Recuperar minha senha</a><br>
    </div>
  </div>
  <!-- /.login-box-body -->
@endsection
