<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class ClientScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::paginate(10);
        return view('client.schedule.index', compact('schedules'));
    }

    public function show(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('client.schedule.show', compact('schedule'));
    }
}
