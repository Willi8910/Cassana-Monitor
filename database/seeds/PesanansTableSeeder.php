<?php

use Illuminate\Database\Seeder;

class PesanansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataproses = array(
    			['id'=>1, 'nama'=>'Bracelet', 'desain'=>'dekati eve', 'deadline'=>('2017-12-12'), 'proses_id'=>'1', 'deskripsi'=>'Semua yang indahh', 'panjang'=>'10', 'lebar'=>'12', 'tinggi'=>'20', 'jumlah'=>'5'],
    			['id'=>2, 'nama'=>'Cincin Evelyn', 'desain'=>'Blastik', 'deadline'=>('2017-12-14'), 'proses_id'=>'1', 'deskripsi'=>'Semua yang indahh', 'panjang'=>'10', 'lebar'=>'12', 'tinggi'=>'20', 'jumlah'=>'5'],
    			
    		);
        DB::table('pesanans')->insert($dataproses);
    }
}
