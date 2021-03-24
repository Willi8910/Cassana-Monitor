<?php

namespace App\Http\Controllers;
use Illuminate\Pagination;
use Illuminate\Http\Request;
use App\Pesanan;
use App\Pesanan_proses;
use DB;
use App\Http\Requests\PesananSearchRequest;
use Illuminate\Support\Facades\Auth;
use App\Proses;
use Illuminate\Support\Facades\Storage;
use Validator;

class PesananController extends Controller
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
    public function index()
    {
        
         $Pesanans = Pesanan::select('pesanans.id AS nomor','nama','project_manager','proses_id','desain','proses.nama_proses AS namaproses','deadline')->join('proses','proses.id','=','pesanans.proses_id')->where('proses.id','<','7')->orderBy('deadline','asc')->paginate(10);
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
        return view ('cassana.pesanan',compact('Pesanans') );
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDone()
    {
        
         $Pesanans = Pesanan::select('pesanans.id AS nomor','pesanans.updated_at as update','nama','desain','proses.nama_proses AS namaproses','deadline')->join('proses','proses.id','=','pesanans.proses_id')->where('proses.id','7')->orderBy('deadline','asc')->paginate(10);

        return view ('cassana.pesananSelesai',compact('Pesanans') );
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('memory_limit','256M');
        $path = $path = $request->file('btnFile')->store('desain');

        $pesanan= new Pesanan;
        $pesanan->nama =$request->nama;
        $pesanan->desain =$path;
        $pesanan->deadline =$request->deadline;
        $pesanan->proses_id =1;
        $pesanan->deskripsi =$request->deskripsi;
        $pesanan->panjang =$request->panjang;
        $pesanan->lebar =$request->lebar;
        $pesanan->tinggi =$request->tinggi;
        $pesanan->jumlah =$request->jumlah;
        if($request->assembly == "on")
            $pesanan->assembly = 1;
        else
            $pesanan->assembly = 0;

        //$pesanan->tipe ='offline';
        $tgl = "".date("Y-m-d");
       // var_dump($request->file('btnFile'));
  
        $pesanan->save();

        $proses = Proses::all();
        foreach ($proses as $key => $value) {

            $pesproses = new Pesanan_proses;
            $pesproses->proses_id = $value->id;
            $pesproses->pesanan_id = $pesanan->id;
            $pesproses->progress = 0;
            if($value->id == 5 )
            {
                if($pesanan->assembly == 1)
                    $pesproses->save();
            }
            else
                $pesproses->save();
        }
       


        return view("/cassana/inputpesanan",["message"=>"Pesanan ".$pesanan->nama." telah diinputkan","tanggal"=>$tgl]);
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
 
        $Pesanans = Pesanan::where("nama",'like','%'.$car.'%')->where("proses_id","<","7")->orderBy('deadline','asc')->paginate(10);
        //$Pesanans = DB::select("select id,nama,deadline,updated_at as 'update' from `pesanans` where (`nama` like '%".$car."%' or `id` like '%".$car."%') and proses_id != 4 order by `deadline` asc");

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
        //return redirect('Perwalian.index') ->with('matakuliahs', $hasil);
        return view('cassana.pesanan', ['Pesanans'=>$Pesanans]);
        //print_r($matakuliahs);exit();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PesananSearchRequest $request
     * @return \Illuminate\Http\Response
     */
   public function findDone(PesananSearchRequest $request)
    {
        $car = $request->get('cari');

        $Pesanans = DB::select("select id,nama,deadline,updated_at as 'update' from `pesanans` where (`nama` like '%".$car."%' or `id` like '%".$car."%') and proses_id = 7 order by `deadline` asc");
        return view('cassana.pesananSelesai', ['Pesanans'=>$Pesanans]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $Pesanans = Pesanan::select('pesanans.id AS nomor','pesanans.created_at','nama','assembly','desain','deskripsi','project_manager','deadline','panjang','lebar','tinggi','jumlah','proses_id','proses.nama_proses AS namaproses')->join('proses','proses.id','=','pesanans.proses_id')->where('pesanans.id','=',$id)->first();
          $Pesanans->desain = asset('../storage/app/'.$Pesanans->desain);
          $Pesanans->assembly = ($Pesanans->assembly == 1)? "yes":"no";
          $Pesanans->project_manager = ($Pesanans->project_manager == '')? "-" : $Pesanans->project_manager;
          $allproses = Pesanan::find($id);


          //$progres = Pesanan_proses::all()->where("pesanan_id",$id);
          $progres = $allproses->Proses;
         // echo $progres;
          foreach ($progres as $key => $value) {
            $value["max"] = 1;
            if($key>0)
            {

                if($key==1  )
                {
                    $value["limit"] = '/ '. $allproses->jumlah;
                    $value["max"] = $allproses->jumlah;
                }
                else
                {
                    $value["limit"] = '/ '. $progres[$key-1]->pivot->progress;
                    $value["max"] = $progres[$key-1]->pivot->progress;
                    //echo $progres[$key-1]->pivot->progress;
                }
            }
          }
         
         $now = time();
             $tm=(strtotime($Pesanans['deadline'])-$now);
             $daydiff = round($tm/(60*60*24));
             //echo $tm;
             if($daydiff <= 7)
             {
                
                $Pesanans["dd"]=1;
            }
         //echo json_encode($progres);

        return view ('cassana.show',['Pesanans'=>$Pesanans,"progres"=>$progres] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pesanans = Pesanan::select('pesanans.id AS nomor','nama','desain','deskripsi','deadline','panjang','lebar','project_manager','tinggi','jumlah','proses_id','proses.nama_proses AS namaproses')->join('proses','proses.id','=','pesanans.proses_id')->where('pesanans.id','=',$id)->first();
        $proses = Proses::all();
        $tgl = "".date("Y-m-d");
        return view ('cassana.inputpesanan',['Pesanans'=>$Pesanans, 'Input'=>"1",'prosess' => $proses,'tanggal'=>$tgl] );   
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
        $pesanan = Pesanan::find($id);
        if(!is_null($request->file('btnFile')))
        {
            $path = $request->file('btnFile')->store('desain');
            Storage::delete($pesanan->desain);
            $pesanan->desain =$path;
        }
        
        $pesanan->nama =$request->nama;
        
        $pesanan->deadline =$request->deadline;
        $pesanan->project_manager =$request->pm;
        $pesanan->proses_id =$request->proses;
        $pesanan->deskripsi =$request->deskripsi;
        $pesanan->panjang =$request->panjang;
        $pesanan->lebar =$request->lebar;
        $pesanan->tinggi =$request->tinggi;
        $pesanan->jumlah =$request->jumlah;
        //$pesanan->tipe ='offline';
        $pesanan->save();
        //return view("/cassana/show",["Pesanans"=>$pesanan]);
        return redirect('/cassana/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pesanan = Pesanan::find($id);
        $Pesanan->Proses()->detach();
        $Pesanan->delete();
        return redirect('/cassana')->with("message","Pesanan ".$Pesanan->nama." telah sukses terhapus");
    }
}
