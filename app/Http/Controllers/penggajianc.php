<?php

namespace App\Http\Controllers;

use Request;
use App\penggajianm;
use App\tunjangan_pegawaim;
use App\pegawaim;

class penggajianc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penggajianv=penggajianm::all();
        $tunjanganpegawaiv=tunjangan_pegawaim::all();
        return view('penggajianf.index', compact('penggajianv', 'tunjanganpegawaiv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjanganpegawaiv=tunjangan_pegawaim::all();
        $pegawaiv=pegawaim::all();
        return view('penggajianf.create', compact('tunjanganpegawaiv', 'pegawaiv'));
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
        $penggajianv=Request::all();
        penggajianm::create($penggajianv);
        return redirect ('Penggajian');
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
        $penggajianv=penggajianm::find($id);
        return view('penggajianf.edit', compact('penggajianv'));
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
        $penggajianupdate = Request::all();
        $penggajianv= penggajianm::find($id);
        $penggajianv->update($penggajianupdate);
        return redirect('Penggajian');
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
        penggajianm::find($id)->delete();
        return redirect('Penggajian');
    }
}
