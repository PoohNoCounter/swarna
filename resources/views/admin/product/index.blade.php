<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Produk
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.product.create')
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Kategori') }}</th>
                <th>{{ __('Nama') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Deskripsi') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Harga') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Gambar') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Tanggal') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->type->category->name ?? '-' }} ({{ $product->type->name ?? '-' }})</td>
                    <td>{{ $product->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $product->desc ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $product->price ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($product->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $product->name }}"
                                width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $product->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $product->img) }}"
                                    alt="{{ $product->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $product->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('assets/img/' . $product->img) }}"
                                                        alt="{{ $product->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $product->img) }}"
                                                        download="{{ $product->img }}"
                                                        class="btn btn-success mt-2 col-12">Download
                                                        Gambar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="d-none d-lg-table-cell">{{ date('d F Y', strtotime($product->updated_at)) ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.product.edit')
                            @include('admin.product.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Kategori') }}</th>
                <th>{{ __('Nama') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Deskripsi') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Harga') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Gambar') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Tanggal') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </tfoot>
    </table>

    @section('activeProduct', 'aktif')
</x-admin-table>
