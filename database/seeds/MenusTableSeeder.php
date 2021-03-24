<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datamenus = array(
    			['id'=>1, 'nama'=>'Sushi', 'harga'=>45000, 'kategori_id'=>1],
        		['id'=>2, 'nama'=>'Pizza', 'harga'=>105000, 'kategori_id'=>1],
        		['id'=>3, 'nama'=>'Spaghetti', 'harga'=>37000, 'kategori_id'=>1],
        		['id'=>4, 'nama'=>'Cola Float', 'harga'=>17500, 'kategori_id'=>2],
        		['id'=>5, 'nama'=>'Ice Cream', 'harga'=>30000, 'kategori_id'=>3],
        		['id'=>6, 'nama'=>'Vanilla Pudding', 'harga'=>25000, 'kategori_id'=>3],
    		);
        DB::table('menus')->insert($datamenus);
    }
}
