<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Category;
use App\Models\Type;
use App\Models\Inventory;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $schedules = Schedule::all()->count();
        $inventories = Inventory::all()->count();
        $bookings = Booking::all()->count();
        $categories = Category::all()->count();
        $types = Type::all()->count();
        return view('admin.dashboard', compact('users', 'products', 'schedules', 'inventories', 'bookings', 'categories', 'types'));
    }
}
