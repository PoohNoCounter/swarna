<?php
use Carbon\Carbon;
?>
<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Jadwal Event
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.schedule.create')
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Nama') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Tanggal') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Deskripsi') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $schedule->name ?? '-' }}</td>
                    <td>{{ Carbon::parse($schedule->datetime)->translatedFormat('l, d F Y') }}</td>
                    <td class="d-none d-lg-table-cell">{{ $schedule->desc ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.schedule.edit')
                            @include('admin.schedule.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Nama') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Tanggal') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Deskripsi') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </tfoot>
    </table>

    @section('activeSchedule', 'aktif')
</x-admin-table>
