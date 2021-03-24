<?php

use Illuminate\Database\Seeder;

class ProsessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataproses = array(
    			['id'=>1, 'nama_proses'=>'Desain', 'keterangan'=>'Gambar', 'one_time'=>1],
    			['id'=>2, 'nama_proses'=>'Printing', 'keterangan'=>"Potong", 'one_time'=>0],
    			['id'=>3, 'nama_proses'=>'Laminating', 'keterangan'=>"Cari cara buat pasang", 'one_time'=>0],
                ['id'=>4, 'nama_proses'=>'Cutting', 'keterangan'=>"Goooo", 'one_time'=>0],
                ['id'=>5, 'nama_proses'=>'Assembling', 'keterangan'=>"Goooo", 'one_time'=>0],
                ['id'=>6, 'nama_proses'=>'Packing', 'keterangan'=>"Goooo", 'one_time'=>0],
    			['id'=>7, 'nama_proses'=>'Selesai', 'keterangan'=>"Goooo", 'one_time'=>0],
    		);
        DB::table('proses')->insert($dataproses);
    }
}
