<?php

use Illuminate\Database\Seeder;

class MatakuliahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datamatkul = array(
    			['id'=>'1', 'kode_matkul'=>'A01', 'nama'=>'Statistika', 'jumlah_sks'=>4, 'semester'=>5],
        		['id'=>'2', 'kode_matkul'=>'B01', 'nama'=>'Matematika', 'jumlah_sks'=>3, 'semester'=>1],
        		['id'=>'3', 'kode_matkul'=>'C01', 'nama'=>'Algortma dan Pemrograman', 'jumlah_sks'=>6, 'semester'=>1],
                ['id'=>'4', 'kode_matkul'=>'A02', 'nama'=>'Pemrograman Berorientasi Objek', 'jumlah_sks'=>6, 'semester'=>2],
                ['id'=>'5', 'kode_matkul'=>'B02', 'nama'=>'Manajemen Sains', 'jumlah_sks'=>3, 'semester'=>4],
                ['id'=>'6', 'kode_matkul'=>'C02', 'nama'=>'Desain Web', 'jumlah_sks'=>2, 'semester'=>3],
                ['id'=>'7', 'kode_matkul'=>'A03', 'nama'=>'Pemrograman Web', 'jumlah_sks'=>3, 'semester'=>4],
                ['id'=>'8', 'kode_matkul'=>'B03', 'nama'=>'Pemrograman Nirkabel', 'jumlah_sks'=>4, 'semester'=>5],
                ['id'=>'9', 'kode_matkul'=>'C03', 'nama'=>'Jaringan Komputer', 'jumlah_sks'=>3, 'semester'=>3],
                ['id'=>'10', 'kode_matkul'=>'A04', 'nama'=>'Konsep Sistem Informasi', 'jumlah_sks'=>2, 'semester'=>2],

    		);
        DB::table('matakuliahs')->insert($datamatkul);
    }

    public function down()
    {
        Schema::dropIfExists('matakuliahs');
    }
}
