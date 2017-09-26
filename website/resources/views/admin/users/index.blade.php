@extends('layouts.admin.app-admin')

@section('conteudo')
  <div class="page-title">
    <div class="title_left">
      <h3><i class='fa fa-users'></i> Gerenciamento de Usuários</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <form action="{{ route('users.pesquisa') }}" method="post" style="display: ;">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="busca" value="{{ isset($busca) ? $busca : '' }}" class="form-control" placeholder="Pesquisar por...">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Usuários do sistema</h2>
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
          <div class="row">
            @can('create-user')
              <div class="box-body">
                <a href="{{ route('users.create') }}" class="btn btn-app"><i class="fa fa-user-plus" aria-hidden="true"></i> Novo Usuário</a>
              </div>
            @endcan
          </div>
          <div class="row">
          </div>
          <!-- Conteudo -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content table-responsive">
                @component('components.alert-success')
                  @slot('type')
                    success
                  @endslot
                  @slot('icon')
                    <i class="fa fa-thumbs-up fa-2x pull-left" aria-hidden="true" style='margin-left:10px'></i>
                  @endslot
                  @slot('title')
                    <h3>Sucesso!</h3>
                  @endslot
                @endcomponent

                @if (count($users) > 0)
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $key => $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if (count($user->roles) > 0)
                            @forelse ($user->roles as $key => $role)
                                <span class="label label-default">{{ $role->name }}</span>
                            @empty
                            @endforelse
                          @endif
                        </td>
                        @if ($user->status)
                          <td class="text-center"><small class="label label-success"><i class="fa fa-check"></i> <span>Liberado</span></small></td>
                        @else
                          <td class="text-center"><small class="label label-danger"><i class="fa fa-ban"></i> <span>Bloqueado</span></small></td>
                        @endif
                        <td class="text-center">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                          <div class="btn-group  btn-group-sm">
                            @if ($user->status)
                              <a class="btn btn-default" href="{{ route('users.status', ['id' => $user->id, 'status' => 0]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bloquear"><i class="fa fa-ban"></i></a>
                            @else
                              <a class="btn btn-default" href="{{ route('users.status', ['id' => $user->id, 'status' => 1]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Liberar"><i class="fa fa-check"></i></a>
                            @endif
                              <a class="btn btn-default" href="{{ route('users.edit', ['id' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><i class='fa fa-edit'></i></a>
                              <a href="{{ route('users.destroy', ['id' => $user->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form{{$user->id}}').submit();" class="btn btn-default btn-flat" data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>
                              <form id="delete-form{{$user->id}}" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post" style="display: none">
                                  {{ csrf_field() }}
                                  {!! method_field('DELETE') !!}
                              </form>
                              <a class="btn btn-default" href="{{ route('users.show', ['id' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reset Password"><i class='fa fa-key'></i></a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{ $users->links() }}
                @else
                  @component('components.alert')
                    @slot('type')
                      info
                    @endslot
                    @slot('icon')
                      <i class="fa fa-info fa-2x" aria-hidden="true" style='margin-left:10px'></i>
                    @endslot
                    @slot('title')
                    @endslot
                    <p class="text-center"><strong>Sem registros para exibir</strong></p>
                  @endcomponent
                @endif
              </div>
            </div>
          </div>
          <!-- -->
        </div>
      </div>
    </div>
  </div>
@endsection
