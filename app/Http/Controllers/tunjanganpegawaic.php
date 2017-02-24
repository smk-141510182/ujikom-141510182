<?php

namespace App\Http\Controllers;

use Request;
use App\tunjangan_pegawaim;
use App\tunjanganm;
use App\pegawaim;
use App\User;

class tunjanganpegawaic extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tunjanganpegawaiv = tunjangan_pegawaim::all();
        $tunjanganv = tunjanganm::all();
        return view('tunjanganpegawai.index', compact('tunjanganpegawaiv', 'tunjanganv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $pegawaiv = pegawaim::all();
        $tunjanganv = tunjanganm::all();
        $tunjanganpegawaiv = tunjangan_pegawaim::all();
        return view('tunjanganpegawai.create', compact('users', 'pegawaiv', 'tunjanganv', 'tunjanganpegawaiv'));
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
        $tunjanganpegawaiv = Request::all();
        tunjangan_pegawaim::create($tunjanganpegawaiv);
        return redirect('TunjanganPegawai');
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
        $tunjanganpegawaiv = tunjangan_pegawaim::find($id);
        $tunjanganv = tunjanganm::all();
        $pegawaiv = pegawaim::all();
        $users = User::all();
        return view('tunjanganpegawai.edit', compact('tunjanganpegawaiv', 'tunjanganv', 'pegawaiv', 'users'));
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
        $tunjanganpegawaiUpdate = Request::all();
        $tunjanganpegawaiv = tunjangan_pegawaim::find($id);
        $tunjanganpegawaiv->update($tunjanganpegawaiUpdate);
        return redirect('TunjanganPegawai');
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
        tunjangan_pegawaim::find($id)->delete();
        return redirect('TunjanganPegawai');
    }
}
