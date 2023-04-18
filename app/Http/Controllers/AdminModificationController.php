<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModificationRequest;
use App\Models\Modification;
use Illuminate\Http\Request;

class AdminModificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.modifications.index')->with([
            'modifications' => Modification::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModificationRequest $request)
    {
        $modification = Modification::create([
            'name' => $request->name,
        ]);

        return redirect()->route('modifications.index')->with('success', "Rang muvaffaqiyatli qo'shildi");
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
    public function edit(Modification $modification)
    {
        return view('backend.modifications.edit')->with([
            'modification' => $modification,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreModificationRequest $request, Modification $modification)
    {
        $modification->update([
            'name' => $request->name,
        ]);

        return redirect()->route('modifications.index')->with('success', "O'zgartirishlar saqlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modification $modification)
    {
        $modification->delete();

        return redirect()->route('modifications.index')->with('success', "Rang muvafaqiyatli o'chirildi!");
    }
}
