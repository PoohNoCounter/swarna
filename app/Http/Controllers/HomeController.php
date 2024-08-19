<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Type;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(12);
        $schedules = Schedule::paginate(12);

        return view('client.index', compact('categories', 'products', 'schedules'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        $types = Type::where('category_id', $id)->get();
        $products = Product::whereHas('type', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->get();

        return view('client.show', compact('category', 'products', 'types'));
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = '%' . $validatedData['query'] . '%';

        $products = Product::where('name', 'like', $query)
            ->orWhere('img', 'like', $query)
            ->paginate(50);

        return view('client.search', compact('products'));
    }
}
