<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterBiaya;
use App\BudidayaRumputLaut;
use App\Biaya;
use App\LokasiRumputLaut;
use App\ProduksiRumputLaut;
use App\DetilProduksi;

class BudidayaRumputLautController extends Controller
{
    var $status_usaha = 
    [
        1 => 'Pemilik',
        2 => 'Penggarap',
        3 => 'Penyewa',
    ];

    var $status_kepemilikan = 
    [
        1 => 'Milik Sendiri',
        2 => 'Sewa',
        3 => 'Bagi Hasil',
        4 => 'Lainnya',
    ];

    var $lokasi_budidaya = 
    [
        1 => 'Unit 1',
        2 => 'Unit 2',
        3 => 'Unit 3',
        4 => 'Unit 4',
    ];
    
    var $jenis_rumput_laut = 
    [
        1 => 'E. Spinosum',
        2 => 'E. Cottoni',
        3 => 'E. Glacilaria',
    ];

    var $jenis_musim = 
    [
        1 => 'Musim Puncak',
        2 => 'Musim Sedang',
        3 => 'Musim Paceklik',
    ];

    var $kondisi_rumput_laut = 
    [
        1 => 'Rumput laut basah',
        2 => 'Rumput laut kering',
    ];

    var $ukuran_lokasi = 
    [
        0 => 'Tidak',
        1 => 'Ya',
    ];

    var $bulan = 
    [
        1  => 'Januari',
        2  => 'Februari',
        3  => 'Maret',
        4  => 'April',
        5  => 'Mei',
        6  => 'Juni',
        7  => 'Juli',
        8  => 'Agustus',
        9  => 'September',
        10 => 'Oktober',
        11 => 'Nopember',
        12 => 'Desember',
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
        if (BudidayaRumputLaut::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }
        
        return view('budidaya_rumput_laut.form', [
            'subtitle'            => 'Budidaya Rumput Laut',
            'action'              => 'budidaya-rumput-laut/tambah',
            'status_usaha'        => $this->status_usaha,
            'lokasi_budidaya'     => $this->lokasi_budidaya,
            'jenis_rumput_laut'   => $this->jenis_rumput_laut,
            'kondisi_rumput_laut' => $this->kondisi_rumput_laut,
            'ukuran_lokasi'       => $this->ukuran_lokasi,
            'status_kepemilikan'  => $this->status_kepemilikan,
            'jenis_musim'         => $this->jenis_musim,
            'bulan'               => $this->bulan,
            'master_biaya_invest' => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_ops'    => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.OPERASIONAL'))->get(),
            'master_biaya_tetap'  => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
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
        $jenis_rumput_laut = '';
        // check if input is not null
        if ($request->input('jenis_rumput_laut')){
            foreach ($request->input('jenis_rumput_laut') as $key => $value) 
            {
                $jenis_rumput_laut .= ($key)? ',' . $value: $value;
            }
        }

        $budidaya_rumput_laut                          = new BudidayaRumputLaut;
        $budidaya_rumput_laut->id_responden            = $request->session()->get('id_responden');
        $budidaya_rumput_laut->lama_usaha              = $request->input('lama_usaha', null);
        $budidaya_rumput_laut->status_usaha            = $request->input('status_usaha', null);
        $budidaya_rumput_laut->pekerjaan_sebelumnya    = $request->input('pekerjaan_sebelumnya', null);
        $budidaya_rumput_laut->pendapatan_bersih       = $request->input('pendapatan_bersih', null);
        $budidaya_rumput_laut->is_ukuran_sama          = $request->input('is_ukuran_sama', null);
        $budidaya_rumput_laut->jumlah_lokasi           = $request->input('jumlah_lokasi', null);
        $budidaya_rumput_laut->status_kepemilikan      = $request->input('status_kepemilikan', null);
        $budidaya_rumput_laut->status_kepemilikan_lain = $request->input('status_kepemilikan_lain', null);
        $budidaya_rumput_laut->jenis_rumput_laut       = $jenis_rumput_laut;
        $budidaya_rumput_laut->jumlah_panen            = $request->input('jumlah_panen', null);

        $budidaya_rumput_laut->save();

        // save lokasi budidaya
        foreach ($this->lokasi_budidaya as $id_lokasi_budidaya => $lokasi_budidaya) {
            $lokasi_rumput_laut                      = new LokasiRumputLaut;
            $lokasi_rumput_laut->id_responden        = $request->session()->get('id_responden');
            $lokasi_rumput_laut->lokasi              = $id_lokasi_budidaya;
            $lokasi_rumput_laut->panjang_bentang     = $request->input('panjang_bentang.' . $id_lokasi_budidaya, null);
            $lokasi_rumput_laut->jarak_antar_bentang = $request->input('jarak_antar_bentang.' . $id_lokasi_budidaya, null);
            $lokasi_rumput_laut->jumlah_bentang      = $request->input('jumlah_bentang.' . $id_lokasi_budidaya, null);
            $lokasi_rumput_laut->save();
        }

        // save biaya investasi
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $index => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.INVESTASI');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.RUMPUT_LAUT');
            $biaya->volume          = $request->input('volume.' . $value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' . $value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' . $value->id_master_biaya, null);
            
