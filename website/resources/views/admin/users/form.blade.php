<div class="form-group">
  <label for="name">Nome:</label>
  @if (isset($user->nome))
    <input type="text" name="name" value="{{ old('nome', $user->nome) }}" class="form-control" id="name" placeholder="Nome do usuário" required>
  @else
    <input type="text" name="name" value="{{ old('nome') }}" class="form-control" id="name" placeholder="Nome do usuário" required>
  @endif
</div>
<div class="form-group">
  <label for="email">E-Mail:</label>
  @if (isset($user->email))
    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" id="email" placeholder="E-Mail do usuário" required>
  @else
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="E-Mail do usuário" required>
  @endif
</div>
<div class="form-group">
  <div class="checkbox">
    <label>

      @if (isset($user))
        @if ($user->status)
          <input type="checkbox" name="status" checked> Usuário ATIVO no sistema
        @else
          <input type="checkbox" name="status"> Usuário ATIVO no sistema
        @endif
      @else
        <input type="checkbox" name="status" checked> Usuário ATIVO no sistema
      @endif

    </label>
  </div>
</div>
