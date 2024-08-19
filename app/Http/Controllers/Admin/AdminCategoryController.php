<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:500',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'desc' => $request->desc,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Success Create Data Category!');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:500',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $category->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Success Edit Data Category!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('alert', 'Success Delete Data Category!');
    }
}
