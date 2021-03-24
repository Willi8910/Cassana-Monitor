<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TambahClassFormRequest;
use App\Kelasparalel;

class AdminKelasController extends Controller
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
     * @param  \App\Http\Requests\TambahClassFormRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahClassFormRequest $request)
    {
        //
        $tambahkelas = new KelasParalel(array(
            'kp' => $request->get('kp'),
            'kapasitas' => $request->get('kapasitas'),
            'matakuliah_id' =>$request->get('matakuliah_id'),
            'dosen_id' =>$request->get('dosen_id')
            ));
        $tambahkelas->save();
       return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function list()
    {
        $listkelass = Kelasparalel::all();
        return view('pages.adminlistkelas', ['listkelass'=> $listkelass]);
    }

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
        Kelasparalel::where('id', $id)->delete();
        $listkelass = Kelasparalel::all();
        return view('pages.adminlistkelas', ['listkelass'=> $listkelass]);
    }
}
