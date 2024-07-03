<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminInventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        $types = Type::all();
        return view('admin.inventory.index', compact('inventories', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'desc' => 'max:255',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $inventory = Inventory::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'type_id' => $request->type_id,
            'desc' => $request->desc,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $inventory->name . '_' . $img->getClientOriginalExtension();
            $inventory->img = $file_name;
            $inventory->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data Inventory!');
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'desc' => 'max:255',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $inventory->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'desc' => $request->desc,
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $inventory->name . '_' . $img->getClientOriginalExtension();
            $inventory->img = $file_name;
            $inventory->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data Inventory!');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return back()->with('alert', 'Berhasil Hapus Data Inventory!');
    }
}
