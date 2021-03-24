<?php

use Illuminate\Database\Seeder;

class AdministrasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataadmin = array(
    			['id'=>1, 'npk'=>'110011', 'user_id'=>26],
        		['id'=>2, 'npk'=>'220022', 'user_id'=>27],
        		['id'=>3, 'npk'=>'330033', 'user_id'=>28],
        		['id'=>4, 'npk'=>'440044', 'user_id'=>29],
        		['id'=>5, 'npk'=>'550055', 'user_id'=>30],
        		['id'=>6, 'npk'=>'660066', 'user_id'=>31],
        		['id'=>7, 'npk'=>'770077', 'user_id'=>32],
        		['id'=>8, 'npk'=>'880088', 'user_id'=>33],
        		['id'=>9, 'npk'=>'990099', 'user_id'=>34],
        		['id'=>10, 'npk'=>'100010', 'user_id'=>35],

    		);
        DB::table('administrasis')->insert($dataadmin);
    }
}
