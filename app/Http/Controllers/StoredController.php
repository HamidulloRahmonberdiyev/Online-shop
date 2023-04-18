<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stored;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoredController extends Controller
{
    public function storeds()
    {
        if (Auth::user()) {
            return view('frontend.storeds.storeds')->with([
                'storeds' => Stored::where('user_id', Auth::user()->id)->paginate(6),
                'categories' => Category::all(),
            ]);
        }else{
            return redirect()->route('front.login');
        }
    }

    public function add_store(Request $request)
    {
        if (Auth::user()) {
            $stored = Stored::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
            ]);
            return redirect()->route('front.storeds');
        }else{
            return redirect()->route('front.login');
        }
    }

    public function destroy(Stored $stored)
    {
        $stored->delete();

        return redirect()->back();
    }
}
