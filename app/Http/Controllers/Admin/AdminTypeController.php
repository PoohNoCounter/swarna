<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTypeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $types = Type::all()->reverse();
        return view('admin.type.index', compact('categories', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $type = Type::create([
            'id' => Str::uuid(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'desc' => $request->desc,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $type->name . '_' . $img->getClientOriginalExtension();
            $type->img = $file_name;
            $type->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Success Create Data type!');
    }

    public function update(Request $request, $id)
    {
        $type = Type::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $type->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'desc' => $request->desc,
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $type->name . '_' . $img->getClientOriginalExtension();
            $type->img = $file_name;
            $type->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Success Edit Data type!');
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return back()->with('alert', 'Success Delete Data type!');
    }
}
