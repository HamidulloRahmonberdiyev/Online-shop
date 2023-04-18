<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function search_user(Request $request)
    {
        $users = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(6);

        return view('backend.users.index', compact('users'));
    }

    public function search_product(Request $request)
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

        return view('backend.products.index', compact('products'));
    }
}
