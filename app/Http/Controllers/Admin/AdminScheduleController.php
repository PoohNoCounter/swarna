<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminScheduleController extends Controller
{
    public function index()
    {
        $categories = Schedule::all()->reverse();
        return view('admin.schedule.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'datetime' => 'required',
            'location' => 'required',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $schedule = Schedule::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'desc' => $request->desc,
            'datetime' => $request->datetime,
            'location' => $request->location,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $schedule->name . '_' . $img->getClientOriginalExtension();
            $schedule->img = $file_name;
            $schedule->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Success Create Data schedule!');
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'datetime' => 'required',
            'location' => 'required',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $schedule->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'datetime' => $request->datetime,
            'location' => $request->location,
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $schedule->name . '_' . $img->getClientOriginalExtension();
            $schedule->img = $file_name;
            $schedule->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Success Edit Data schedule!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return back()->with('alert', 'Success Delete Data schedule!');
    }
}
