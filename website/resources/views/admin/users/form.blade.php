<div class="form-group">
  <label for="name">Nome:</label>
  @if (isset($user->name))
    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Nome do usuário" required>
  @else
    <input type="text" name="name" class="form-control" id="name" placeholder="Nome do usuário" required>
  @endif
</div>
<div class="form-group">
  <label for="email">E-Mail:</label>
  @if (isset($user->email))
    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="E-Mail do usuário" required>
  @else
    <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail do usuário" required>
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
