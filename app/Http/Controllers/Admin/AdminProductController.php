<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $types = Type::all();
        return view('admin.product.index', compact('products', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'desc' => 'max:255',
            'price' => 'required',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'type_id' => $request->type_id,
            'desc' => $request->desc,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $product->name . '_' . $img->getClientOriginalExtension();
            $product->img = $file_name;
            $product->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data product!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'desc' => 'max:255',
            'price' => 'required',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'desc' => $request->desc,
            'price' => $request->price,
            'updated_at' => now(),
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $product->name . '_' . $img->getClientOriginalExtension();
            $product->img = $file_name;
            $product->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data product!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('alert', 'Berhasil Hapus Data product!');
    }
}
