<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterBiaya;
use App\Nelayan;
use App\Perahu;
use App\MesinPenggerak;
use App\AlatTangkap;
use App\TenagaKerja;
use App\AlatBantuTangkap;
use App\DaerahOperasional;
use App\MusimTangkap;
use App\HasilTangkap;
use App\BiayaPerawatan;
use App\Penangkapan;
use App\OpsNelayan;

class NelayanController extends Controller
{

    var $status_nelayan = [ 0 => 'Tidak', 1 => 'Ya'];
    var $jenis_alat_tangkap = [ 
        1 => 'Alat Tangkap Utama', 
        2 => 'Alat Tangkap Alternatif 1',
        3 => 'Alat Tangkap Alternatif 2',
    ];
    var $jenis_mesin_penggerak = [ 
        1 => 'Perahu tanpa motor', 
        2 => 'Motor tempel',
        3 => 'On board',
    ];
    var $jenis_alat_bantu_tangkap = [ 
        1 => 'Generator', 
        2 => 'Accu',
        3 => 'Lampu',
        4 => 'Peralatan memasak',
        5 => 'Mesin penarik jaring',
        6 => 'GPS',
        7 => 'Fish Finder',
        8 => 'Peralatan komunikasi/HT',
        9 => 'Rumpon',
    ];

    var $jenis_tenaga_kerja = [ 
        1 => 'Pemilik', 
        2 => 'Nahkoda kapal',
        3 => 'Juru mesin',
        4 => 'Juru mudi',
        5 => 'Juru masak',
        6 => 'ABK (pekerja)',
    ];

    var $status_kepemilikan = [ 
        1 => 'Milik sendiri', 
        2 => 'Kelompok nelayan',
        3 => 'Juragan',
        4 => 'Perusahaan',
    ];

    var $status_kedudukan = [ 
        1 => 'Pemilik', 
        2 => 'Nahkoda',
        3 => 'ABK',
        4 => 'Lainnya',
    ];

    var $zona_ops = [ 
        1 => 'Zona Inti', 
        2 => 'Zona Pemanfaatan',
        3 => 'Zona Perikanan Berkelanjutan',
        4 => 'Zona Lainnya',
    ];

