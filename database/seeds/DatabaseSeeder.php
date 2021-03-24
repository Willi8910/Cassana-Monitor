<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //$this->call(KategorisTableSeeder::class);
        $this->call(ProsessTableSeeder::class);
        //$this->call(PesanansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(BarangTableSeeder::class);

        // $this->call(MahasiswasTableSeeder::class);
        // $this->call(AdministrasisTableSeeder::class);
        // $this->call(DosensTableSeeder::class);
        // $this->call(MatakuliahsTableSeeder::class);
        // $this->call(InputPerwaliansTableSeeder::class);
        // $this->call(KelasParalelsTableSeeder::class);
        // $this->call(InputMatakuliahsTableSeeder::class);
        // $this->call(JadwalMatakuliahsTableSeeder::class);
        Model::reguard();
    }
}
