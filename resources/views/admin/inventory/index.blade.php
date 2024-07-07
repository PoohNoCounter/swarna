<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Inventaris
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.inventory.create')
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Image') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Date') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventory->type->category->name ?? '-' }} ({{ $inventory->type->name ?? '-' }})</td>
                    <td>{{ $inventory->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $inventory->desc ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($inventory->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $inventory->name }}"
                                width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $inventory->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $inventory->img) }}"
                                    alt="{{ $inventory->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $inventory->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $inventory->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $inventory->img) }}"
                                                        alt="{{ $inventory->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $inventory->img) }}"
                                                        download="{{ $inventory->img }}"
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
                    <td class="d-none d-lg-table-cell">{{ date('d F Y', strtotime($inventory->updated_at)) ?? '-' }}
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.inventory.edit')
                            @include('admin.inventory.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Image') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Date') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

    @section('activeInventory', 'aktif')
</x-admin-table>
