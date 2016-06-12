<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PencariSatwa;
use App\MasterPencariSatwa;
use App\HasilSatwa;
use App\BiayaSatwa;
use App\OpsSatwa;
use App\Responden;
use Excel;

class PencariSatwaController extends Controller
{
    var $master_lama_buru = 
        [
            1 => '1 hari sekali',
            2 => '2 hari sekali',
            3 => '3 hari sekali',
            4 => '4 hari sekali',
            5 => 'Seminggu sekali',
            6 => 'Sebulan sekali',
            7 => 'Lainnya',
        ];

    var $master_setahun_buru = 
        [
            1 => '12 sekali',
            2 => '24 sekali',
            3 => '36 sekali',
            4 => '48 sekali',
            5 => 'Lainnya',
        ];

    var $jenis_satwa = 
        [
            1 => 'Kelelawar',
            2 => 'Ular',
            3 => 'Burung',
            4 => 'Buaya',
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (PencariSatwa::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }
        return view('satwa.form', [
			'action'              => 'satwa/tambah',
			'subtitle'            => 'Pencari Satwa',
			'master_lama_buru'    => $this->master_lama_buru,
			'master_setahun_buru' => $this->master_setahun_buru,
			'jenis_satwa'         => $this->jenis_satwa,
			'hasil_satwa'         => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'))->get(),
			'biaya_satwa'         => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'))->get(),
			'ops_satwa'           => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'))->get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis_satwa = '';
        // check if input is not null
        if ($request->input('jenis_satwa')){
            foreach ($request->input('jenis_satwa') as $key => $value) 
            {
                $jenis_satwa .= ($key)? ',' . $value: $value;
            }
        }

        $pencarisatwa                       = new PencariSatwa;
        $pencarisatwa->id_responden         = $request->session()->get('id_responden');
        $pencarisatwa->pencari_satwa_mgv    = $request->input('pencari_satwa_mgv', null);
        $pencarisatwa->pengalaman_usaha     = $request->input('pengalaman_usaha', null);
        $pencarisatwa->jenis_satwa          = $jenis_satwa;
        $pencarisatwa->lama_buru            = $request->input('lama_buru', null);
        $pencarisatwa->lama_buru_txt        = $request->input('lama_buru', null) == 7? $request->input('lama_buru_txt', null): '';
        $pencarisatwa->setahun_buru         = $request->input('setahun_buru', null);
        $pencarisatwa->setahun_buru_txt     = $request->input('setahun_buru', null) == 5? $request->input('setahun_buru_txt', null): '';

        $pencarisatwa->save();

        foreach (MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'))->get() as $key => $value) {
            $hasilsatwa                                 = new HasilSatwa;
            $hasilsatwa->id_master_pencari_satwa        = $value->id_master_pencari_satwa;
            $hasilsatwa->id_responden                   = $request->session()->get('id_responden');
            $hasilsatwa->jumlah_satwa                   = $request->input('jumlah_satwa.' .$value->id_master_pencari_satwa, null);
            $hasilsatwa->harga_jual                     = $request->input('harga_jual.' .$value->id_master_pencari_satwa, null);

            $hasilsatwa->save();
        }

        foreach (MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'))->get() as $key => $value) {
            $biayasatwa                                 = new BiayaSatwa;
            $biayasatwa->id_master_pencari_satwa        = $value->id_master_pencari_satwa;
            $biayasatwa->id_responden                   = $request->session()->get('id_responden');
            $biayasatwa->volume                         = $request->input('volume.' .$value->id_master_pencari_satwa, null);
            $biayasatwa->harga_beli                     = $request->input('harga_beli.' .$value->id_master_pencari_satwa, null);
            $biayasatwa->umur_ekonomis                  = $request->input('umur_ekonomis.' .$value->id_master_pencari_satwa, null);

            $biayasatwa->save();
        }   

        foreach (MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'))->get() as $key => $value) {
            $opssatwa                                 = new OpsSatwa;
            $opssatwa->id_master_pencari_satwa        = $value->id_master_pencari_satwa;
            $opssatwa->id_responden                   = $request->session()->get('id_responden');
            $opssatwa->volume                         = $request->input('volume.' .$value->id_master_pencari_satwa, null);
            $opssatwa->harga_satuan                   = $request->input('harga_satuan.' .$value->id_master_pencari_satwa, null);
            $opssatwa->jumlah                         = $request->input('jumlah.' .$value->id_master_pencari_satwa, null);

            $opssatwa->save();
        }        

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if (!PencariSatwa::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }

        // data Hasil Satwa
        $dt_hasil_satwa = [];
        foreach (HasilSatwa::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $dt_hasil_satwa[$item->id_master_pencari_satwa] = 
            [
                'id_hasil_satwa' => $item->id_hasil_satwa,
                'jumlah_satwa'   => $item->jumlah_satwa,
                'harga_jual'     => $item->harga_jual,
            ];
        }

        // data Biaya Satwa
        $dt_biaya_satwa = [];
        foreach (BiayaSatwa::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $dt_biaya_satwa[$item->id_master_pencari_satwa] = 
            [
                'id_biaya_satwa' => $item->id_biaya_satwa,
                'volume'         => $item->volume,
                'harga_beli'     => $item->harga_beli,
                'umur_ekonomis'  => $item->umur_ekonomis,
            ];
        }

        // data Ops Satwa
        $dt_ops_satwa = [];
        foreach (OpsSatwa::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $dt_ops_satwa[$item->id_master_pencari_satwa] = 
            [
                'id_ops_satwa' => $item->id_ops_satwa,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'jumlah'       => $item->jumlah,
            ];
        }

        // Data pencari satwa
        $pencari_satwa = PencariSatwa::where('id_responden', $id)->first();
        $selected_jenis_satwa = [];
        if ($pencari_satwa['jenis_satwa'] != '')
        {
            foreach (explode(",", $pencari_satwa['jenis_satwa']) as $key => $value) {
                $selected_jenis_satwa[] = $value;
            }
        }

        return view('satwa.edit', [
            'action'              => 'satwa/edit/' . $id,
            'subtitle'            => 'Pencari Satwa',
            'master_lama_buru'    => $this->master_lama_buru,
            'master_setahun_buru' => $this->master_setahun_buru,
            'jenis_satwa'         => $this->jenis_satwa,
            'hasil_satwa'         => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'))->get(),
            'biaya_satwa'         => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'))->get(),
            'ops_satwa'           => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'))->get(),

            // Data
            'dt_pencari_satwa'     => $pencari_satwa,
            'dt_hasil_satwa'       => $dt_hasil_satwa,
            'dt_biaya_satwa'       => $dt_biaya_satwa,
            'dt_ops_satwa'         => $dt_ops_satwa,
            'selected_jenis_satwa' => $selected_jenis_satwa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save pencari satwa
        $jenis_satwa = '';
        // check if input is not null
        if ($request->input('jenis_satwa')){
            foreach ($request->input('jenis_satwa') as $key => $value) 
            {
                $jenis_satwa .= ($key)? ',' . $value: $value;
            }
        }

        $pencarisatwa                    = PencariSatwa::where('id_responden', $id)->first();
        $pencarisatwa->pencari_satwa_mgv = $request->input('pencari_satwa_mgv', null);
        $pencarisatwa->pengalaman_usaha  = $request->input('pengalaman_usaha', null);
        $pencarisatwa->jenis_satwa       = $jenis_satwa;
        $pencarisatwa->lama_buru         = $request->input('lama_buru', null);
        $pencarisatwa->lama_buru_txt     = $request->input('lama_buru', null) == 7? $request->input('lama_buru_txt', null): '';
        $pencarisatwa->setahun_buru      = $request->input('setahun_buru', null);
        $pencarisatwa->setahun_buru_txt  = $request->input('setahun_buru', null) == 5? $request->input('setahun_buru_txt', null): '';

        $pencarisatwa->save();

        // Save Hasil Satwa
        foreach ($request->input('hasil_satwa.jumlah_satwa') as $id_hasil_satwa => $value) {
            $hasilsatwa               = HasilSatwa::find($id_hasil_satwa);
            $hasilsatwa->jumlah_satwa = $request->input('hasil_satwa.jumlah_satwa.' .$id_hasil_satwa, null);
            $hasilsatwa->harga_jual   = $request->input('hasil_satwa.harga_jual.' .$id_hasil_satwa, null);
            $hasilsatwa->save();
        }

        // Save Biaya Satwa
        foreach ($request->input('biaya_satwa.volume') as $id_biaya_satwa => $value) {
            $biayasatwa                = BiayaSatwa::find($id_biaya_satwa);
            $biayasatwa->volume        = $request->input('biaya_satwa.volume.' .$id_biaya_satwa, null);
            $biayasatwa->harga_beli    = $request->input('biaya_satwa.harga_beli.' .$id_biaya_satwa, null);
            $biayasatwa->umur_ekonomis = $request->input('biaya_satwa.umur_ekonomis.' .$id_biaya_satwa, null);
            $biayasatwa->save();
        }   

        // Save Ops Satwa
        foreach ($request->input('ops_satwa.volume') as $id_ops_satwa => $value) {
            $opssatwa               = OpsSatwa::find($id_ops_satwa);
            $opssatwa->volume       = $request->input('ops_satwa.volume.' . $id_ops_satwa, null);
            $opssatwa->harga_satuan = $request->input('ops_satwa.harga_satuan.' . $id_ops_satwa, null);
            $opssatwa->jumlah       = $request->input('ops_satwa.jumlah.' . $id_ops_satwa, null);
            $opssatwa->save();
        }
        
        return redirect('responden/lihat/' . $request->session()->get('id_responden')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        PencariSatwa::where('id_responden', $id)->delete();
        HasilSatwa::where('id_responden', $id)->delete();
        BiayaSatwa::where('id_responden', $id)->delete();
        OpsSatwa::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));   
    }

    public function export()
    {
         $jenis_kelamin = [
            1 => 'Laki-Laki',
            2 => 'Perempuan',
        ];

        $pendidikan = [
            1  => 'Tidak sekolah',
            2  => 'SD',
            3  => 'SLTP',
            4  => 'SLTA',
            5  => 'D1',
            6  => 'D2',
            7  => 'D3',
            8  => 'S1',
            9  => 'S2',
            10 => 'S3',
        ];

        $status_kawin = [
            1  => 'Belum Menikah',
            2  => 'Menikah',
            3  => 'Duda',
            4  => 'Janda',
        ];

        $status_keluarga = [
            1 => 'Suami',
            2 => 'Istri',
            3 => 'Anak',
            4 => 'Sepupu',
            5 => 'Keponakan',
            6 => 'Mertua',
        ];

        $jenis_pendapatan = [
            1 => 'kurang dari Rp. 10.000.000,-',
            2 => 'Rp. 10.000.000,- hingga Rp. Rp. 20.000.000,-',
            3 => 'Rp. 20.000.000,- hingga Rp. Rp. 30.000.000,-',
            4 => 'Rp. 30.000.000,- hingga Rp. Rp. 40.000.000,-',
            5 => 'lebih dari Rp. 40.000.000,-',
        ];

        $pekerjaan = [
            1 => 'Pegawai Negeri',
            2 => 'Pegawai Swasta',
            3 => 'Wiraswasta',
            4 => 'Petani',
            5 => 'Pembudidaya',
            6 => 'Nelayan',
            7 => 'Pengrajin',
            8 => 'Pengrajin Pengrajin',
            9 => 'Buruh non perikanan',
            10 => 'Buruh Nelayan',
            11 => 'Penyedia jasa perikanan',
            12 => 'Pedagang perikanan',
            13 => 'Lainnya',
        ];       

        $hasil_satwa         = MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'))->get();
        $biaya_satwa         = MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'))->get();
        $ops_satwa           = MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'))->get();


        // Set column
        $data = [];
        // Set column Reponden
        $columns = [
            'Nama', 
            'NoKontak', 
            'Alamat', 
            'Umur', 
            'JenisKelamin', 
            'Pendidikan', 
            'LamaPendidikan', 
            'StatusPerkawinan', 
            'JumlahAnggotaKeluarga', 
            'Anak_anak', 
            'Dewasa', 
            'StatusDalamKeluarga', 
            'PendapatanRumahTangga', 
            'PekerjaanUtama', 
            'PekerjaanSampingan'];

        $columns = array_merge($columns, $this->get_column_satwa($hasil_satwa, $biaya_satwa, $ops_satwa));
        
        $data[] = $columns;

        foreach (Responden::all() as $index => $item) {
            $merge_data = [];
            // Responden
            $merge_data = array_merge($merge_data, [
                $item['nama'],
                $item['telepon'],
                $item['alamat'],
                $item['umur'],
                isset($jenis_kelamin[$item['jenis_kelamin']])? $jenis_kelamin[$item['jenis_kelamin']]: null,
                isset($pendidikan[$item['pendidikan']])? $pendidikan[$item['pendidikan']]: null,
                $item['lama_pendidikan'],
                isset($status_kawin[$item['stat_kawin']])? $status_kawin[$item['stat_kawin']]: null,
                $item['jum_ang_kel_total'],
                $item['jum_ang_kel_anak'],
                $item['jum_ang_kel_dewasa'],
                isset($status_keluarga[$item['stat_keluarga']])? $status_keluarga[$item['stat_keluarga']]: null,
                isset($jenis_pendapatan[$item['pendapatan']])? $jenis_pendapatan[$item['pendapatan']]: null,
                isset($pekerjaan[$item['pekerjaan_utama']])? $pekerjaan[$item['pekerjaan_utama']]: null,
                isset($pekerjaan[$item['pekerjaan_sampingan']])? $pekerjaan[$item['pekerjaan_sampingan']]: null,
            ]);

            // Budidata keramba
            $merge_data = array_merge($merge_data, $this->get_satwa($item['id_responden'], $hasil_satwa, $biaya_satwa, $ops_satwa));
            $data[]     = $merge_data;        
    }

        // print_r($data);
        Excel::create('Satwa', function($excel) use($data){
            // Our first sheet
            $excel->sheet('First sheet', function($sheet) use($data){
                
                $sheet->fromArray(
                    $data,
                    null,
                    'A1',
                    false,
                    false
                );


                // Set format of cell
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setFontWeight('bold');

                });
            });

        })->export('xls');
    }

    public function get_satwa($id_responden, $hasil_satwa, $biaya_satwa, $ops_satwa)
    {

        $pilihan = [
            1 => 'Benar',
            2 => 'Tidak',
        ];

        $master_lama_buru = 
        [
            1 => '1 hari sekali',
            2 => '2 hari sekali',
            3 => '3 hari sekali',
            4 => '4 hari sekali',
            5 => 'Seminggu sekali',
            6 => 'Sebulan sekali',
            7 => 'Lainnya',
        ];

        $master_setahun_buru = 
        [
            1 => '12 sekali',
            2 => '24 sekali',
            3 => '36 sekali',
            4 => '48 sekali',
            5 => 'Lainnya',
        ];

        $jenis_satwa = 
        [
            1 => 'Kelelawar',
            2 => 'Ular',
            3 => 'Burung',
            4 => 'Buaya',
        ];   

        $pencarisatwa = PencariSatwa::where('id_responden', $id_responden)->first();
        $jenissatwa = explode(',', $pencarisatwa->jenis_satwa);
        $satwa  = [
            isset($pilihan[$pencarisatwa->pencari_satwa_mgv])? $pilihan[$pencarisatwa->pencari_satwa_mgv]: null,
            $pencarisatwa->pengalaman_usaha,
            in_array(1, $jenissatwa)? 'Ya': 'Tidak',
            in_array(2, $jenissatwa)? 'Ya': 'Tidak',
            in_array(3, $jenissatwa)? 'Ya': 'Tidak',
            in_array(4, $jenissatwa)? 'Ya': 'Tidak',
            isset($master_lama_buru[$pencarisatwa->lama_buru])? $master_lama_buru[$pencarisatwa->lama_buru]: null,
            $pencarisatwa->lama_buru_txt,
            isset($master_setahun_buru[$pencarisatwa->setahun_buru])? $master_setahun_buru[$pencarisatwa->setahun_buru]: null,
            $pencarisatwa->setahun_buru_txt,
        ];

        // data Hasil Satwa
        $dt_hasil_satwa = [];
        foreach (HasilSatwa::where('id_responden', $id_responden)->get() as $idx => $item) {
            $dt_hasil_satwa[$item->id_master_pencari_satwa] = 
            [
                'id_hasil_satwa' => $item->id_hasil_satwa,
                'jumlah_satwa'   => $item->jumlah_satwa,
                'harga_jual'     => $item->harga_jual,
            ];
        }

        // data Biaya Satwa
        $dt_biaya_satwa = [];
        foreach (BiayaSatwa::where('id_responden', $id_responden)->get() as $idx => $item) {
            $dt_biaya_satwa[$item->id_master_pencari_satwa] = 
            [
                'id_biaya_satwa' => $item->id_biaya_satwa,
                'volume'         => $item->volume,
                'harga_beli'     => $item->harga_beli,
                'umur_ekonomis'  => $item->umur_ekonomis,
            ];
        }

        // data Ops Satwa
        $dt_ops_satwa = [];
        foreach (OpsSatwa::where('id_responden', $id_responden)->get() as $idx => $item) {
            $dt_ops_satwa[$item->id_master_pencari_satwa] = 
            [
                'id_ops_satwa' => $item->id_ops_satwa,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'jumlah'       => $item->jumlah,
            ];
        }   

        //data hasil satwa
        foreach ($hasil_satwa as $key => $value) {
            $satwa[]    = $dt_hasil_satwa[$value->id_master_pencari_satwa]['jumlah_satwa'];
            $satwa[]    = $dt_hasil_satwa[$value->id_master_pencari_satwa]['harga_jual'];
        }     

        //data biaya satwa
        foreach ($biaya_satwa as $key => $value) {
            $satwa[]    = $dt_biaya_satwa[$value->id_master_pencari_satwa]['volume'];
            $satwa[]    = $dt_biaya_satwa[$value->id_master_pencari_satwa]['harga_beli'];
            $satwa[]    = $dt_biaya_satwa[$value->id_master_pencari_satwa]['umur_ekonomis'];
        }

        //data ops satwa
        foreach ($ops_satwa as $key => $value) {
            $satwa[]    = $dt_ops_satwa[$value->id_master_pencari_satwa]['volume'];
            $satwa[]    = $dt_ops_satwa[$value->id_master_pencari_satwa]['harga_satuan'];
            $satwa[]    = $dt_ops_satwa[$value->id_master_pencari_satwa]['jumlah'];
        }

        return $satwa;

    }

    public function get_column_satwa($hasil_satwa, $biaya_satwa, $ops_satwa)
    {

        $columns = 
        [
            'PencariSatwa',
            'LamaUsaha',
            'SatwaPeroleh_Kelelawar',
            'SatwaPeroleh_Ular',
            'SatwaPeroleh_Burung',
            'SatwaPeroleh_Buaya',
            'FrekuensiBerburuSatwa',
            'FrekuensiBerburuSatwa_lainnya',
            'OperasiPerburuanSatwa',
            'OperasiPerburuanSatwa_lainnya',
        ];

        foreach ($hasil_satwa as $key => $value) {
            $columns[]  = 'JumlahSatwa_' . $value['rincian'];
            $columns[]  = 'HargaJual_' . $value['rincian'];
        }

        foreach ($biaya_satwa as $key => $value) {
            $columns[]  = 'Volume_' . $value['rincian'];
            $columns[]  = 'HargaBeli_' . $value['rincian'];
            $columns[]  = 'UmurEkonomis_' . $value['rincian'];
        }

        foreach ($ops_satwa as $key => $value) {
            $columns[]  = 'Volume_' . $value['rincian'];
            $columns[]  = 'HargaSatuan_' . $value['rincian'];
            $columns[]  = 'JumlahBiaya_' . $value['rincian'];
        }

        return $columns;
    }

}
