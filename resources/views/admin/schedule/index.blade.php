<?php
use Carbon\Carbon;
?>
<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        {{ __('Schedule') }}
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
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Date') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($schedule->name ?? '-', 12) }}</td>
                    <td>{{ Carbon::parse($schedule->datetime)->translatedFormat('l, d F Y') }}</td>
                    <td class="d-none d-lg-table-cell">{{ Str::limit($schedule->desc, 30) ?? '-' }}</td>
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
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Date') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Description') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

    @section('activeSchedule', 'aktif')
</x-admin-table>
