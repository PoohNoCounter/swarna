<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->reverse();
        $products = Product::paginate(10);

        return view('client.index', compact('categories', 'products'));
    }

    // public function search(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'query' => 'required|string|max:255',
    //     ]);

    //     $query = '%' . $validatedData['query'] . '%';

    //     $datas = Data::where('name', 'like', $query)
    //         ->orWhere('img', 'like', $query)
    //         ->orWhereHas('tags', function($q) use ($query) {
    //             $q->where('name', 'like', $query);
    //         })
    //         ->paginate(50);

    //     return view('client.search', compact('datas'));
    // }

}
