<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        {{ __('Type') }}
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.type.create')
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Category') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Image') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $type->category->name ?? '-' }}</td>
                    <td>{{ $type->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $type->desc ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($type->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $type->name }}"
                                width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $type->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $type->img) }}"
                                    alt="{{ $type->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $type->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $type->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $type->img) }}"
                                                        alt="{{ $type->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $type->img) }}"
                                                        download="{{ $type->img }}"
                                                        class="btn btn-success mt-2 col-12">Download
                                                        Image</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.type.edit')
                            @include('admin.type.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Category') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Image') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

    @section('activeType', 'aktif')
</x-admin-table>
