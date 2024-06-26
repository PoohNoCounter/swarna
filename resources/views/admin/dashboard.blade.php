<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Dashboard
    </x-slot>

    <!-- Content -->
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $users }}</h3>

                    <p>{{ __('Akun Pengguna') }}</p>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $categories }}</h3>

                    <p>{{ __('Kategori') }}</p>
                </div>
                <a href="{{ route('admin.category.index') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $inventories }}</h3>

                    <p>{{ __('Inventaris') }}</p>
                </div>
                <a href="{{ route('admin.inventory.index') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $schedules }}</h3>

                    <p>{{ __('Jadwal Event') }}</p>
                </div>
                <a href="{{ route('admin.schedule.index') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $bookings }}</h3>

                    <p>{{ __('Pemesanan') }}</p>
                </div>
                <a href="{{ route('admin.booking.index') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $products }}</h3>

                    <p>{{ __('Produk') }}</p>
                </div>
                <a href="{{ route('admin.product.index') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        @section('activeDashboard', 'aktif')
</x-admin-layout>
