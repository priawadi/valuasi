<?php

use Illuminate\Database\Seeder;

class MasterKomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $master_komoditas = [
            [
				'id_master_komoditas' => 1, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Kerapu Macam',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 2, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Kerapu Bebek/Kerapu Tikus',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 3, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Kerapu Sunu',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 4, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Kerapu Lodi',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 5, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Lobster Pasir',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 6, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Lobster Mutiara',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 7, 
				'kateg_modul'         => Config::get('constants.MODULE.KERAMBA'), 
				'komoditas'           => 'Udang',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 8, 
				'kateg_modul'         => Config::get('constants.MODULE.TAMBAK'), 
				'komoditas'           => 'Udang Vaname',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 9, 
				'kateg_modul'         => Config::get('constants.MODULE.TAMBAK'), 
				'komoditas'           => 'Udang Windu',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 10, 
				'kateg_modul'         => Config::get('constants.MODULE.TAMBAK'), 
				'komoditas'           => 'Bandeng',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 11, 
				'kateg_modul'         => Config::get('constants.MODULE.TAMBAK'), 
				'komoditas'           => 'Kepiting/Rajungan',
				'satuan'              => 'Kg',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            // jenis satwa
            [
				'id_master_komoditas' => 12, 
				'kateg_modul'         => Config::get('constants.MODULE.PENCARI_SATWA'), 
				'komoditas'           => 'Kelelawar',
				'satuan'              => 'Ekor',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 13, 
				'kateg_modul'         => Config::get('constants.MODULE.PENCARI_SATWA'), 
				'komoditas'           => 'Ular',
				'satuan'              => 'Ekor',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 14, 
				'kateg_modul'         => Config::get('constants.MODULE.PENCARI_SATWA'), 
				'komoditas'           => 'Burung',
				'satuan'              => 'Ekor',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
				'id_master_komoditas' => 15, 
				'kateg_modul'         => Config::get('constants.MODULE.PENCARI_SATWA'), 
				'komoditas'           => 'Buaya',
				'satuan'              => 'Ekor',
				'created_at'          => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ];
        DB::table('master_komoditas')->insert($master_komoditas);
    }
}
