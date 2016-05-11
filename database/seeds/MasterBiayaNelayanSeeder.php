<?php

use Illuminate\Database\Seeder;

class MasterBiayaNelayanSeeder extends Seeder
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
        		'id_master_biaya' 	=> 37,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.OPERASIONAL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.NELAYAN'),
        		'biaya'				=> 'Bensin/Solar',
        		'satuan'			=> 'Liter',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 38,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.OPERASIONAL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.NELAYAN'),
        		'biaya'				=> 'Es',
        		'satuan'			=> 'Balok',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 39,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.OPERASIONAL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.NELAYAN'),
        		'biaya'				=> 'Garam',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 40,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.OPERASIONAL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.NELAYAN'),
        		'biaya'				=> 'Perbekalan Melaut',
        		'satuan'			=> 'Trip',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 41,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.OPERASIONAL'),
        		'kateg_modul'		=> Config::get('constants.MODULE.NELAYAN'),
        		'biaya'				=> 'Retribusi',
        		'satuan'			=> 'Persen',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        ];
        DB::table('master_biaya')->insert($master_biaya);
    }
}