            $biaya->save();
        }

        // save biaya operasional
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.OPERASIONAL'))->get() as $index => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.OPERASIONAL');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.RUMPUT_LAUT');
            $biaya->volume          = $request->input('volume.' . $value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' . $value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' . $value->id_master_biaya, null);
            
            $biaya->save();
        }

        // save biaya tetapS
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $index => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.TETAP');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.RUMPUT_LAUT');
            $biaya->volume          = $request->input('volume.' . $value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' . $value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' . $value->id_master_biaya, null);
            
            $biaya->save();
        }

        // save Produksi Rumput Laut
        foreach ($this->jenis_musim as $id_musim => $musim) {
            $produksi_rumput_laut               = new ProduksiRumputLaut;
            $produksi_rumput_laut->id_responden = $request->session()->get('id_responden');
            $produksi_rumput_laut->jenis_musim  = $id_musim;
            $produksi_rumput_laut->awal_bulan   = $request->input('produksi_rumput_laut.awal_bulan.' . $id_musim, null);
            $produksi_rumput_laut->akhir_bulan  = $request->input('produksi_rumput_laut.akhir_bulan.' . $id_musim, null);
            $produksi_rumput_laut->total_panen  = $request->input('produksi_rumput_laut.total_panen.' . $id_musim, null);
            $produksi_rumput_laut->save();

            foreach ($this->kondisi_rumput_laut as $id_kondisi => $kondisi) {
                foreach ($this->kondisi_rumput_laut as $id_kondisi => $kondisi) 
                {
                    foreach ($this->jenis_rumput_laut as $id_rumput_laut => $rumput_laut) 
                    {
                        $detil_produksi                      = new DetilProduksi;
                        $detil_produksi->id_responden        = $request->session()->get('id_responden');
                        $detil_produksi->jenis_musim         = $id_musim;
                        $detil_produksi->kondisi_rumput_laut = $id_kondisi;
                        $detil_produksi->jenis_rumput_laut   = $id_rumput_laut;
                        $detil_produksi->volume              = $request->input('detil_produksi.volume.' . $id_musim . '.' . $id_kondisi . '.' . $id_rumput_laut, null);
                        $detil_produksi->harga_satuan        = $request->input('detil_produksi.harga_satuan.' . $id_musim . '.' . $id_kondisi . '.' . $id_rumput_laut, null);
                        $detil_produksi->save();
                    }

                }
            }

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
        $rumput_laut = BudidayaRumputLaut::where('id_responden', $request->session()->get('id_responden'))->first();
        
        $selected_rumput_laut = [];
        if ($rumput_laut['jenis_rumput_laut'] != '')
        {
            foreach (explode(",", $rumput_laut['jenis_rumput_laut']) as $key => $value) {
                $selected_rumput_laut[] = $value;
            }
        }


        // Data lokasi budidaya
        $lokasi_rumput_laut = [];
        foreach (LokasiRumputLaut::where('id_responden', $id)->get() as $idx => $item) {
            $lokasi_rumput_laut[$item->lokasi] = 
            [
                'id_lokasi_rumput_laut' => $item->id_lokasi_rumput_laut,
                'lokasi'                => $item->lokasi,
                'panjang_bentang'       => $item->panjang_bentang,
                'jarak_antar_bentang'   => $item->jarak_antar_bentang,
                'jumlah_bentang'        => $item->jumlah_bentang,
            ];
        }
        // print_r($lokasi_rumput_laut);
        // die();

        // data biaya investasi
        $dt_biaya_invest = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $idx => $item) {
            $dt_biaya_invest[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya operasional
        $dt_biaya_ops = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.OPERASIONAL'))->get() as $idx => $item) {
            $dt_biaya_ops[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya tetap
        $dt_biaya_tetap = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $idx => $item) {
            $dt_biaya_tetap[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya produksi
        $dt_produksi_rumput_laut = [];
        foreach (ProduksiRumputLaut::where('id_responden', $id)->get() as $idx => $item) {
            $dt_produksi_rumput_laut[$item->jenis_musim] = 
            [
                'id_produksi_rumput_laut' => $item->id_produksi_rumput_laut,
                'awal_bulan'              => $item->awal_bulan,
                'akhir_bulan'             => $item->akhir_bulan,
                'total_panen'             => $item->total_panen,
            ];
        }

        // data detil produksi
        $dt_detil_produksi = [];
        foreach (DetilProduksi::where('id_responden', $id)->get() as $idx => $item) {
            $dt_detil_produksi[$item->jenis_musim][$item->kondisi_rumput_laut][$item->jenis_rumput_laut] = 
            [
                'id_detil_produksi' => $item->id_detil_produksi,
                'volume'            => $item->volume,
                'harga_satuan'      => $item->harga_satuan,
            ];
        }

        return view('budidaya_rumput_laut.edit', [
            'subtitle'            => 'Budidaya Rumput Laut',
            'action'              => 'budidaya-rumput-laut/edit/' . $id,
            'status_usaha'        => $this->status_usaha,
            'lokasi_budidaya'     => $this->lokasi_budidaya,
            'jenis_rumput_laut'   => $this->jenis_rumput_laut,
            'kondisi_rumput_laut' => $this->kondisi_rumput_laut,
            'ukuran_lokasi'       => $this->ukuran_lokasi,
            'status_kepemilikan'  => $this->status_kepemilikan,
            'jenis_musim'         => $this->jenis_musim,
            'bulan'               => $this->bulan,
            'master_biaya_invest' => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_ops'    => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.OPERASIONAL'))->get(),
            'master_biaya_tetap'  => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),

            // Data
            'dt_rumput_laut'          => $rumput_laut,
            'selected_rumput_laut'    => $selected_rumput_laut,
            'dt_lokasi_rumput_laut'   => $lokasi_rumput_laut,
            'dt_biaya_invest'         => $dt_biaya_invest,
            'dt_biaya_ops'            => $dt_biaya_ops,
            'dt_biaya_tetap'          => $dt_biaya_tetap,
            'dt_produksi_rumput_laut' => $dt_produksi_rumput_laut,
            'dt_detil_produksi'       => $dt_detil_produksi,
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
        $jenis_rumput_laut = '';
        // check if input is not null
        if ($request->input('jenis_rumput_laut')){
            foreach ($request->input('jenis_rumput_laut') as $key => $value) 
            {
                $jenis_rumput_laut .= ($key)? ',' . $value: $value;
            }
        }

        $budidaya_rumput_laut                          = BudidayaRumputLaut::where('id_responden', $id)->first();
        $budidaya_rumput_laut->lama_usaha              = $request->input('lama_usaha', null);
        $budidaya_rumput_laut->status_usaha            = $request->input('status_usaha', null);
        $budidaya_rumput_laut->pekerjaan_sebelumnya    = $request->input('pekerjaan_sebelumnya', null);
        $budidaya_rumput_laut->pendapatan_bersih       = $request->input('pendapatan_bersih', null);
        $budidaya_rumput_laut->is_ukuran_sama          = $request->input('is_ukuran_sama', null);
        $budidaya_rumput_laut->jumlah_lokasi           = $request->input('jumlah_lokasi', null);
        $budidaya_rumput_laut->status_kepemilikan      = $request->input('status_kepemilikan', null);
        $budidaya_rumput_laut->status_kepemilikan_lain = $request->input('status_kepemilikan_lain', null);
        $budidaya_rumput_laut->jenis_rumput_laut       = $jenis_rumput_laut;
        $budidaya_rumput_laut->jumlah_panen            = $request->input('jumlah_panen', null);

        $budidaya_rumput_laut->save();

        // save lokasi budidaya
        foreach ($request->input('panjang_bentang') as $id_lokasi_rumput_laut => $item) {
            $lokasi_rumput_laut                      = LokasiRumputLaut::find($id_lokasi_rumput_laut);
            $lokasi_rumput_laut->panjang_bentang     = $request->input('panjang_bentang.' . $id_lokasi_rumput_laut, null);
            $lokasi_rumput_laut->jarak_antar_bentang = $request->input('jarak_antar_bentang.' . $id_lokasi_rumput_laut, null);
            $lokasi_rumput_laut->jumlah_bentang      = $request->input('jumlah_bentang.' . $id_lokasi_rumput_laut, null);
            $lokasi_rumput_laut->save();
        }

        // save biaya investasi
        foreach ($request->input('volume') as $id_biaya => $value) {
            $biaya               = Biaya::find($id_biaya);
            $biaya->volume       = $request->input('volume.' . $id_biaya, null);
            $biaya->harga_satuan = $request->input('harga_satuan.' . $id_biaya, null);
            $biaya->total        = $request->input('total.' . $id_biaya, null);
            
            $biaya->save();
        }

        // save Produksi Rumput Laut
        foreach ($request->input('produksi_rumput_laut.awal_bulan') as $id_produksi_rumput_laut => $value) {
            $produksi_rumput_laut              = ProduksiRumputLaut::find($id_produksi_rumput_laut);
            $produksi_rumput_laut->awal_bulan  = $request->input('produksi_rumput_laut.awal_bulan.' . $id_produksi_rumput_laut, null);
            $produksi_rumput_laut->akhir_bulan = $request->input('produksi_rumput_laut.akhir_bulan.' . $id_produksi_rumput_laut, null);
            $produksi_rumput_laut->total_panen = $request->input('produksi_rumput_laut.total_panen.' . $id_produksi_rumput_laut, null);
            $produksi_rumput_laut->save();
        }

        // save detil produksi
        foreach ($request->input('detil_produksi.volume') as $id_detil_produksi => $value) 
        {
            $detil_produksi               = DetilProduksi::find($id_detil_produksi);
            $detil_produksi->volume       = $request->input('detil_produksi.volume.' . $id_detil_produksi, null);
            $detil_produksi->harga_satuan = $request->input('detil_produksi.harga_satuan.' . $id_detil_produksi, null);
            $detil_produksi->save();
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
        BudidayaRumputLaut::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->delete();
        LokasiRumputLaut::where('id_responden', $id)->delete();
        ProduksiRumputLaut::where('id_responden', $id)->delete();
        DetilProduksi::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
