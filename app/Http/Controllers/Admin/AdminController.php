<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TambahKelasFormRequest;
use App\Matakuliah;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TambahKelasFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahKelasFormRequest $request)
    {
        //
        
     $tambahkelas = new Matakuliah(array(
            'kode_matkul' => $request->get('kode_matkul'),
            'nama' => $request->get('nama'),
            'jumlah_sks' =>$request->get('jumlah_sks'),
            'semester' =>$request->get('semester')
            ));
        $tambahkelas->save();
       return view('pages.adminpage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listMatkul()
    {
        //
        $listmatkuls = Matakuliah::all();
        return view('pages.adminpagelist', ['listmatkul'=> $listmatkuls]);
    }

    public function show($id)
    {
        //
        $showmatkuls = Matakuliah::all();
        return view('pages.adminpageshow', ['showmatkul'=> $showmatkuls]);
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
        Matakuliah::where('id', $id)->delete();
        $listmatkuls = Matakuliah::all();
        return view('pages.adminpagelist', ['listmatkul'=> $listmatkuls]);
        //return $id;
    }
}
