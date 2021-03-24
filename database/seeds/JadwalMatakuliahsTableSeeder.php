<?php

use Illuminate\Database\Seeder;

class JadwalMatakuliahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $datajadwalmatkul = array(
    			['id'=>1, 'hari'=>'Senin', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>1],
        		['id'=>2, 'hari'=>'Senin', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>2],
        		['id'=>3, 'hari'=>'Senin', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>3],
        		['id'=>4, 'hari'=>'Selasa', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>4],
        		['id'=>5, 'hari'=>'Selasa', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>5],
        		['id'=>6, 'hari'=>'Selasa', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>6],
        		['id'=>7, 'hari'=>'Rabu', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>7],
        		['id'=>8, 'hari'=>'Rabu', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>8],
        		['id'=>9, 'hari'=>'Rabu', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>9],
        		['id'=>10, 'hari'=>'Kamis', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>10],
        		['id'=>11, 'hari'=>'Kamis', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>5],
        		['id'=>12, 'hari'=>'Kamis', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>4],
        		['id'=>13, 'hari'=>'Jumat', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>3],
        		['id'=>14, 'hari'=>'Jumat', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>2],
        		['id'=>15, 'hari'=>'Jumat', 'waktu_mulai'=>('01:02:03'), 'waktu_selesai'=>('01:02:03'), 'kelasparalel_id'=>1],

    		);
        DB::table('jadwalmatakuliahs')->insert($datajadwalmatkul);
    }
}
