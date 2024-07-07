<?php
use Carbon\Carbon;
?>
@extends('layouts.client.app')

@section('title', 'Detail Schedule')

@section('textEvent', 'primary-bg text-white rounded')

@section('content')

    <div class="py-5">
        <div class="container pt-5 pb-3">
            <div class="card card-danger card-outline">
                <div class="row p-3">
                    <p class="text-left">{{ Carbon::parse($schedule->datetime)->translatedFormat('d F Y') }}
                    </p>
                    <h3 class="text-left">{{ Carbon::parse($schedule->datetime)->translatedFormat('l') }}</h3>
                    <h3 class="text-left fw-bold">{{ $schedule->name }}</h3>
                    <p class="text-left border-bottom pb-2">{{ $schedule->location }}</p>
                    <h4 class="text-left fw-bold">Event Description</h4>
                    <p class="text-left">{{ $schedule->desc }}</p>
                    <div class="text-right">
                        <a href="{{ route('schedule.index') }}" class="btn col-md-2 btn-danger primary-bg">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
