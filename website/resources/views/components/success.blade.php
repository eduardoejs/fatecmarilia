@if ($message = session('msg'))
  <div class="alert alert-{{$type}}">
    <div class="row">
      <div class="alert-title">
        {{$icon}}
        {{ $title }}
      </div>
    </div>
    {{ $slot }}
    {{ $message }}
  </div>
@endif
