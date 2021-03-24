<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests\PesananSearchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        
         
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listKaryawan()
    {
        $Users = DB::select("select u.*,p.nama_proses as 'proses' from users u left join proses p on u.proses_id=p.id order by jabatan asc, proses_id asc");

        return view ('cassana.listUser',["Users"=>$Users]);
        
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
 
        $Users = DB::select("select u.*,p.nama_proses as 'proses' from users u left join proses p on u.proses_id=p.id where name like '%".$car."%' order by jabatan asc");

        return view ('cassana.listUser',["Users"=>$Users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
       
        return view ('cassana.editprofil',['users'=>$users]);   
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
        $users = User::find($id);
        $users->name = $request->nama;
        $users->username = $request->username;
        $users->save();
        return redirect('/profil'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('newpass'), $request->get('new-password')) != 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password doesn't match with confirm password");
        }
         if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
    
        //Change Password


        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->jabatan = $request->jabatan;
        $user->password = bcrypt($request->password);
        //
        // $kategori = new Matakuliah(array(
        //         'nama' => $request->get('nama'),
        //         'deskripsi' => $request->get('deskripsi')
        //     ));
        // $kategori->save();
        $user->save();
        return redirect('/cassana');
    }
}
