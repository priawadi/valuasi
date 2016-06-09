<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tambak;
use App\MasterBiaya;
use App\Biaya;
use App\HasilPanen;
use App\MasterKomoditas;
use App\Responden;
use Excel;

class TambakController extends Controller
{

        var $jenis_komoditas_tambak = [
            8  => 'Udang Vaname',
            9  => 'Udang Windu',
            10 => 'Bandeng',
            11 => 'Kepiting/Rajungan'
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$master_biaya               = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get();
        $master_biaya_var           = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get();
        $master_biaya_tetap         = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get();
        $hasil_panen                = MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Tambak::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }

        return view('tambak.form', [
            'action'           			=> 'tambak/tambah',
            'subtitle'					=> 'Usaha Budidaya Tambak',
			'jenis_komoditas_tambak' 	=> $this->jenis_komoditas_tambak,
			'master_biaya' 				=> MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_var'          => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'master_biaya_tetap'        => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            'hasil_panen'               => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get(),
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
        $jenis_komoditas_tambak = '';
        if ($request->input('jenis_komoditas_tambak')){
            foreach ($request->input('jenis_komoditas_tambak') as $key => $value) 
            {
                $jenis_komoditas_tambak .= ($key)? ',' . $value: $value;
            }
        }
        $tambak                            = new Tambak;
        $tambak->id_responden              = $request->session()->get('id_responden');
        $tambak->lama_tambak               = $request->input('lama_tambak', null);
        $tambak->status_tambak             = $request->input('status_tambak', null);
        $tambak->mapen_sblm_tambak         = $request->input('mapen_sblm_tambak', null);
        $tambak->luas_tambak               = $request->input('luas_tambak', null);
        $tambak->status_kepem_tambak       = $request->input('status_kepem_tambak', null);
        $tambak->jenis_komoditas_tambak    = $jenis_komoditas_tambak;
        $tambak->waktu_pemeliharaan_tambak = $request->input('waktu_pemeliharaan_tambak', null);
        $tambak->jum_panen_tambak          = $request->input('jum_panen_tambak', null);

        $tambak->save();

        // save biaya investasi
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $key => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.INVESTASI');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.TAMBAK');
            $biaya->volume          = $request->input('volume.' .$value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' .$value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' .$value->id_master_biaya, null);

            $biaya->save();
    	}

