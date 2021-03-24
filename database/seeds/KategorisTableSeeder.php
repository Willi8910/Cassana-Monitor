<?php

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$datakategoris = array(
    			['id'=>'1', 'nama'=>'Makanan', 'deskripsi'=>'Ini adalah deskripsi dari kategori makanan'],
        		['id'=>'2', 'nama'=>'Minuman', 'deskripsi'=>'Ini adalah deskripsi dari kategori minuman'],
        		['id'=>'3', 'nama'=>'Dessert', 'deskripsi'=>'Ini adalah deskripsi dari kategori dessert']
    		);
        DB::table('kategoris')->insert($datakategoris);
    }
}
