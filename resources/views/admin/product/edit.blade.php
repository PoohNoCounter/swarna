<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $product->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.product.update', $product->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Name..." name="name" id="name" value="{{ $product->name }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Quantity') }}</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                placeholder="10" name="quantity" id="quantity" value="{{ $product->quantity }}"
                                required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Price') }}</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                placeholder="10000" name="price" id="price" value="{{ $product->price }}"
                                required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Category') }}</label>
                            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id"
                                id="type_id" required>
                                <option selected disabled>{{ __('Select Category') }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $type->id == $product->type_id ? 'selected' : '' }}>
                                        {{ $type->category->name ?? '-' }} ({{ $type->name }})</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="Description..." name="desc"
                                id="desc" rows="3">{{ $product->desc }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Image') }}</label><br>
                            @if ($product->img == null)
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/profile/default.png') }}" alt="{{ $product->name }}">
                            @else
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/img/' . $product->img) }}" alt="{{ $product->name }}">
                            @endif
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <input type="file" accept="image/*" id="image-input"
                                class="form-control @error('img') is-invalid @enderror" placeholder="img" name="img"
                                id="img" value="{{ $product->img }}" enabled>
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
