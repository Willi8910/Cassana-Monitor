<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $datausers = array(
                ['id'=>'1', 'name'=>'Evelyn','username'=>"ECH", 'password'=>bcrypt('rahasia'),'jabatan'=>'admin','proses_id'=>null],
                ['id'=>'2', 'name'=>'William Lie','username'=>"Willie", 'password'=>bcrypt('rahasia'),'jabatan'=>'karyawan','proses_id'=>'1'],
                ['id'=>'3', 'name'=>'Andry','username'=>"Andry", 'password'=>bcrypt('rahasia'),'jabatan'=>'karyawan','proses_id'=>'2'],
                ['id'=>'4', 'name'=>'Anthony Lie','username'=>"Elcarim", 'password'=>bcrypt('rahasia'),'jabatan'=>'karyawan','proses_id'=>'3'],
    			
    		);
        DB::table('users')->insert($datausers);
        

        //manggil faker
        //factory(App\User::class, 140)->create();
//         update users u inner join administrasis m on u.id = m.user_id
// set u.nomorinduk = m.npk
    }
}
