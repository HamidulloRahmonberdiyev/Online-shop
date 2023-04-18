<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Modification;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index')->with([
            'products' => Product::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create')->with([
            'categories' => Category::all(),
            'modifications' => Modification::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'content' => $request->content,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product-images', 'public');
                $images = Image::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }

        if (isset($request->modifications)) {
            foreach ($request->modifications as $modification) {
                $product->modifications()->attach($modification);
            }
        }

        return redirect()->route('products.index')->with('success', "Mahsulot muvaffaqiyatli qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show')->with([
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit')->with([
            'product' => $product,
            'categories' => Category::all(),
            'modifications' => Modification::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product, Image $images)
    {
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'content' => $request->content,
        ]);

        if ($request->hasFile('images')) {

            foreach ($product->images as $image) {
                $image->delete();
                Storage::delete('public/' . $image->image);
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('product-images', 'public');
                $images = Image::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }

        if (isset($request->modifications)) {
            if (isset($product->modifications)) {
                DB::table('modification_product')->where('product_id', $product->id)->delete();
            }
            foreach ($request->modifications as $modification) {
                $product->modifications()->attach($modification);
            }
        }

        return redirect()->route('products.index')->with('success', "O'zgartirishlar  saqlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            $image->delete();
            Storage::delete('public/' . $image->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', "Mahsulot o'chirildi!");
    }
}
