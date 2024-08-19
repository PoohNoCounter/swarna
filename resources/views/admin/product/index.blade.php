<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        {{ __('Product') }}
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
                <th>{{ __('Category') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Quantity') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Price') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Image') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Date') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($product->type->category->name ?? '-', 12) }}
                        ({{ $product->type->name ?? '-' }})
                    </td>
                    <td>{{ Str::limit($product->name ?? '-', 12) }}</td>
                    <td class="d-none d-lg-table-cell">{{ Str::limit($product->desc, 30) ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $product->quantity ?? '0' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $product->price ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($product->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}"
                                alt="{{ Str::limit($product->name ?? '-', 12) }}" width="100">
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
                                                    <h3 class="card-title">{{ Str::limit($product->name ?? '-', 12) }}
                                                    </h3>
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
                                                        Image</a>
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
                <th>{{ __('Category') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Quantity') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Price') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Image') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Date') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

    @section('activeProduct', 'aktif')
</x-admin-table>
