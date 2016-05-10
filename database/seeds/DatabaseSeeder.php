<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MasterBiayaSeeder::class);
        $this->call(MasterKayuSeeder::class);
        $this->call(MasterKomoditasSeeder::class);
        $this->call(MasterBiayaKerambaSeeder::class);
        $this->call(MasterPencariSatwaSeeder::class);
    }
}
