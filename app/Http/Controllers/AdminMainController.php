<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index() {
        return view('admin')->with([
            'users' => User::all(),
            'categories' => Category::all(),
            'products' => Product::all(),
            'orders' => Order::all(),
            'checked_orders' => Order::where('status', '1')->get(),
            'new_orders' => Order::where('status', '0')->get(),
        ]);
    }
}
