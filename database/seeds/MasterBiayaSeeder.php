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
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Lahan Tambak',
        		'satuan'			=> 'Ha',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 2,
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Bangunan',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 3,
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Konstruksi Tambak',
        		'satuan'			=> 'Petak',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],

        	[
        		'id_master_biaya' 	=> 4,
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Genset',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        

        	[
        		'id_master_biaya' 	=> 5,
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Kincir Air',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        		

        	[
        		'id_master_biaya' 	=> 6,
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Pintu Air',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	

        	[
        		'id_master_biaya' 	=> 7,
        		'kateg_mst_biaya'	=> 1,
        		'biaya'				=> 'Paralon',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],        	
        ];
        DB::table('master_biaya')->insert($master_biaya);
    }
}
