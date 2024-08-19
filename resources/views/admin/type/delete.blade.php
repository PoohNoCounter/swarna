<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal"
    data-bs-target=".bd-example-modal-sm{{ $type->id }}"><i class="fas fa-trash"></i><span class="d-none d-sm-inline">
        {{ __('Delete') }}</span></button>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm{{ $type->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Delete Data') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete data?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.type.destroy', $type->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger light" name="" id="" value="Delete">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
