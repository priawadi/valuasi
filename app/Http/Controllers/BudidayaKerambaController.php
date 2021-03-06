<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BudidayaKeramba;
use App\MasterKomoditas;
use App\HasilPanen;
use App\MasterBiaya;
use App\Biaya;
use App\Responden;
use Excel;

class BudidayaKerambaController extends Controller
{
    var $status_usaha = [
        1 => 'Pemilik',
        2 => 'Penggarap',
        3 => 'Penyewa',
    ]; 

    var $jenis_komoditas = [
        1 => 'Kerapu Macam',
        2 => 'Kerapu Bebek/Kerapu Tikus',
        3 => 'Kerapu Sunu',
        4 => 'Kerapu Lodi',
        5 => 'Lobster Pasir',
        6 => 'Lobster Mutiara',
        7 => 'Udang',
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }

        return view('budidaya_keramba.info.form', [
            'subtitle'            => 'Keramba',
            'action'              => 'budidaya-keramba/info/tambah',
            'status_usaha'        => $this->status_usaha,
            'jenis_komoditas'     => $this->jenis_komoditas,
            'master_biaya_invest' => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_var'    => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'master_biaya_tetap'  => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            'komoditas'           => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get()
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
        $jenis_komoditas = '';
        // check if input is not null
        if ($request->input('jenis_komoditas')){
            foreach ($request->input('jenis_komoditas') as $key => $value) 
            {
                $jenis_komoditas .= ($key)? ',' . $value: $value;
            }
        }

        $budidaya_keramba                      = new BudidayaKeramba;
        $budidaya_keramba->id_responden        = $request->session()->get('id_responden');
        $budidaya_keramba->lama_usaha          = $request->input('lama_usaha');
        $budidaya_keramba->status_usaha        = $request->input('status_usaha');
        $budidaya_keramba->mapen_sblm_keramba  = $request->input('mapen_sblm_keramba');
        $budidaya_keramba->luas_lahan          = $request->input('luas_lahan');
        $budidaya_keramba->keramba_total       = $request->input('keramba_total');
        $budidaya_keramba->keramba_aktif       = $request->input('keramba_aktif');
        $budidaya_keramba->keramba_tidak_aktif = $request->input('keramba_tidak_aktif');
        $budidaya_keramba->jenis_komoditas     = $jenis_komoditas;
        $budidaya_keramba->waktu_pemeliharaan  = $request->input('waktu_pemeliharaan');
        $budidaya_keramba->jum_siklus_panen    = $request->input('jum_siklus_panen');

        $budidaya_keramba->save();

        // save biaya investasi
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $index => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.INVESTASI');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.KERAMBA');
            $biaya->volume          = $request->input('volume.' . $value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' . $value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' . $value->id_master_biaya, null);
            
            $biaya->save();
        }

