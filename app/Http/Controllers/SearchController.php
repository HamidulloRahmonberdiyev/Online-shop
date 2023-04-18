<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Modification;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(6);

        return view('frontend.products.products')->with([
            'products' => $products,
            'categories' => Category::all(),
            'modifications' => Modification::all(),
        ]);
    }
}
