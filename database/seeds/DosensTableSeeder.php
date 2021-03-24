<?php

use Illuminate\Database\Seeder;

class DosensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datadosen = array(
    			['id'=>1, 'npk'=>'119911', 'user_id'=>16],
        		['id'=>2, 'npk'=>'228822', 'user_id'=>17],
        		['id'=>3, 'npk'=>'337733', 'user_id'=>18],
        		['id'=>4, 'npk'=>'446644', 'user_id'=>19],
        		['id'=>5, 'npk'=>'555555', 'user_id'=>20],
        		['id'=>6, 'npk'=>'664466', 'user_id'=>21],
        		['id'=>7, 'npk'=>'773377', 'user_id'=>22],
        		['id'=>8, 'npk'=>'882288', 'user_id'=>23],
        		['id'=>9, 'npk'=>'991199', 'user_id'=>24],
        		['id'=>10, 'npk'=>'109910', 'user_id'=>25],

    		);
        DB::table('dosens')->insert($datadosen);
    }
}
