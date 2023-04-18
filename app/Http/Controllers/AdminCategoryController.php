<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index')->with([
            'categories' => Category::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('category-images', 'public');  
        }

        $category = Category::create([
            'name' => $request->name,
            'image' => $path,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli qo\'shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit')->with([
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        if ($request->hasFile('image')) {
            if (isset($category->image)) {
                Storage::delete('/public' . $category->image);
            }
            $path = $request->file('image')->store('category-images', 'public');
        }

        $category->update([
            'name' => $request->name,
            'image' => $path,
        ]);

        return redirect()->route('categories.index')->with('success', 'O\'zgarishlar saqlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(isset($category->image)) {
            Storage::delete('public/' . $category->image);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli o\'chirildi!');
    }
}
