@extends('layouts.admin.app-admin')

@section('conteudo')

  <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <i class='icon fa fa-users'></i> Gerenciamento de Usuários
          <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="{{ route('admin.index') }}">Admin</a></li>
          <li><a href="{{ route('users.index') }}">Usuários</a></li>
          <li class="active">Novo</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        @component('components.alert')
          @slot('type')
            danger
          @endslot
          @slot('icon')
            <i class="fa fa-ban fa-1x" aria-hidden="true" style='margin-left:10px'></i>
          @endslot
          @slot('title')
            <strong>Ops... </strong>Parece que algo deu errado!
          @endslot
          <hr>
        @endcomponent

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class='icon fa fa-pencil-square-o'></i> Alterar Usuário</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>

          <div class="box-body">
            <form class="" action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">
              @include('admin.users.form')
              <div class="row">
                <div class="text-center col-md-3">
                  <button type="submit" name="button" class="btn btn-primary btn-block" role="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                Gravar</button>
                </div>
                <div class="col-md-3">
                  <a href="{{ route('users.index') }}" class="btn btn-default btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Voltar</a>
                </div>
              </div>
            </form>
          </div>
          <!-- /.box-body -->

        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
@endsection
