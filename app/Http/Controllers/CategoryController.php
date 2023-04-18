<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Modification;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Category $category)
    {
        return view('frontend.products.products')->with([
            'category' => $category,
            'categories' => Category::all(),
            'modifications' => Modification::all(),
            'products' => Product::where('category_id', $category->id)->latest()->paginate(6),
        ]);
    }
}
