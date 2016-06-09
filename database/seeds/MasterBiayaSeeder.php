<?php

use Illuminate\Database\Seeder;

class MasterBiayaSeeder extends Seeder
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
        		'id_master_biaya' 	=> 1,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Lahan Tambak',
        		'satuan'			=> 'Ha',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 2,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Bangunan',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 3,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Konstruksi Tambak',
        		'satuan'			=> 'Petak',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 4,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Genset',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        

        	[
        		'id_master_biaya' 	=> 5,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Kincir Air',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        		

        	[
        		'id_master_biaya' 	=> 6,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Pintu Air',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 7,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Paralon',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],  

        	[
        		'id_master_biaya' 	=> 8,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Bibit',
        		'satuan'			=> 'Ekor',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	], 

        	[
        		'id_master_biaya' 	=> 9,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Biaya Persiapan Lahan',
        		'satuan'			=> 'Rp/Siklus',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 10,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Biaya Pemeliharaan',
        		'satuan'			=> 'Rp/Siklus',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 11,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Obat-obatan',
        		'satuan'			=> 'Paket',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	], 	

        	[
        		'id_master_biaya' 	=> 12,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Pakan',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 13,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Pupuk',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 14,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Listrik',
        		'satuan'			=> 'Bulan',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 15,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.VARIABEL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'BBM',
        		'satuan'			=> 'Liter',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	], 

        	[
        		'id_master_biaya' 	=> 16,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Pajak',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	], 

        	[
        		'id_master_biaya' 	=> 17,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Retribusi',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],         	       	       	

        	[
        		'id_master_biaya' 	=> 18,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Perawatan Lahan',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],         	

        	[
        		'id_master_biaya' 	=> 19,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.TETAP'),
        		'kateg_modul'		=> Config::get('constants.MODULE.TAMBAK'),
        		'biaya'				=> 'Perawatan Mesin',
        		'satuan'			=> 'Rp',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],                   
        ];
        DB::table('master_biaya')->insert($master_biaya);
    }
}
