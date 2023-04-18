<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Modification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders()
    {
        if (Auth::user()) {
            return view('frontend.orders.orders')->with([
                'orders' => Order::where('user_id', Auth::user()->id)->get(),
                'categories' => Category::all(),
            ]);          
        }else{
            return redirect()->route('front.login');
        }
    }

    public function orders_store(Request $request)
    {
        if (Auth::user()) {

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'modification_id' => $request->modification_id,
                'quantity' => $request->quantity,
            ]);

            return redirect()->route('front.orders');

        }else{
            return redirect()->route('front.login');
        }

    }

    public function orders_confirmation()
    {
        return redirect()->route('main')->with('success', "So'rovingiz yuborildi. Tez orada menejer buyurtmani muvoffiqlashtirish uchun siz bilan bog'lanadi.");
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->back();
    } 

    public function destroyAll()
    {
        DB::table('orders')->delete();

        return redirect()->back()->with('success', "Buyurtmalar bekor qilindi!");
    }
}
