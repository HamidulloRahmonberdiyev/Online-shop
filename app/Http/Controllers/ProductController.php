<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Modification;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return view('frontend.products.products')->with([
            'products' => Product::latest()->paginate(6),
            'categories' => Category::all(),
            'modifications' => Modification::all(),
        ]);
    }

    public function product_show(Product $product)
    {
        return view('frontend.products.product_show')->with([
            'product' => $product,
            'new_products' => Product::latest()->get()->take(10),
            'categories' => Category::all(),
            'modifications' => Modification::all(),
        ]);
    }
    
}
