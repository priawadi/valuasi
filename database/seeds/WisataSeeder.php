<?php

use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
		$fasilitas_pendukung = [
			[
				'id_fasilitas_pendukung' 	=> 1, 
				'is_pertanyaan'           	=> '',
				'fasilitas_pendukung'       => 'a. Transportasi Umum',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],

			[
				'id_fasilitas_pendukung' 	=> 2, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => '   - Dari luar kawasan menuju kawasan wisata',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],

			[
				'id_fasilitas_pendukung' 	=> 3, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => '   - Didalam kawasan wisata',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],		

			[
				'id_fasilitas_pendukung' 	=> 4, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'b. Penginapan',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],							

			[
				'id_fasilitas_pendukung' 	=> 5, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'c. Rumah makan',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],			

			[
				'id_fasilitas_pendukung' 	=> 6, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'd. Internet',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 7, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'e. Penyewaan Perlengkapan Wisata',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 8, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'f. Tempat Ibadah',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 9, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'g. MCK Umum',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 10, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'h. Tempat Sampah',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],	

			[
				'id_fasilitas_pendukung' 	=> 11, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'i. Listrik',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],							

			[
				'id_fasilitas_pendukung' 	=> 12, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'j. Layanan Perbankan-Money Changer',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 13, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'k. Toko Souvenir/Cinderamata',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 14, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'l. Toko Swalayan',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

			[
				'id_fasilitas_pendukung' 	=> 15, 
				'is_pertanyaan'           	=> 1,
				'fasilitas_pendukung'       => 'm. Fasilitas Kesehatan',
				'created_at'          		=> \Carbon\Carbon::now()->toDateTimeString(),			
			],				

		]; 
		DB::table('fasilitas_pendukung')->insert($fasilitas_pendukung);       
    }
}
