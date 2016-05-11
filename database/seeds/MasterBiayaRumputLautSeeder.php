<?php

use Illuminate\Database\Seeder;

class MasterBiayaRumputLautSeeder extends Seeder
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
        		'id_master_biaya' 	=> 42,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Tali ris',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 43,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Tali jangkar',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 44,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Tali utama',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 45,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Tali pengikat',
        		'satuan'			=> 'Kg',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 46,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Jangkar',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 47,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Pelampung Utama',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 48,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Pelampung Kecil',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 49,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Jaring',
        		'satuan'			=> 'M',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 50,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Perahu',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 51,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Patok Utama Kayu',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 52,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Patok Utama Besi',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 53,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Patok Ris Kayu',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 54,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Patok Ris Besi',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 55,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Patok Jaring Kayu',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
        	[
        		'id_master_biaya' 	=> 56,
        		'kateg_biaya'		=> Config::get('constants.BIAYA.INVESTASI'),
        		'kateg_modul'		=> Config::get('constants.MODULE.RUMPUT_LAUT'),
        		'biaya'				=> 'Patok Jaring Besi',
        		'satuan'			=> 'Unit',
        		'created_at'		=> \Carbon\Carbon::now()->toDateTimeString(),
        	],
            [
                'id_master_biaya'   => 57,
                'kateg_biaya'       => Config::get('constants.BIAYA.OPERASIONAL'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Bibit',
                'satuan'            => 'Kg',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id_master_biaya'   => 58,
                'kateg_biaya'       => Config::get('constants.BIAYA.OPERASIONAL'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Upah mengikat bibit & membentang',
                'satuan'            => 'Rp/Bentang',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id_master_biaya'   => 59,
                'kateg_biaya'       => Config::get('constants.BIAYA.OPERASIONAL'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Upah pemeliharaan',
                'satuan'            => 'Rp/Bentang',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id_master_biaya'   => 60,
                'kateg_biaya'       => Config::get('constants.BIAYA.OPERASIONAL'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Upah panen',
                'satuan'            => 'Rp/Bentang',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id_master_biaya'   => 61,
                'kateg_biaya'       => Config::get('constants.BIAYA.OPERASIONAL'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Upah pengeringan',
                'satuan'            => 'Hari',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id_master_biaya'   => 62,
                'kateg_biaya'       => Config::get('constants.BIAYA.TETAP'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Pajak',
                'satuan'            => 'Rp',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id_master_biaya'   => 63,
                'kateg_biaya'       => Config::get('constants.BIAYA.TETAP'),
                'kateg_modul'       => Config::get('constants.MODULE.RUMPUT_LAUT'),
                'biaya'             => 'Retribusi',
                'satuan'            => 'Rp',
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ];
        DB::table('master_biaya')->insert($master_biaya);
    }
}
