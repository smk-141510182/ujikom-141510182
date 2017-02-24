<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;
use App\User;
use App\pegawaim;
use App\jabatanm;
use App\golonganm;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class Pegawaic extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawaiv = pegawaim::all();
        return view('pegawaif.index', compact('pegawaiv'));
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
        return view('pegawaif.create', compact('jabatanv', 'golonganv'));
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

        $this->validate($request, [
            'name' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'permission' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);

        $users = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);

        if($request->hasFile('photo'))
        {
            //mengambil file yang di upload
            $uploaded_photo = $request->file('photo');
            //mengambil extension file
            $extension = $uploaded_photo->getClientOriginalExtension();
            //membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;
            //menyimpan file ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_photo->move($destinationPath, $filename);
            //mengisi filed cover di book dengan filename yang baru dibuat

            $pegawais = new pegawaim;
            $pegawais->nip = $request->get('nip');
            $pegawais->user_id = $users->id;
            $pegawais->jabatan_id = $request->get('jabatan_id');
            $pegawais->golongan_id = $request->get('golongan_id');
            $pegawais->photo = $filename;
            $pegawais->save();
        }

        return redirect('Pegawai');
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
        $pegawaiv = pegawaim::find($id);
        return view('pegawaif.show', compact('$pegawaiv'));
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
        $pegawaiv = pegawaim::find($id);
        $jabatanv = jabatanm::all();
        $golonganv = golonganm::all();
        return view('pegawaif.edit', compact('pegawaiv', 'jabatanv', 'golonganv'));
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
        $pegawaiv = pegawaim::find($id);
        if($request->hasFile('photo'))
        {
            $filename = null;
            $uploaded_photo = $request->file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_photo->move($destinationPath, $filename);
            if($pegawaiv->photo)
            {
                $old_photo = $pegawaiv->photo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' .
                DIRECTORY_SEPARATOR . $pegawaiv->photo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {

                }
            }

            $pegawaiv->nip = $request->get('nip');
            $pegawaiv->jabatan_id = $request->get('jabatan_id');
            $pegawaiv->golongan_id = $request->get('golongan_id');
            $pegawaiv->photo = $filename;
            $pegawaiv->save();
        }

        return redirect('Pegawai');

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
        pegawaim::find($id)->delete();
        return redirect('Pegawai');
    }
}
