<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
            'penanganan_ikan'          => $this->penanganan_ikan,
            'master_biaya_perawatan'   => $this->master_biaya_perawatan,
            // 'jenis_komoditas'     => $this->jenis_komoditas,
            // 'master_biaya_invest' => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            // 'master_biaya_var'    => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            // 'master_biaya_tetap'  => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            // 'komoditas'           => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get()
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
        //
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
        //
    }
}
