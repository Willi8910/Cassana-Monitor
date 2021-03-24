<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Model;

class InputMatakuliahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        foreach (range(1,50) as $index) {
            DB::table('inputmatakuliahs')->insert([
                'mahasiswa_id'=> $index,
                'kelasparalel_id'=>1,
                'status'=>'Pending',
                'inputperwalian_id'=>1, ]);    
                 DB::table('inputmatakuliahs')->insert([
                'mahasiswa_id'=> $index,
                'kelasparalel_id'=>2,
                'status'=>'Pending',
                'inputperwalian_id'=>1, ]);  
                 DB::table('inputmatakuliahs')->insert([
                'mahasiswa_id'=> $index,
                'kelasparalel_id'=>3,
                'status'=>'Pending',
                'inputperwalian_id'=>1, ]);  
                 DB::table('inputmatakuliahs')->insert([
                'mahasiswa_id'=> $index,
                'kelasparalel_id'=>4,
                'status'=>'Pending',
                'inputperwalian_id'=>2, ]);       
        }

    }

    public function down()
    {
        Schema::dropIfExists('inputmatakuliahs');
    }
}
