<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Dashboard
    </x-slot>

    <!-- Content -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $users }}</h3>

                    <p>{{ __('User Account') }}</p>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $categories }}</h3>

                    <p>{{ __('Category') }}</p>
                </div>
                <a href="{{ route('admin.category.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $types }}</h3>

                    <p>{{ __('Type') }}</p>
                </div>
                <a href="{{ route('admin.type.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $inventories }}</h3>

                    <p>{{ __('Inventory') }}</p>
                </div>
                <a href="{{ route('admin.inventory.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $schedules }}</h3>

                    <p>{{ __('Event Schedule') }}</p>
                </div>
                <a href="{{ route('admin.schedule.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $bookings }}</h3>

                    <p>{{ __('Booking') }}</p>
                </div>
                <a href="{{ route('admin.booking.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box primary-bg">
                <div class="inner">
                    <h3>{{ $products }}</h3>

                    <p>{{ __('Product') }}</p>
                </div>
                <a href="{{ route('admin.product.index') }}" class="small-box-footer">Manage Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        @section('activeDashboard', 'aktif')
</x-admin-layout>
