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
          <li class="active">Users</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          @can('create-user')
            <div class="box-body">
              <a href="{{ route('users.create') }}" class="btn btn-app"><i class="fa fa-user-plus" aria-hidden="true"></i>
            Novo Usuário</a>
            </div>
          @endcan

          <div class="box-body table-responsive pad">
            @if (count($users) > 0)
              <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th class="text-center">Status</th>
                <th class="text-center">Criado em</th>
                <th>Ações</th>
              </tr>
              </thead>
              <tbody>
            @endif
            @forelse ($users as $key => $user)
                <tr>
                  <td>{{ $user->name }} </td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if (count($user->roles) > 0)
                        @forelse ($user->roles as $key => $role)
                            {{ $role->name }}
                        @empty

                        @endforelse
                    @endif
                  </td>
                  @if ($user->status)
                    <td class="text-center"><small class="label label-success"><i class="fa fa-check"></i> Liberado</span></td>
                  @else
                    <td class="text-center"><small class="label label-danger"><i class="fa fa-ban"></i> Bloqueado</span></td>
                  @endif
                  <td class="text-center">{{ $user->created_at->format('d/m/Y') }}</td>
                  <td>
                    <div class="btn-group">
                      @if ($user->status)
                        <a href="{{ route('users.status', ['id' => $user->id, 'status' => 0]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Bloquear"><i class="fa fa-ban"></i></button></a>
                      @else
                        <a href="{{ route('users.status', ['id' => $user->id, 'status' => 1]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liberar"><i class="fa fa-check"></i></button></a>
                      @endif
                      <a href="#"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o"></i></button></a>
                      <a href="#"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash"></i></button></a>

                    </div>


                  </td>
                </tr>
            @empty
              <div class="alert alert-info">
                <h4 class="text-center"><i class='icon fa fa-info'></i> Sem informação!</h4>
                <p class="text-center">Sem registros cadastrados no momento.</p>
              </div>
            @endforelse
            @if (count($users) > 0)
              </tbody>
            </table>
            {{ $users->links() }}
            @endif
          </div>
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

@endsection
