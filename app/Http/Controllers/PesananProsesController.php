<?php

namespace App\Http\Controllers;

use App\Pesanan_proses;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PesananProsesController extends Controller
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProses(Request $request, $id)
    {
        // $proses = Pesanan_proses::all()->where('proses_id',Auth::user()->proses_id)->where("pesanan_id","$id")->first();
        // // echo $proses;
        // $proses->progress = 1;
        // $proses->save();

        $pesanan = Pesanan::find($id);
        if(Auth::user()->proses_id == 1)
        {
            $pesanan->proses_id += 1;
            $pesanan->Proses()->updateExistingPivot(Auth::user()->proses_id,['progress' => 1]);
            $pesanan->project_manager = Auth::user()->name;
            $pesanan->save();
        }
        else
        {
             $pesanan->Proses()->updateExistingPivot(Auth::user()->proses_id,['progress' => $request->pnumber]);
             if($pesanan->proses_id <= Auth::user()->proses_id && $pesanan->proses_id < 6)
             {
                $pesanan->proses_id += 1;
                //Kalo dia proses assembly dan assembly skip maka ditambah 1 lagi untuk skip assembly
                if($pesanan->proses_id == 5 && $pesanan->assembly==0)
                    $pesanan->proses_id += 1;

             }
             else if(Auth::user()->proses_id == 6 && $request->pnumber == $pesanan->jumlah)//kalo usernya proses packing dan packingnya sudah sesuai jumlah maka selesai
             {
                $pesanan->proses_id += 1;
             }
             $pesanan->save();
        }
        
        return redirect('/cassana/'.$id);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesanan_proses  $pesanan_proses
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan_proses $pesanan_proses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan_proses  $pesanan_proses
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan_proses $pesanan_proses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesanan_proses  $pesanan_proses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan_proses $pesanan_proses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan_proses  $pesanan_proses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan_proses $pesanan_proses)
    {
        //
    }
}
