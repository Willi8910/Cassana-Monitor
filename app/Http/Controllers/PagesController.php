<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
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
    
    public function home()
    {
        $kategoris = DB::table('kategoris')->get();
        return view('pages.home', ['datakategoris'=>$kategoris]);
    }
    public function daftarbarang()
    {
        /*$brg = DB::table('barangs')->where('nama', 'cola')->first();
        return view('daftarbarang', ['barang' => $brg]);*/

        $dataDB = DB::table('kategoris') //kategoris=nama asli table
        ->join('barangs', 'kategoris.id', '=', 'barangs.kategori_id') //4 parameter, p1=tabel relasinya p2=nama kolom dr tabel asal(primary key dr table asal), p3=operatornya, p4=kolom yg mau direlasikan
        ->select('kategoris.nama as nama_kategori', 'barangs.nama as nama_barang')
        ->get();

        $arrData = array();
        foreach ($dataDB as $dataKu) {
            $arrData[$dataKu->nama_kategori][] = $dataKu->nama_barang;
        }
        return view ('daftarbarang', ['arrData' => $arrData]);
    }
    public function profile()
    {
        return view('profile');
    }

    public function hobby()
    {
        return view('hobby');
    }

    public function gallery()
    {
        return view('gallery');
    }
    
    public function homee()
    {
        return view('rumah');
    }
    
     public function adminpage()
    {
        //
        return view('/cassana/inputpesanan');
    }
    public function tambahkelaspage()
    {
        //
        return view('content.admintambahkelasparalel');
    }
    public function admininputperwalian()
    {
        //
        return view('content.adminbuatjadwalperwalian');
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahKelasFormRequest $request)
    {
        //
        $kategori = new Matakuliah(array(
                'nama' => $request->get('nama'),
                'deskripsi' => $request->get('deskripsi')
            ));
        $kategori->save();
        return redirect('/admincp');
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
    }
}
