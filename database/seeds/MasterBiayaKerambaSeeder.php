<?php

use Illuminate\Database\Seeder;

class MasterBiayaKerambaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $master_biaya = [
        	[
        		'id_master_biaya' 	=> 21,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Rakit',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 22,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Bambu/Kayu',
        		'satuan'			=> 'Batang',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 23,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Jaring',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 24,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Pemberat/Jangkar',
        		'satuan'			=> 'Buah',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        

        	[
        		'id_master_biaya' 	=> 25,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Tali',
        		'satuan'			=> 'Gulung',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        		

        	[
        		'id_master_biaya' 	=> 26,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Perahu',
        		'satuan'			=> 'Buah',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 27,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Rumah Jaga',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],  

        	[
        		'id_master_biaya' 	=> 28,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Benih',
        		'satuan'			=> 'Ekor/unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	], 

        	[
        		'id_master_biaya' 	=> 29,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Upah Tenaga Kerja',
        		'satuan'			=> 'Rp/orang',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 30,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Pakan',
        		'satuan'			=> 'Kg/unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 31,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Obat-obatan',
        		'satuan'			=> 'Paket',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 32,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Listrik',
        		'satuan'			=> 'Bulan',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 33,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'BBM',
        		'satuan'			=> 'Liter',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 34,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Pajak',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 35,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Retribusi',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 36,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.KERAMBA'),
        		'biaya'				=> 'Perbaikan KJA',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	], 
        ];
        DB::table('master_biaya')->insert($master_biaya);
    }
}
