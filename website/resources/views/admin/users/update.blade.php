@extends('layouts.admin.app-admin')

@section('conteudo')
  <div class="page-title">
    <div class="title_left">
      <h3><i class='fa fa-users'></i> Gerenciamento de Usuários</h3>
    </div>
  </div>
  <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class='fa fa-edit'></i> Alterar usuário do sistema</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a></li>
                  <li><a href="#">Settings 2</a></li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- Conteudo -->
            @component('components.alert-error')
              @slot('type')
                danger
              @endslot
              @slot('icon')
                <i class="fa fa-ban fa-1x" aria-hidden="true" style='margin-left:10px'></i>
              @endslot
              @slot('title')
                <strong>Ops... </strong>Parece que algo deu errado!
              @endslot              
            @endcomponent
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
                  <form class="" action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                    {{ csrf_field() }}
                    {!! method_field('PUT') !!}
                    @include('admin.users.form')
                    <div class="row">
                      <div class="col-md-3">
                        <a href="{{ route('users.index') }}" class="btn btn-default btn-block"><i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
                      </div>
                      <div class="text-center col-md-3">
                        <button type="submit" name="button" class="btn btn-success btn-block" role="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Gravar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- -->
        </div>
      </div>
    </div>
  </div>
@endsection