    var $bulan = [ 
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

    var $jenis_ikan = [ 
        1  => 'Kerapu', 
        2  => 'Cumi-Cumi/Sotong',
        3  => 'Baronang',
        4  => 'Ekor Kuning',
        5  => 'Kuwe',
        6  => 'Kakap',
        7  => 'Katamba/Lencam',
        8  => 'Biji Nangka',
        9  => 'Baracuda/Kacang-Kacang',
        10 => 'Kakaktua',
        11 => 'Lain-lain',
    ];

    var $penanganan_ikan = [ 
        1  => 'Menggunakan palkah dan es', 
        2  => 'Menggunakan palkah tanpa es',
        3  => 'Dibiarkan diatas dek',
        4  => 'Lainnya',
    ];

    var $master_biaya_perawatan = [ 
        1  => 'Kapal/Perahu', 
        2  => 'Mesin Kapal',
        3  => 'Alat Tangkap',
        4  => 'Lainnya',
    ];

    var $musim = [ 
        1  => 'Musim Puncak', 
        2  => 'Musim Sedang',
        3  => 'Musim Paceklik',
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
    public function create()
    {

        return view('nelayan.form', [
            'subtitle'                 => 'Nelayan',
            'action'                   => 'nelayan/tambah',
            'status_nelayan'           => $this->status_nelayan,
            'jenis_alat_tangkap'       => $this->jenis_alat_tangkap,
            'jenis_mesin_penggerak'    => $this->jenis_mesin_penggerak,
            'jenis_alat_bantu_tangkap' => $this->jenis_alat_bantu_tangkap,
            'jenis_tenaga_kerja'       => $this->jenis_tenaga_kerja,
            'status_kepemilikan'       => $this->status_kepemilikan,
            'status_kedudukan'         => $this->status_kedudukan,
            'jenis_ikan'               => $this->jenis_ikan,
            'zona_ops'                 => $this->zona_ops,
            'penanganan_ikan'          => $this->penanganan_ikan,
            'bulan'                    => $this->bulan,
            'musim'                    => $this->musim,
            'master_biaya_perawatan'   => $this->master_biaya_perawatan,
            'master_biaya_ops'         => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.NELAYAN'))->where('kateg_biaya', \Config::get('constants.BIAYA.OPERASIONAL'))->get(),
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
        // Data nelayan
        $nelayan                        = new Nelayan;
        $nelayan->id_responden          = $request->session()->get('id_responden');
        $nelayan->is_nelayan            = $request->input('is_nelayan', null);
        $nelayan->lama_usaha            = $request->input('lama_usaha', null);
        $nelayan->status_kepemilikan    = $request->input('status_kepemilikan', null);
        $nelayan->status_kedudukan      = $request->input('status_kedudukan', null);
        $nelayan->status_kedudukan_lain = $request->input('status_kedudukan_lain', null);
        $nelayan->save();

        // Perahu
        $perahu               = new Perahu;
        $perahu->id_responden = $request->session()->get('id_responden');
        $perahu->panjang      = $request->input('perahu.panjang', null);
        $perahu->lebar        = $request->input('perahu.lebar', null);
        $perahu->tinggi       = $request->input('perahu.tinggi', null);
        $perahu->tonase       = $request->input('perahu.tonase', null);
        $perahu->jumlah       = $request->input('perahu.jumlah', null);
        $perahu->harga_beli   = $request->input('perahu.harga_beli', null);
        $perahu->umur_teknis  = $request->input('perahu.umur_teknis', null);
        $perahu->save();

        // Data Alat Tangkap
        foreach ($this->jenis_alat_tangkap as $id_alat_tangkap => $value) {
            $alat_tangkap                    = new AlatTangkap;
            $alat_tangkap->id_responden       = $request->session()->get('id_responden');
            $alat_tangkap->jenis_alat_tangkap = $id_alat_tangkap;
            $alat_tangkap->nama               = $request->input('alat_tangkap.' . $id_alat_tangkap . '.nama', null);
            $alat_tangkap->panjang            = $request->input('alat_tangkap.' . $id_alat_tangkap . '.panjang', null);
            $alat_tangkap->lebar              = $request->input('alat_tangkap.' . $id_alat_tangkap . '.lebar', null);
            $alat_tangkap->tinggi             = $request->input('alat_tangkap.' . $id_alat_tangkap . '.tinggi', null);
            $alat_tangkap->jumlah             = $request->input('alat_tangkap.' . $id_alat_tangkap . '.jumlah', null);
            $alat_tangkap->satuan_jumlah      = $request->input('alat_tangkap.' . $id_alat_tangkap . '.satuan_jumlah', null);
            $alat_tangkap->harga_beli         = $request->input('alat_tangkap.' . $id_alat_tangkap . '.harga_beli', null);
            $alat_tangkap->satuan_harga_beli  = $request->input('alat_tangkap.' . $id_alat_tangkap . '.satuan_harga_beli', null);
            $alat_tangkap->umur_teknis        = $request->input('alat_tangkap.' . $id_alat_tangkap . '.umur_teknis', null);
            $alat_tangkap->save();
        }

        // Data Mesin Penggerak
        $mesin_penggerak               = new MesinPenggerak;
        $mesin_penggerak->id_responden = $request->session()->get('id_responden');
        $mesin_penggerak->jenis        = $request->input('mesin_penggerak.jenis', null);
        if ($request->input('mesin_penggerak.jenis', null) == 2 || $request->input('mesin_penggerak.jenis', null) == 3)
        {
            $mesin_penggerak->merk         = $request->input('mesin_penggerak.' . $request->input('mesin_penggerak.jenis', null) . '.merk', null);
            $mesin_penggerak->kekuatan     = $request->input('mesin_penggerak.' . $request->input('mesin_penggerak.jenis', null) . '.kekuatan', null);
            $mesin_penggerak->jumlah       = $request->input('mesin_penggerak.' . $request->input('mesin_penggerak.jenis', null) . '.jumlah', null);
            $mesin_penggerak->harga_beli   = $request->input('mesin_penggerak.' . $request->input('mesin_penggerak.jenis', null) . '.harga_beli', null);
            $mesin_penggerak->umur_teknis  = $request->input('mesin_penggerak.' . $request->input('mesin_penggerak.jenis', null) . '.umur_teknis', null);
        }
        $mesin_penggerak->save();

        // Data Alat Bantu Tangkap
        foreach ($this->jenis_alat_bantu_tangkap as $id_alat_bantu_tangkap => $value) {
            $alat_bantu_tangkap                     = new AlatBantuTangkap;
            $alat_bantu_tangkap->id_responden       = $request->session()->get('id_responden');
            $alat_bantu_tangkap->jenis_alat_bantu   = $id_alat_bantu_tangkap;
            $alat_bantu_tangkap->spesifikasi_ukuran = $request->input('alat_bantu_tangkap.' . $id_alat_bantu_tangkap . '.spesifikasi_ukuran', null);
            $alat_bantu_tangkap->jumlah             = $request->input('alat_bantu_tangkap.' . $id_alat_bantu_tangkap . '.jumlah', null);
            $alat_bantu_tangkap->satuan_jumlah      = $request->input('alat_bantu_tangkap.' . $id_alat_bantu_tangkap . '.satuan_jumlah', null);
            $alat_bantu_tangkap->harga_beli         = $request->input('alat_bantu_tangkap.' . $id_alat_bantu_tangkap . '.harga_beli', null);
            $alat_bantu_tangkap->umur_teknis        = $request->input('alat_bantu_tangkap.' . $id_alat_bantu_tangkap . '.umur_teknis', null);
            $alat_bantu_tangkap->save();
        }

        // Data Tenaga Kerja
        foreach ($this->jenis_tenaga_kerja as $id_tenaga_kerja => $value) {
            $tenaga_kerja                     = new TenagaKerja;
            $tenaga_kerja->id_responden       = $request->session()->get('id_responden');
            $tenaga_kerja->jenis_tenaga_kerja = $id_tenaga_kerja;
            $tenaga_kerja->jumlah             = $request->input('tenaga_kerja.' . $id_tenaga_kerja . '.jumlah', null);
            $tenaga_kerja->save(); 
        }


        // Data Daerah Operasional
        foreach ($request->input('daerah_operasional.lokasi') as $index => $value) {
            $daerah_operasional                  = new DaerahOperasional;
            $daerah_operasional->id_responden    = $request->session()->get('id_responden');
            $daerah_operasional->lokasi          = $request->input('daerah_operasional.lokasi.' . $index, null);
            $daerah_operasional->jarak_dr_pantai = $request->input('daerah_operasional.jarak_dr_pantai.' . $index, null);
            $daerah_operasional->waktu_tempuh    = $request->input('daerah_operasional.waktu_tempuh.' . $index, null);
            $daerah_operasional->zona            = $request->input('daerah_operasional.zona.' . $index, null);
            $daerah_operasional->bulan           = $request->input('daerah_operasional.bulan.' . $index, null);
            $daerah_operasional->save(); 
        }

        // Data Penangkapan
        $bulan = '';
        // check if input is not null
        if ($request->input('penangkapan.bulan_tdk_tangkap')){
            foreach ($request->input('penangkapan.bulan_tdk_tangkap') as $key => $value) 
            {
                $bulan .= ($key)? ',' . $value: $value;
            }
        }
        $penangkapan                           = new Penangkapan;
        $penangkapan->id_responden             = $request->session()->get('id_responden');
        $penangkapan->jumlah_hari              = $request->input('penangkapan.jumlah_hari', null);
        $penangkapan->rata_jumlah              = $request->input('penangkapan.rata_jumlah', null);
        $penangkapan->jumlah_bulan_tdk_tangkap = $request->input('penangkapan.jumlah_bulan_tdk_tangkap', null);
        $penangkapan->bulan_tdk_tangkap        = $bulan;
        $penangkapan->penanganan_ikan          = $request->input('penangkapan.penanganan_ikan', null);
        $penangkapan->penanganan_ikan_lain     = $request->input('penangkapan.penanganan_ikan_lain', null);
        $penangkapan->bagi_hasil_pemilik       = $request->input('penangkapan.bagi_hasil_pemilik', null);
        $penangkapan->bagi_hasil_awak          = $request->input('penangkapan.bagi_hasil_awak', null);
        $penangkapan->save();

        // Data Musim Tangkap
        foreach ($this->jenis_ikan as $id_ikan => $ikan) {
            $musim_tangkap               = new MusimTangkap;
            $musim_tangkap->id_responden = $request->session()->get('id_responden');
            $musim_tangkap->jenis_ikan   = $id_ikan;
            $musim_tangkap->bulan1       = $request->input('musim_tangkap.' . $id_ikan . '.bulan1', null);
            $musim_tangkap->bulan2       = $request->input('musim_tangkap.' . $id_ikan . '.bulan2', null);
            $musim_tangkap->bulan3       = $request->input('musim_tangkap.' . $id_ikan . '.bulan3', null);
            $musim_tangkap->bulan4       = $request->input('musim_tangkap.' . $id_ikan . '.bulan4', null);
            $musim_tangkap->bulan5       = $request->input('musim_tangkap.' . $id_ikan . '.bulan5', null);
            $musim_tangkap->bulan6       = $request->input('musim_tangkap.' . $id_ikan . '.bulan6', null);
            $musim_tangkap->bulan7       = $request->input('musim_tangkap.' . $id_ikan . '.bulan7', null);
            $musim_tangkap->bulan8       = $request->input('musim_tangkap.' . $id_ikan . '.bulan8', null);
            $musim_tangkap->bulan9       = $request->input('musim_tangkap.' . $id_ikan . '.bulan9', null);
            $musim_tangkap->bulan10      = $request->input('musim_tangkap.' . $id_ikan . '.bulan10', null);
            $musim_tangkap->bulan11      = $request->input('musim_tangkap.' . $id_ikan . '.bulan11', null);
            $musim_tangkap->bulan12      = $request->input('musim_tangkap.' . $id_ikan . '.bulan12', null);
            $musim_tangkap->save();
        }

        // Data Hasil Tangkap
        foreach ($this->jenis_ikan as $id_ikan => $ikan) {
            $hasil_tangkap                          = new HasilTangkap;
            $hasil_tangkap->id_responden            = $request->session()->get('id_responden');
            $hasil_tangkap->jenis_ikan              = $id_ikan;
            $hasil_tangkap->produksi_musim_puncak   = $request->input('hasil_tangkap.' . $id_ikan . '.produksi_musim_puncak', null);
            $hasil_tangkap->produksi_musim_sedang   = $request->input('hasil_tangkap.' . $id_ikan . '.produksi_musim_sedang', null);
            $hasil_tangkap->produksi_musim_paceklik = $request->input('hasil_tangkap.' . $id_ikan . '.produksi_musim_paceklik', null);
            $hasil_tangkap->save();
        }

        // Data Hasil Tangkap
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.NELAYAN'))->where('kateg_biaya', \Config::get('constants.BIAYA.OPERASIONAL'))->get() as $index => $value) {
            $ops_nelayan                  = new OpsNelayan;
            $ops_nelayan->id_responden    = $request->session()->get('id_responden');
            $ops_nelayan->id_master_biaya = $value->id_master_biaya;
            $ops_nelayan->jumlah          = $request->input('biaya_ops.jumlah.' . $value->id_master_biaya, null);
            $ops_nelayan->harga_satuan    = $request->input('biaya_ops.harga_satuan.' . $value->id_master_biaya, null);
            $ops_nelayan->total_biaya     = $request->input('biaya_ops.total_biaya.' . $value->id_master_biaya, null);
            $ops_nelayan->save();
        }

         // Data Biaya Perawatan
        foreach ($this->master_biaya_perawatan as $id_biaya_perawatan => $value) {
            $biaya_perawatan                        = new BiayaPerawatan;
            $biaya_perawatan->id_responden          = $request->session()->get('id_responden'); 
            $biaya_perawatan->jenis_biaya_perawatan = $id_biaya_perawatan;
            $biaya_perawatan->biaya                 = $request->input('biaya_perawatan.' . $id_biaya_perawatan, null);
            $biaya_perawatan->save();
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.NELAYAN'))->delete();
        Nelayan::where('id_responden', $id)->delete();
        Perahu::where('id_responden', $id)->delete();
        MesinPenggerak::where('id_responden', $id)->delete();
        AlatTangkap::where('id_responden', $id)->delete();
        TenagaKerja::where('id_responden', $id)->delete();
        AlatBantuTangkap::where('id_responden', $id)->delete();
        DaerahOperasional::where('id_responden', $id)->delete();
        MusimTangkap::where('id_responden', $id)->delete();
        HasilTangkap::where('id_responden', $id)->delete();
        BiayaPerawatan::where('id_responden', $id)->delete();
        Penangkapan::where('id_responden', $id)->delete();
        OpsNelayan::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
