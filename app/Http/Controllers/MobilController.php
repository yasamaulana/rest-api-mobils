<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Mobil();
        $foto = time() . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('mobil', $foto);
        $model->foto = $foto;
        $model->judul = $request->judul;
        $model->harga = $request->harga;
        $model->deskripsi = $request->deskripsi;
        $model->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Mobil::find($id);
        if ($request->foto == '') {
            $model->foto = $request->oldfoto;
        } else {
            $foto = time() . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('mobil', $foto);
            Storage::delete('mobil/' . $request->oldfoto);
            $model->foto = $foto;
        }
        $model->judul = $request->judul;
        $model->harga = $request->harga;
        $model->deskripsi = $request->deskripsi;
        $model->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Mobil::find($id);
        Storage::delete('mobil/' . $model->foto);
        $model->delete();
        return back();
    }
}
