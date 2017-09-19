
@if (count($errors) != 0)
  <div class="alert alert-{{$type}}">
    <div class="row">
      <div class="alert-title">
        {{$icon}}
        {{ $title }}
      </div>
    </div>

    {{ $slot }}

    @foreach ($errors->all() as $erro)
      <ul>
        <li>{{ $erro }}</li>
      </ul>
    @endforeach
  </div>
@endif
