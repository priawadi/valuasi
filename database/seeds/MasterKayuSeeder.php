<?php

use Illuminate\Database\Seeder;

class MasterKayuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Eloquent::unguard();
		$master_kayu = [
			[
        		'id_master_kayu' 	=> 1,
        		'kategori'			=> Config::get('constants.KAYU.PRODUKSI'),
        		'rincian'			=> 'Kayu Bakar',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],

			[
        		'id_master_kayu' 	=> 2,
        		'kategori'			=> Config::get('constants.KAYU.PRODUKSI'),
        		'rincian'			=> 'Bahan Bangunan',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],			

			[
        		'id_master_kayu' 	=> 3,
        		'kategori'			=> Config::get('constants.KAYU.PRODUKSI'),
        		'rincian'			=> 'Kerajinan/Souvenir',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],			

			[
        		'id_master_kayu' 	=> 4,
        		'kategori'			=> Config::get('constants.KAYU.PRODUKSI'),
        		'rincian'			=> 'Buah Mangrove',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],			

			[
        		'id_master_kayu' 	=> 5,
        		'kategori'			=> Config::get('constants.KAYU.BIAYA_OPERASIONAL'),
        		'rincian'			=> 'Bahan Bakar',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],	

			[
        		'id_master_kayu' 	=> 6,
        		'kategori'			=> Config::get('constants.KAYU.BIAYA_OPERASIONAL'),
        		'rincian'			=> 'Ransum',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],						

			[
        		'id_master_kayu' 	=> 7,
        		'kategori'			=> Config::get('constants.KAYU.NON_KOMERSIL'),
        		'rincian'			=> 'Kayu Bakar',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],	

			[
        		'id_master_kayu' 	=> 8,
        		'kategori'			=> Config::get('constants.KAYU.NON_KOMERSIL'),
        		'rincian'			=> 'Bahan Bangunan',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),				
			],							
		];
		DB::table('master_kayu')->insert($master_kayu);
    }
}