        // save biaya variabel
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $index => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.VARIABEL');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.KERAMBA');
            $biaya->volume          = $request->input('volume.' . $value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' . $value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' . $value->id_master_biaya, null);
            
            $biaya->save();
        }

        // save biaya tetapS
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $index => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.TETAP');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.KERAMBA');
            $biaya->volume          = $request->input('volume.' . $value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' . $value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' . $value->id_master_biaya, null);
            
            $biaya->save();
        }

        // save hasil panen
        foreach (MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get() as $idx => $item) {
            $hasil_panen                      = new HasilPanen;
            $hasil_panen->id_responden        = $request->session()->get('id_responden');
            $hasil_panen->kateg_modul         = \Config::get('constants.MODULE.KERAMBA');
            $hasil_panen->id_master_komoditas = $item->id_master_komoditas;
            $hasil_panen->jumlah              = $request->input('jumlah.' . $item->id_master_komoditas, null);
            $hasil_panen->harga_jual          = $request->input('harga_jual.' . $item->id_master_komoditas, null);
            $hasil_panen->jumlah_penerimaan   = $request->input('jumlah_penerimaan.' . $item->id_master_komoditas, null);
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
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $idx => $item) {
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
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $idx => $item) {
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
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $idx => $item) {
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
        foreach (HasilPanen::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $hasil_panen[$item->id_master_komoditas] = 
            [
                'id_hasil_panen'    => $item->id_hasil_panen,
                'jumlah'            => $item->jumlah,
                'harga_jual'        => $item->harga_jual,
                'jumlah_penerimaan' => $item->jumlah_penerimaan,
            ];
        }

        $budidaya_keramba = BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->first();
        
        $selected_jenis_komoditas = [];
        if ($budidaya_keramba['jenis_komoditas'] != '')
        {
            foreach (explode(",", $budidaya_keramba['jenis_komoditas']) as $key => $value) {
                $selected_jenis_komoditas[] = $value;
            }
        }
        
        return view('budidaya_keramba.info.edit', [
            'subtitle'                 => 'Edit Budidaya Keramba',
            'action'                   => 'budidaya-keramba/info/edit/' . $id,
            'status_usaha'             => $this->status_usaha,
            'jenis_komoditas'          => $this->jenis_komoditas,
            'budidaya_keramba'         => $budidaya_keramba,
            'selected_jenis_komoditas' => $selected_jenis_komoditas,
            'komoditas'                => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get(),
            'biaya_invest'             => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'biaya_var'                => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'biaya_tetap'              => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            'jwb_biaya_invest'         => $jwb_biaya_invest,
            'jwb_biaya_var'            => $jwb_biaya_var,
            'jwb_biaya_tetap'          => $jwb_biaya_tetap,
            'hasil_panen'              => $hasil_panen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $jenis_komoditas = '';
        // check if input is not null
        if ($request->input('jenis_komoditas')){
            foreach ($request->input('jenis_komoditas') as $key => $value) 
            {
                $jenis_komoditas .= ($key)? ',' . $value: $value;
            }
        }

        $budidaya_keramba                      = BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->first();
        $budidaya_keramba->id_responden        = $request->session()->get('id_responden');
        $budidaya_keramba->lama_usaha          = $request->input('lama_usaha');
        $budidaya_keramba->status_usaha        = $request->input('status_usaha');
        $budidaya_keramba->mapen_sblm_keramba  = $request->input('mapen_sblm_keramba');
        $budidaya_keramba->luas_lahan          = $request->input('luas_lahan');
        $budidaya_keramba->keramba_total       = $request->input('keramba_total');
        $budidaya_keramba->keramba_aktif       = $request->input('keramba_aktif');
        $budidaya_keramba->keramba_tidak_aktif = $request->input('keramba_tidak_aktif');
        $budidaya_keramba->jenis_komoditas     = $jenis_komoditas;
        $budidaya_keramba->waktu_pemeliharaan  = $request->input('waktu_pemeliharaan');
        $budidaya_keramba->jum_siklus_panen    = $request->input('jum_siklus_panen');

        $budidaya_keramba->save();

        // save biaya investasi, variabel, dan tetap
        foreach ($request->input('volume') as $id_biaya => $item) {
            $biaya               = Biaya::find($id_biaya);
            $biaya->volume       = $request->input('volume.' . $id_biaya);
            $biaya->harga_satuan = $request->input('harga_satuan.' . $id_biaya);
            $biaya->total        = $request->input('total.' . $id_biaya);
            $biaya->save();
        }

        // save hasil panen
        foreach ($request->input('jumlah') as $id_hasil_panen => $item) {
            $hasil_panen                    = HasilPanen::find($id_hasil_panen);
            $hasil_panen->jumlah            = $request->input('jumlah.' . $id_hasil_panen);
            $hasil_panen->harga_jual        = $request->input('harga_jual.' . $id_hasil_panen);
            $hasil_panen->jumlah_penerimaan = $request->input('jumlah_penerimaan.' . $id_hasil_panen);
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
        HasilPanen::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->delete();
        BudidayaKeramba::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->delete();

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

        $jenis_komoditas = [
            1 => 'Kerapu Macam',
            2 => 'Kerapu Bebek',
            3 => 'Kerapu Sunu',
            4 => 'Kerapu Lodi',
            5 => 'Kerapu Sunu',
            6 => 'Kerapu Lobster Pasir',
            7 => 'Lobster Mutiara',
            8 => 'Udang',
        ];

        $master_biaya_invest = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get();
        $master_biaya_var    = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get();
        $master_biaya_tetap  = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get();

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

        // Keramba
        // if ($kuesioner == 'keramba')
        $columns = array_merge($columns, $this->get_column_keramba($master_biaya_invest, $master_biaya_var, $master_biaya_tetap, $jenis_komoditas));
        
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
            $merge_data = array_merge($merge_data, $this->get_keramba($item['id_responden'], $master_biaya_invest, $master_biaya_var, $master_biaya_tetap, $jenis_komoditas));
            $data[]     = $merge_data;
        }

        // print_r($data);
        Excel::create('Keramba', function($excel) use($data){
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

    public function get_keramba($id_responden, $master_biaya_invest, $master_biaya_var, $master_biaya_tetap)
    {
        $status_usaha = [
            1 => 'Pemilik',
            2 => 'Penggarap',
            3 => 'Penyewa',
        ]; 

        $budidaya_keramba = BudidayaKeramba::where('id_responden', $id_responden)->first();
        $komoditas = explode(',', $budidaya_keramba->jenis_komoditas);
        $keramba = [
            $budidaya_keramba->lama_usaha,
            isset($status_usaha[$budidaya_keramba->status_usaha])? $status_usaha[$budidaya_keramba->status_usaha]: null,
            $budidaya_keramba->mapen_sblm_keramba,
            $budidaya_keramba->luas_lahan,
            $budidaya_keramba->keramba_total,
            $budidaya_keramba->keramba_aktif,
            $budidaya_keramba->keramba_tidak_aktif,
            in_array(1, $komoditas)? 'Ya': 'Tidak',
            in_array(2, $komoditas)? 'Ya': 'Tidak',
            in_array(3, $komoditas)? 'Ya': 'Tidak',
            in_array(4, $komoditas)? 'Ya': 'Tidak',
            in_array(5, $komoditas)? 'Ya': 'Tidak',
            in_array(6, $komoditas)? 'Ya': 'Tidak',
            in_array(7, $komoditas)? 'Ya': 'Tidak',
            $budidaya_keramba->waktu_pemeliharaan,
            $budidaya_keramba->jum_siklus_panen,
        ];

        // data biaya investasi
        $jwb_biaya_invest = [];
        foreach (Biaya::where('id_responden', $id_responden)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $idx => $item) {
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
        foreach (Biaya::where('id_responden', $id_responden)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $idx => $item) {
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
        foreach (Biaya::where('id_responden', $id_responden)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $idx => $item) {
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
        foreach (HasilPanen::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('id_responden', $id_responden)->get() as $idx => $item) {
            $hasil_panen[$item->id_master_komoditas] = 
            [
                'id_hasil_panen'    => $item->id_hasil_panen,
                'jumlah'            => $item->jumlah,
                'harga_jual'        => $item->harga_jual,
                'jumlah_penerimaan' => $item->jumlah_penerimaan,
            ];
        }

        // Biaya investasi
        foreach ($master_biaya_invest as $key => $item) {
            $keramba[] = $jwb_biaya_invest[$item->id_master_biaya]['volume'];
            $keramba[] = $jwb_biaya_invest[$item->id_master_biaya]['harga_satuan'];
            $keramba[] = $jwb_biaya_invest[$item->id_master_biaya]['total'];
        }

        // Biaya variabel
        foreach ($master_biaya_var as $key => $item) {
            $keramba[] = $jwb_biaya_var[$item->id_master_biaya]['volume'];
            $keramba[] = $jwb_biaya_var[$item->id_master_biaya]['harga_satuan'];
            $keramba[] = $jwb_biaya_var[$item->id_master_biaya]['total'];
        }

        // Biaya tetap
        foreach ($master_biaya_tetap as $key => $item) {
            $keramba[] = $jwb_biaya_tetap[$item->id_master_biaya]['volume'];
            $keramba[] = $jwb_biaya_tetap[$item->id_master_biaya]['harga_satuan'];
            $keramba[] = $jwb_biaya_tetap[$item->id_master_biaya]['total'];
        }

        // Biaya hasil panen
        foreach ($this->jenis_komoditas as $key => $value) {
            $keramba[] = $hasil_panen[$key]['jumlah'];
            $keramba[] = $hasil_panen[$key]['harga_jual'];
            $keramba[] = $hasil_panen[$key]['jumlah_penerimaan'];
        }


        return $keramba;
    }

    public function get_column_keramba($master_biaya_invest, $master_biaya_var, $master_biaya_tetap)
    {

        $columns = 
        [
            'LamaUsaha',
            'StatusUsaha',
            'MataPencaharianSebelum',
            'LuasLahanBudidaya',
            'JumlahTotalKeramba',
            'JumlahKerambaAktif',
            'JumlahKerambaTidakAktif',
            'Komoditas_Kerapu_Macam',
            'Komoditas_Kerapu_Bebek',
            'Komoditas_Kerapu_Sunu',
            'Komoditas_Kerapu_Lodi',
            'Komoditas_Lobster_Pasir',
            'Komoditas_Lobster_Mutiara',
            'Komoditas_Udang',
            'WaktuPemeliharaan',
            'JumlahPanen',
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
        foreach ($this->jenis_komoditas as $key => $value) {
            $columns[] = 'JumlahProduksi_' . $value;
            $columns[] = 'HargaJual_' . $value;
            $columns[] = 'JumlahPenerimaan_' . $value;
        }

        return $columns;
    }
}
