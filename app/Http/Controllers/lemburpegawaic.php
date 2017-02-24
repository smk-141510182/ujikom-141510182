<?php

namespace App\Http\Controllers;

use Request;
use App\lembur_pegawaim;
use App\kategori_lemburm;
use App\pegawaim;

class lemburpegawaic extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lemburpegawaiv=lembur_pegawaim::all();
        $kategorilemburv=kategori_lemburm::all();
        $pegawaiv=pegawaim::all();
        return view('lemburpegawai.index', compact('lemburpegawaiv', 'kategorilemburv', 'pegawaiv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategorilemburv=kategori_lemburm::all();
        $pegawaiv=pegawaim::all();
        return view('lemburpegawai.create', compact('kategorilemburv', 'pegawaiv'));
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
        $lemburpegawaiv=Request::all();
        lembur_pegawaim::create($lemburpegawaiv);
        return redirect ('LemburPegawai');
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
        $lemburpegawaiv=lembur_pegawaim::find($id);
        $pegawaiv=pegawaim::all();
        $kategorilemburv=kategori_lemburm::all();
        return view('lemburpegawai.edit', compact('lemburpegawaiv', 'pegawaiv', 'kategorilemburv'));
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
        $lemburpegawaiupdate = Request::all();
        $lemburpegawaiv= lembur_pegawaim::find($id);
        $lemburpegawaiv->update($lemburpegawaiupdate);
        return redirect('LemburPegawai');
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
        lembur_pegawaim::find($id)->delete();
        return redirect('LemburPegawai');
    }
}
