<?php

namespace App\Http\Controllers;
use Illuminate\Pagination;
use Illuminate\Http\Request;
use App\Pesanan;
use DB;
use App\Http\Requests\PesananSearchRequest;
use Illuminate\Support\Facades\Auth;

class ProsesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listp()
    {
        
         // $Pesanans = Pesanan::select('pesanans.id AS nomor','nama','desain','proses.nama_proses AS namaproses','proses_id','pesanans.id','deadline')->join('proses','proses.id','=','pesanans.proses_id')->where('proses.id',Auth::user()->proses_id)->orderBy('deadline','asc')->paginate(5);
        if(Auth::user()->proses_id == 1)
            $Pesanans = Pesanan::where('proses_id',Auth::user()->proses_id)->orderBy('deadline','asc')->paginate(10);
        elseif(Auth::user()->proses_id == 5)
            $Pesanans = Pesanan::where('proses_id',">=" ,Auth::user()->proses_id)->where('assembly',1)->orderBy('deadline','asc')->paginate(10);
        else 
            $Pesanans = Pesanan::where('proses_id',">=" ,Auth::user()->proses_id)->orderBy('deadline','asc')->paginate(10);
         foreach ($Pesanans as $key => $value) {
             //$value["dd"]=0;
             $now = time();
             $tm=(strtotime($value['deadline'])-$now);
             $daydiff = round($tm/(60*60*24));
             //echo $tm;
             if($daydiff <= 7)
             {
                $value["nama"].= " (deadline sisa ".$daydiff." hari)";
                $value["dd"]=1;
            }
         }
         $Progres = array();
         foreach ($Pesanans as $key => $value) {
            $temp = $value->Proses->where("id",Auth::user()->proses_id)->first();
            $temp['max'] = 1;
            if(Auth::user()->proses_id == 2)               
                $temp['max'] = $value->jumlah;
            else{
                if(Auth::user()->proses_id > 1){
                    if(Auth::user()->proses_id == 6)
                    {
                        if($value->assembly == 1)
                            $temp['max'] = $value->Proses->where("id",Auth::user()->proses_id-1)->first()->pivot->progress;
                        else
                            $temp['max'] = $value->Proses->where("id",Auth::user()->proses_id-2)->first()->pivot->progress;
                    }
                    else
                        $temp['max'] = $value->Proses->where("id",Auth::user()->proses_id-1)->first()->pivot->progress;
                }
            }
            $Progres[] = $temp;
          } 
         
          //echo json_encode($Pesanans);
         

         // echo json_encode($Progres);
        return view ('cassana.proses',compact('Pesanans','Progres') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ubahProses($id)
    {
         $pesanan = Pesanan::where('id',$id)->first();
         $pesanan->proses_id +=1;
         $pesanan->save();

         $Pesanans = Pesanan::select('pesanans.id AS nomor','nama','desain','proses.nama_proses AS namaproses','proses_id','pesanans.id')->join('proses','proses.id','=','pesanans.proses_id')->where('proses.id',Auth::user()->proses_id)->paginate(5);
        return view ('cassana.proses',['Pesanans'=>$Pesanans,'message'=>'Proses pesanan '.$pesanan->nama.' telah berubah']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PesananSearchRequest $request
     * @return \Illuminate\Http\Response
     */
   public function find(PesananSearchRequest $request)
    {
        $car = $request->get('cari');
 
        $Pesanans = Pesanan::where("nama",'like','%'.$car.'%')->where("proses_id",Auth::user()->proses_id)->orderBy('deadline',"asc")->get();
        foreach ($Pesanans as $key => $value) {
             //$value["dd"]=0;
             $now = time();
             $tm=(strtotime($value['deadline'])-$now);
             $daydiff = round($tm/(60*60*24));
             //echo $tm;
             if($daydiff <= 7)
             {
                $value["nama"].= " (deadline sisa ".$daydiff." hari)";
                $value["dd"]=1;
            }
         }
        
        return view('cassana.proses', compact('Pesanans'));
        //print_r($matakuliahs);exit();

    }
}
