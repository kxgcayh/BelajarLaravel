{{-- Button Modal --}}
<button type="button" class="btn btn-{{ $color }} waves-effect waves-light" data-toggle="modal"
    data-target="#{{ $targetId ?? '' }}" onClick="{{ $onclick ?? '' }}" id="{{ $id }}">
    {{ $slot }}
</button>

{{-- Example Usage --}}
{{-- <x-modal-button color="primary" target-id="create-modal" onclick="add()">
    {{__('Create')}}
</x-modal-button> --}}
