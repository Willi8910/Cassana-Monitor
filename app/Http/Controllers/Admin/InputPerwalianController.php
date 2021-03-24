<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InputPerwalianFormRequest;
use App\Inputperwalian;

class InputPerwalianController extends Controller
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
     * @param  \App\Http\Requests\InputPerwalianFormRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tambahperwalian = new Inputperwalian(array(
            'nama' => $request->get('nama'),
            'tanggal_mulai' => $request->get('tanggal_mulai'),
            'tanggal_selesai' =>$request->get('tanggal_selesai'),
            ));
        $tambahperwalian->save();
       return $request->all();
    }
    public function list()
    {
        $listperwalians = Inputperwalian::all();
        return view('pages.adminlistperwalian', ['listperwalians'=> $listperwalians]);
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
        Inputperwalian::where('id', $id)->delete();
        $listperwalians = Inputperwalian::all();
        return view('pages.adminlistperwalian', ['listperwalians'=> $listperwalians]);
    }
}
