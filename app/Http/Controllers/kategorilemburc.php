<?php

namespace App\Http\Controllers;

use Request;
use App\kategori_lemburm;
use App\jabatanm;
use App\golonganm;

class kategorilemburc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategorilemburv = kategori_lemburm::all();
        $jabatanv = jabatanm::all();
        $golonganv = golonganm::all();
        return view('kategorilemburf.index', compact('kategorilemburv', 'jabatanv', 'golonganv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatanv = jabatanm::all();
        $golonganv = golonganm::all();
        return view('kategorilemburf.create', compact('jabatanv', 'golonganv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $kategorilemburv = Request::all();
        kategori_lemburm::create($kategorilemburv);
        return redirect('KategoriLembur');
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
    public function edit($id)
    {
        //
        $kategorilemburv = kategori_lemburm::find($id);
        $jabatanv = jabatanm::all();
        $golonganv = golonganm::all();
        return view('kategorilemburf.edit', compact('kategorilemburv', 'jabatanv', 'golonganv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kategoriUpdate = Request::all();
        $kategorilemburv = kategori_lemburm::find($id);
        $kategorilemburv->update($kategoriUpdate);
        return redirect('KategoriLembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        kategori_lemburm::find($id)->delete();
        return redirect('KategoriLembur');
    }
}
