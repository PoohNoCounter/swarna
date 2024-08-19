<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $schedule->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $schedule->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.schedule.update', $schedule->id) }}"
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
                                placeholder="Name..." name="name" id="name" value="{{ $schedule->name }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Date') }}</label>
                            <input type="datetime-local" class="form-control @error('datetime') is-invalid @enderror"
                                placeholder="datetime" name="datetime" id="datetime" value="{{ $schedule->datetime }}"
                                required>
                            @error('datetime')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Lokasi') }}</label>
                            <textarea class="form-control @error('location') is-invalid @enderror" placeholder="Lampung..." name="location"
                                id="location" rows="3">{{ $schedule->location }}</textarea>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="Description..." name="desc"
                                id="desc" rows="3">{{ $schedule->desc }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Image') }}</label><br>
                            @if ($schedule->img == null)
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/profile/default.png') }}" alt="{{ $schedule->name }}">
                            @else
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/img/' . $schedule->img) }}" alt="{{ $schedule->name }}">
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
                                id="img" value="{{ $schedule->img }}" enabled>
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
