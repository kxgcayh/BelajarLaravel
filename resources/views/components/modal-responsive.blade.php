{{-- Modal Responsive --}}
<div id="{{ $modalId ?? ''}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="{{ $titleId ?? '' }}">
                    {{ $title ?? '' }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            {{-- Modal Footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">
                    {{__('Close')}}
                </button>
                <button type="submit" class="btn btn-info waves-effect waves-light" id="saveBtn">
                    {{__('Submit')}}
                </button>
            </div>
        </div>
    </div>
</div>
