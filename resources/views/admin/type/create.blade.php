<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-primary" data-toggle="modal" data-target="#modalFormCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Create') }}</span></button>

<!-- Modal -->
<div class="modal fade" id="modalFormCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.type.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Tambah Data') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Name..." name="name" id="name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Category') }}</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id" required>
                                <option selected disabled>{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="Description..." name="desc"
                                id="desc" rows="3"></textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Image') }}</label>
                            <input id="image-input" accept="image/*" type="file"
                                class="form-control @error('img') is-invalid @enderror" placeholder="img" name="img"
                                id="img">
                            <img class="img-fluid py-3" id="image-preview" width="200px"
                                src="{{ asset('assets/profile/default.png') }}" alt="Image Preview">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
