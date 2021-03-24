<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class MahasiswasTableSeeder extends Seeder
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
            DB::table('mahasiswas')->insert([
                'nrp'=> $faker->unique()->numberBetween($min =160415001,$max = 160415200),
                'ips'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1.75, $max = 4),
                'ipk'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1.75, $max = 4),
                'sks'=>$faker->numberBetween($min =18,$max = 24),
                'asdos'=>$faker->numberBetween($min =0,$max =1),
                'semester'=>$faker->numberBetween($min =2,$max =10),
                'user_id'=>$faker->unique()->numberBetween($min=1, $max=140)
                ]);
            
        }
    }
}
