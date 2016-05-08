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
        ];
        DB::table('master_biaya')->insert($master_biaya);
    }
}
