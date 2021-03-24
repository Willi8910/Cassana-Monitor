<?php

use Illuminate\Database\Seeder;

class KelasParalelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datamatkul = array(
    			['id'=>'1', 'kp'=>'A', 'kapasitas'=>'30','matakuliah_id'=>1,'dosen_id'=>1],
    			['id'=>'2', 'kp'=>'-', 'kapasitas'=>'25','matakuliah_id'=>2,'dosen_id'=>2],
    			['id'=>'3', 'kp'=>'B', 'kapasitas'=>'10','matakuliah_id'=>3,'dosen_id'=>3],
    			['id'=>'4', 'kp'=>'C', 'kapasitas'=>'50','matakuliah_id'=>4,'dosen_id'=>4],
    			['id'=>'5', 'kp'=>'D', 'kapasitas'=>'23', 'matakuliah_id'=>5,'dosen_id'=>5],
    			['id'=>'6', 'kp'=>'A', 'kapasitas'=>'27','matakuliah_id'=>6,'dosen_id'=>6],
    			['id'=>'7', 'kp'=>'C', 'kapasitas'=>'35', 'matakuliah_id'=>7,'dosen_id'=>7],
    			['id'=>'8', 'kp'=>'-', 'kapasitas'=>'50', 'matakuliah_id'=>8,'dosen_id'=>8],
    			['id'=>'9', 'kp'=>'A', 'kapasitas'=>'55','matakuliah_id'=>9,'dosen_id'=>9],
    			['id'=>'10', 'kp'=>'B', 'kapasitas'=>'25', 'matakuliah_id'=>10,'dosen_id'=>10],


    		);
        DB::table('kelasparalels')->insert($datamatkul);    }
}
