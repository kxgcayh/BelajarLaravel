@if ($message = Session::get('success'))
<div class="alert alert-{{ $type }}">
    {{ $message }}
</div>
@endif
