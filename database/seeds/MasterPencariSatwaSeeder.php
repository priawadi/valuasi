<?php

use Illuminate\Database\Seeder;

class MasterPencariSatwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $master_pencari_satwa = [
        	[
				'id_master_pencari_satwa' 	=> 1, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'), 
				'rincian'           		=> 'Kelelawar',
				'satuan'              		=> 'Ekor',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	], 
        	[
				'id_master_pencari_satwa' 	=> 2, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'), 
				'rincian'           		=> 'Ular',
				'satuan'              		=> 'Ekor',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	
        	[
				'id_master_pencari_satwa' 	=> 3, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'), 
				'rincian'           		=> 'Burung',
				'satuan'              		=> 'Ekor',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	
        	[
				'id_master_pencari_satwa' 	=> 4, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'), 
				'rincian'           		=> 'Buaya',
				'satuan'              		=> 'Ekor',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],     
        	[
				'id_master_pencari_satwa' 	=> 5, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Perangkap',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],  
        	[
				'id_master_pencari_satwa' 	=> 6, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Pisau',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	       	    	
        	[
				'id_master_pencari_satwa' 	=> 7, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Sepeda Motor',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],
        	[
				'id_master_pencari_satwa' 	=> 8, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Jaring',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 9, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Keranjang',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 10, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Sangkar',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 11, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Tali',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 12, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Senapan',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 13, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Senter',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 14, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'), 
				'rincian'           		=> 'Lampu Petromax',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],          	
        	[
				'id_master_pencari_satwa' 	=> 15, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'), 
				'rincian'           		=> 'BBM: Solar/Bensin',
				'satuan'              		=> 'Liter',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	], 
        	[
				'id_master_pencari_satwa' 	=> 16, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'), 
				'rincian'           		=> 'Ransum',
				'satuan'              		=> 'Paket',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	         	
        	[
				'id_master_pencari_satwa' 	=> 17, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'), 
				'rincian'           		=> 'Rokok',
				'satuan'              		=> 'Bungkus',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	
        	[
				'id_master_pencari_satwa' 	=> 18, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'), 
				'rincian'           		=> 'Umpan',
				'satuan'              		=> 'Paket',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	
        	[
				'id_master_pencari_satwa' 	=> 19, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'), 
				'rincian'           		=> 'Minyak Tanah',
				'satuan'              		=> 'Liter',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	
        	[
				'id_master_pencari_satwa' 	=> 20, 
				'kategori'         			=> Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'), 
				'rincian'           		=> 'Baterai',
				'satuan'              		=> 'Unit',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),        		
        	],         	
        ];
        DB::table('master_pencari_satwa')->insert($master_pencari_satwa);
    }
}