        // save biaya variabel
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $key => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.VARIABEL');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.TAMBAK');
            $biaya->volume          = $request->input('volume.' .$value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' .$value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' .$value->id_master_biaya, null);

            $biaya->save();
        }

        // save biaya tetap
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $key => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.TETAP');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.TAMBAK');
            $biaya->volume          = $request->input('volume.' .$value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' .$value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' .$value->id_master_biaya, null);

            $biaya->save();
        }     

        // save hasil panen
        foreach (MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get() as $key => $value) {
        $hasil_panen                        = new HasilPanen;
        $hasil_panen->id_responden          = $request->session()->get('id_responden');
        $hasil_panen->kateg_modul           = \Config::get('constants.MODULE.TAMBAK');
        $hasil_panen->id_master_komoditas   = $value->id_master_komoditas;
        $hasil_panen->jumlah                = $request->input('jumlah.' .$value->id_master_komoditas, null);
        $hasil_panen->harga_jual            = $request->input('harga_jual.' .$value->id_master_komoditas, null);
        $hasil_panen->jumlah_penerimaan     = $request->input('jumlah_penerimaan.' .$value->id_master_komoditas, null);

        $hasil_panen->save();
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

        // data biaya investasi
        $jwb_biaya_invest = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $idx => $item) {
            $jwb_biaya_invest[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya variabel
        $jwb_biaya_var = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $idx => $item) {
            $jwb_biaya_var[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya tetap
        $jwb_biaya_tetap = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $idx => $item) {
            $jwb_biaya_tetap[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data hasil panen
        $hasil_panen = [];
        foreach (HasilPanen::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $hasil_panen[$item->id_master_komoditas] = 
            [
                'id_hasil_panen'    => $item->id_hasil_panen,
                'jumlah'            => $item->jumlah,
                'harga_jual'        => $item->harga_jual,
                'jumlah_penerimaan' => $item->jumlah_penerimaan,
            ];
        }

        $tambak = Tambak::where('id_responden', $request->session()->get('id_responden'))->first();
        
        $selected_jenis_komoditas = [];
        if ($tambak['jenis_komoditas_tambak'] != '')
        {
            foreach (explode(",", $tambak['jenis_komoditas_tambak']) as $key => $value) {
                $selected_jenis_komoditas[] = $value;
            }
        }

        return view('tambak.edit', [
            'subtitle'                  => 'Edit Budidaya Tambak',
            'action'                    => 'tambak/edit/' . $id,
            'tambak'                    => $tambak,     
            'jwb_biaya_invest'          => $jwb_biaya_invest,
            'jwb_biaya_var'             => $jwb_biaya_var,
            'jwb_biaya_tetap'           => $jwb_biaya_tetap,
            'hasil_panen'               => $hasil_panen,            
            'jenis_komoditas_tambak'    => $this->jenis_komoditas_tambak,
            'selected_jenis_komoditas'  => $selected_jenis_komoditas,
            'master_biaya'              => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_var'          => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'master_biaya_tetap'        => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            'komoditas'                 => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get(),                
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

        $jenis_komoditas_tambak = '';
        if ($request->input('jenis_komoditas_tambak')){
            foreach ($request->input('jenis_komoditas_tambak') as $key => $value) 
            {
                $jenis_komoditas_tambak .= ($key)? ',' . $value: $value;
            }
        }
        $tambak                            = Tambak::where('id_responden', $request->session()->get('id_responden'))->first();
        $tambak->id_responden              = $request->session()->get('id_responden');
        $tambak->lama_tambak               = $request->input('lama_tambak', null);
        $tambak->status_tambak             = $request->input('status_tambak', null);
        $tambak->mapen_sblm_tambak         = $request->input('mapen_sblm_tambak', null);
        $tambak->luas_tambak               = $request->input('luas_tambak', null);
        $tambak->status_kepem_tambak       = $request->input('status_kepem_tambak', null);
        $tambak->jenis_komoditas_tambak    = $jenis_komoditas_tambak;
        $tambak->waktu_pemeliharaan_tambak = $request->input('waktu_pemeliharaan_tambak', null);
        $tambak->jum_panen_tambak          = $request->input('jum_panen_tambak', null);

        $tambak->save();

        // save biaya investasi, variabel, dan tetap
        foreach ($request->input('volume') as $id_biaya => $item) {
            $biaya               = Biaya::find($id_biaya);
            $biaya->volume       = $request->input('volume.' . $id_biaya, null);
            $biaya->harga_satuan = $request->input('harga_satuan.' . $id_biaya, null);
            $biaya->total        = $request->input('total.' . $id_biaya, null);
            $biaya->save();
        }

        // save hasil panen
        foreach ($request->input('jumlah') as $id_hasil_panen => $item) {
            $hasil_panen                    = HasilPanen::find($id_hasil_panen);
            $hasil_panen->jumlah            = $request->input('jumlah.' . $id_hasil_panen, null);
            $hasil_panen->harga_jual        = $request->input('harga_jual.' . $id_hasil_panen, null);
            $hasil_panen->jumlah_penerimaan = $request->input('jumlah_penerimaan.' . $id_hasil_panen, null);
            $hasil_panen->save();
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
        HasilPanen::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->delete();
        Tambak::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->delete();

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

        $master_komoditas    = MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get();
        $master_biaya_invest = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get();
        $master_biaya_var    = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get();
        $master_biaya_tetap  = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get();

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

        // Tambak
        $columns = array_merge($columns, $this->get_column_tambak($master_biaya_invest, $master_biaya_var, $master_biaya_tetap, $this->jenis_komoditas_tambak));
        
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

            // Budidaya Tambak
            $merge_data = array_merge($merge_data, $this->get_data($item['id_responden'], $master_biaya_invest, $master_biaya_var, $master_biaya_tetap, $this->jenis_komoditas_tambak));
            $data[]     = $merge_data;
        }

        // print_r($data);
        Excel::create('Tambak', function($excel) use($data){
            // Our first sheet
            $excel->sheet('Sheet1', function($sheet) use($data){
                
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

    public function get_data($id_responden, $master_biaya_invest, $master_biaya_var, $master_biaya_tetap)
    {
        $status_usaha = [
            1 => 'Pemilik',
            2 => 'Penggarap',
            3 => 'Penyewa',
        ]; 

        $status_kepem_tambak = [
            1 => 'Milik Sendiri',
            2 => 'Sewa',
            3 => 'Bagi Hasil',
        ]; 

        $tambak = Tambak::where('id_responden', $id_responden)->first();
        $komoditas = explode(',', $tambak->jenis_komoditas_tambak);

        $column_data = [
            $tambak->lama_tambak,
            isset($status_usaha[$tambak->status_tambak])? $status_usaha[$tambak->status_tambak]: $status_usaha[$tambak->status_tambak],
            $tambak->mapen_sblm_tambak,
            $tambak->luas_tambak,
            isset($status_kepem_tambak[$tambak->status_kepem_tambak])? $status_kepem_tambak[$tambak->status_kepem_tambak]: $status_kepem_tambak[$tambak->status_kepem_tambak],
            in_array(8, $komoditas)? 'Ya': 'Tidak',
            in_array(9, $komoditas)? 'Ya': 'Tidak',
            in_array(10, $komoditas)? 'Ya': 'Tidak',
            in_array(11, $komoditas)? 'Ya': 'Tidak',
            $tambak->waktu_pemeliharaan_tambak,
            $tambak->jum_panen_tambak,
        ];

        // data biaya investasi
        $jwb_biaya_invest = [];
        foreach (Biaya::where('id_responden', $id_responden)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $idx => $item) {
            $jwb_biaya_invest[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya variabel
        $jwb_biaya_var = [];
        foreach (Biaya::where('id_responden', $id_responden)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $idx => $item) {
            $jwb_biaya_var[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya tetap
        $jwb_biaya_tetap = [];
        foreach (Biaya::where('id_responden', $id_responden)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $idx => $item) {
            $jwb_biaya_tetap[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data hasil panen
        $hasil_panen = [];
        foreach (HasilPanen::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('id_responden', $id_responden)->get() as $idx => $item) {
            $hasil_panen[$item->id_master_komoditas] = 
            [
                'id_hasil_panen'    => $item->id_hasil_panen,
                'jumlah'            => $item->jumlah,
                'harga_jual'        => $item->harga_jual,
                'jumlah_penerimaan' => $item->jumlah_penerimaan,
            ];
        }

        // print_r($hasil_panen);
        // die();

        // Biaya investasi
        foreach ($master_biaya_invest as $key => $item) {
            $column_data[] = $jwb_biaya_invest[$item->id_master_biaya]['volume'];
            $column_data[] = $jwb_biaya_invest[$item->id_master_biaya]['harga_satuan'];
            $column_data[] = $jwb_biaya_invest[$item->id_master_biaya]['total'];
        }

        // Biaya variabel
        foreach ($master_biaya_var as $key => $item) {
            $column_data[] = $jwb_biaya_var[$item->id_master_biaya]['volume'];
            $column_data[] = $jwb_biaya_var[$item->id_master_biaya]['harga_satuan'];
            $column_data[] = $jwb_biaya_var[$item->id_master_biaya]['total'];
        }

        // Biaya tetap
        foreach ($master_biaya_tetap as $key => $item) {
            $column_data[] = $jwb_biaya_tetap[$item->id_master_biaya]['volume'];
            $column_data[] = $jwb_biaya_tetap[$item->id_master_biaya]['harga_satuan'];
            $column_data[] = $jwb_biaya_tetap[$item->id_master_biaya]['total'];
        }

        // Biaya hasil panen
        foreach ($this->jenis_komoditas_tambak as $key => $value) {
            $column_data[] = $hasil_panen[$key]['jumlah'];
            $column_data[] = $hasil_panen[$key]['harga_jual'];
            $column_data[] = $hasil_panen[$key]['jumlah_penerimaan'];
        }


        return $column_data;
    }

    public function get_column_tambak($master_biaya_invest, $master_biaya_var, $master_biaya_tetap)
    {

        $columns = 
        [
            'LamaUsaha',
            'StatusUsaha',
            'MataPencaharianSebelum',
            'LuasTambak',
            'StatusKepemilikan',
            'KomoditasDiusahakan_UdangVaname',
            'KomoditasDiusahakan_UdangWindu',
            'KomoditasDiusahakan_Bandeng',
            'KomoditasDiusahakan_Kepiting',
            'WaktuPemeliharaan',
            'JumlahSiklus',
        ];

        // Biaya Investasi
        foreach ($master_biaya_invest as $key => $value) {
            $columns[] = 'Volume_' . $value['biaya'];
            $columns[] = 'HargaSatuan_' . $value['biaya'];
            $columns[] = 'Biaya_' . $value['biaya'];
        }

        // Biaya Variabel
        foreach ($master_biaya_var as $key => $value) {
            $columns[] = 'Volume_' . $value['biaya'];
            $columns[] = 'HargaSatuan_' . $value['biaya'];
            $columns[] = 'Biaya_' . $value['biaya'];
        }

        // Biaya Tetap
        foreach ($master_biaya_tetap as $key => $value) {
            $columns[] = 'Volume_' . $value['biaya'];
            $columns[] = 'HargaSatuan_' . $value['biaya'];
            $columns[] = 'Biaya_' . $value['biaya'];
        }

        // Biaya Panen
        foreach ($this->jenis_komoditas_tambak as $key => $value) {
            $columns[] = 'JumlahProduksi_' . $value;
            $columns[] = 'HargaJual_' . $value;
            $columns[] = 'JumlahPenerimaan_' . $value;
        }

        return $columns;
    }
}
