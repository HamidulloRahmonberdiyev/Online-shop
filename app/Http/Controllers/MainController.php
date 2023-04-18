<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('main')->with([
            'categories' => Category::all(),
            'latest_products' => Product::latest()->get()->take(8),
            'recent_products' => Product::get()->take(8),
            'discount_products' => Product::latest()->get()->take(2),
        ]);
    }
}
