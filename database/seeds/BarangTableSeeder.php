<?php

use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $databarangs= array(
        	['id'=>1, 
        	 'nama'=>'air putih',
        	 'deskripsi' =>'ini air putih',
        	 'harga_jual'=>5000,
        	 'harga_beli'=>3000,
        	 'stok'=>100,
        	 'user_id'=>1,
        	 'kategori_id'=>1],
        	 ['id'=>2, 
        	 'nama'=>'air keran',
        	 'deskripsi' =>'ini air keran',
        	 'harga_jual'=>2000,
        	 'harga_beli'=>1000,
        	 'stok'=>900,
        	 'user_id'=>1,
        	 'kategori_id'=>1],
        	 ['id'=>3, 
        	 'nama'=>'cola',
        	 'deskripsi' =>'ini cola',
        	 'harga_jual'=>18000,
        	 'harga_beli'=>6000,
        	 'stok'=>7,
        	 'user_id'=>2,
        	 'kategori_id'=>2],
        	 ['id'=>4, 
        	 'nama'=>'es campur',
        	 'deskripsi' =>'ini es campur',
        	 'harga_jual'=>10000,
        	 'harga_beli'=>4000,
        	 'stok'=>300,
        	 'user_id'=>2,
        	 'kategori_id'=>2],
        	 ['id'=>5, 
        	 'nama'=>'baygon ',
        	 'deskripsi' =>'ini baygon',
        	 'harga_jual'=>28000,
        	 'harga_beli'=>15000,
        	 'stok'=>199,
        	 'user_id'=>3,
        	 'kategori_id'=>3],
        	 ['id'=>6, 
        	 'nama'=>'autan',
        	 'deskripsi' =>'ini autan',
        	 'harga_jual'=>1500,
        	 'harga_beli'=>700,
        	 'stok'=>250,
        	 'user_id'=>3,
        	 'kategori_id'=>3]
        );
        DB::table('barangs')->insert($databarangs);
    }
}
