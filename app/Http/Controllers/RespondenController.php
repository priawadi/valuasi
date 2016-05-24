<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Responden;
use App\BudidayaKeramba;
use App\Tambak;
use App\ExistenceValue;
use App\MasterKayu;
use App\KayuNon;
use App\PencariSatwa;
use App\Nelayan;
use App\MotivasiResponden;
use App\BudidayaRumputLaut;
use App\HasilPanen;
use App\Biaya;
use App\KayuProd;
use App\KayuOps;
use App\HasilSatwa;
use App\BiayaSatwa;
use App\OpsSatwa;
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
use App\BiayaPerjalanan;
use App\PersepsiResponden;
use App\BiayaWisata;
use App\LokasiRumputLaut;
use App\ProduksiRumputLaut;
use App\DetilProduksi;
use Carbon\Carbon;
use Excel;

class RespondenController extends Controller
{

        var $jenis_kelamin = [
            1 => 'Laki-Laki',
            2 => 'Perempuan',
        ];

        var $pendidikan = [
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

        var $status_kawin = [
            1  => 'Belum Menikah',
            2  => 'Menikah',
            3  => 'Duda',
            4  => 'Janda',
        ];

        var $status_keluarga = [
            1 => 'Suami',
            2 => 'Istri',
            3 => 'Anak',
            4 => 'Sepupu',
            5 => 'Keponakan',
            6 => 'Mertua',
        ];

        var $jenis_pendapatan = [
            1 => 'kurang dari Rp. 10.000.000,-',
            2 => 'Rp. 10.000.000,- hingga Rp. Rp. 20.000.000,-',
            3 => 'Rp. 20.000.000,- hingga Rp. Rp. 30.000.000,-',
            4 => 'Rp. 30.000.000,- hingga Rp. Rp. 40.000.000,-',
            5 => 'lebih dari Rp. 40.000.000,-',
        ];

        var $pekerjaan = [
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Remove current session
        $request->session()->forget('id_responden');

        return view('responden.index', [
            'responden'  => Responden::orderBy('id_responden', 'DESC')->get(),
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('responden.form', [
            'action'           => 'responden/tambah',
            'jenis_kelamin'    => $this->jenis_kelamin,
            'pendidikan'       => $this->pendidikan,
            'status_kawin'     => $this->status_kawin,
            'status_keluarga'  => $this->status_keluarga,
            'jenis_pendapatan' => $this->jenis_pendapatan,
            'pekerjaan'        => $this->pekerjaan,
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
        $responden                      = new Responden;
        $responden->nama                = $request->input('nama', null);
        $responden->telepon             = $request->input('telepon', null);
        $responden->alamat              = $request->input('alamat', null);
        $responden->umur                = $request->input('umur', null);
        $responden->jenis_kelamin       = $request->input('jenis_kelamin', null);
        $responden->pendidikan          = $request->input('pendidikan', null);
        $responden->lama_pendidikan     = $request->input('lama_pendidikan', null);
        $responden->stat_kawin          = $request->input('stat_kawin', null);
        $responden->jum_ang_kel_total   = $request->input('jum_ang_kel_total', null);
        $responden->jum_ang_kel_anak    = $request->input('jum_ang_kel_anak', null);
        $responden->jum_ang_kel_dewasa  = $request->input('jum_ang_kel_dewasa', null);
        $responden->stat_keluarga       = $request->input('stat_keluarga', null);
        $responden->pendapatan          = $request->input('pendapatan', null);
        $responden->pekerjaan_utama     = $request->input('pekerjaan_utama', null);
        $responden->pekerjaan_sampingan = $request->input('pekerjaan_sampingan', null);
        $responden->nama_pencacah       = $request->input('nama_pencacah', null);
        $responden->tanggal_input       = Carbon::createFromFormat('Y-m-d', $request->input('tanggal_input', null)); 


        $responden->save();

        return redirect('responden');
    }

    /**`
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
        return view('responden.edit', [
            'action'           => 'responden/edit/' . $id,
            'jenis_kelamin'    => $this->jenis_kelamin,
            'pendidikan'       => $this->pendidikan,
            'status_kawin'     => $this->status_kawin,
            'status_keluarga'  => $this->status_keluarga,
            'jenis_pendapatan' => $this->jenis_pendapatan,
            'pekerjaan'        => $this->pekerjaan,
            'responden'        => Responden::find($id)
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
        $responden                      = Responden::find($id);
        $responden->nama                = $request->input('nama', null);
        $responden->telepon             = $request->input('telepon', null);
        $responden->alamat              = $request->input('alamat', null);
        $responden->umur                = $request->input('umur', null);
        $responden->jenis_kelamin       = $request->input('jenis_kelamin', null);
        $responden->pendidikan          = $request->input('pendidikan', null);
        $responden->lama_pendidikan     = $request->input('lama_pendidikan', null);
        $responden->stat_kawin          = $request->input('stat_kawin', null);
        $responden->jum_ang_kel_total   = $request->input('jum_ang_kel_total', null);
        $responden->jum_ang_kel_anak    = $request->input('jum_ang_kel_anak', null);
        $responden->jum_ang_kel_dewasa  = $request->input('jum_ang_kel_dewasa', null);
        $responden->stat_keluarga       = $request->input('stat_keluarga', null);
        $responden->pendapatan          = $request->input('pendapatan', null);
        $responden->pekerjaan_utama     = $request->input('pekerjaan_utama', null);
        $responden->pekerjaan_sampingan = $request->input('pekerjaan_sampingan', null);
        $responden->nama_pencacah       = $request->input('nama_pencacah', null);
        $responden->tanggal_input       = Carbon::createFromFormat('Y-m-d', $request->input('tanggal_input', null));        

        $responden->save();

        return redirect('responden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /// delete 1. Keramba
        HasilPanen::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->delete();
        BudidayaKeramba::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->delete();

        // delete 2. Tambak
        HasilPanen::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->delete();
        Tambak::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->delete();

        // delete 3. Existence Value
        ExistenceValue::where('id_responden', $id)->delete();

        // delete 4. Kayu
        KayuProd::where('id_responden', $id)->delete();
        KayuOps::where('id_responden', $id)->delete();
        KayuNon::where('id_responden', $id)->delete();

        // delete 5. Pencari Satwa
        PencariSatwa::where('id_responden', $id)->delete();
        HasilSatwa::where('id_responden', $id)->delete();
        BiayaSatwa::where('id_responden', $id)->delete();
        OpsSatwa::where('id_responden', $id)->delete();

        // delete 6. Nelayan
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

        // delete 7. Wisata
        MotivasiResponden::where('id_responden', $id)->delete();
        BiayaPerjalanan::where('id_responden', $id)->delete();
        PersepsiResponden::where('id_responden', $id)->delete();
        BiayaWisata::where('id_responden', $id)->delete();

        // delete 8. Rumput Laut
        BudidayaRumputLaut::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.RUMPUT_LAUT'))->delete();
        LokasiRumputLaut::where('id_responden', $id)->delete();
        ProduksiRumputLaut::where('id_responden', $id)->delete();
        DetilProduksi::where('id_responden', $id)->delete();

        // delete Responden
        Responden::find($id)->delete();

        return redirect('responden');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id_responden)
    {
        if (!Responden::where('id_responden', $id_responden)->count())
        {
            return redirect('responden');
        }

        // Save id responden in session
        $request->session()->put('id_responden', $id_responden);

        $kuesioner = [];

        // EOP Pembudidaya Ikan
        $kuesioner['vanelkanas'] = [
            [
                'no'        => 'A',
                'kuesioner' => 'PEMBUDIDAYA IKAN',
                'is_done'   => (BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'budidaya-keramba/info',
            ],
            [
                'no'        => 'B',
                'kuesioner' => 'PETAMBAK',
                'is_done'   => (Tambak::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'tambak',
            ],
            [
                'no'        => 'C',
                'kuesioner' => 'EXISTENCE VALUE)',
                'is_done'   => (ExistenceValue::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'eval',
            ],
            [
                'no'        => 'D',
                'kuesioner' => 'VALUASI PEMANFAAT KAYU',
                'is_done'   => (KayuNon::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'kayu',
            ],
            [
                'no'        => 'E',
                'kuesioner' => 'VALUASI PENCARI SATWA',
                'is_done'   => (PencariSatwa::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'satwa',
            ],
            [
                'no'        => 'F',
                'kuesioner' => 'VALUASI TERUMBU KARANG',
                'is_done'   => (Nelayan::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'nelayan',
            ],
            [
                'no'        => 'G',
                'kuesioner' => 'VALUASI WISATA',
                'is_done'   => (MotivasiResponden::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'wisata',
            ],
            [
                'no'        => 'H',
                'kuesioner' => 'BUDIDAYA RUMPUT LAUT',
                'is_done'   => (BudidayaRumputLaut::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'budidaya-rumput-laut',
            ],
        ];
        
        
        return view('responden.detail', [
            'responden'  => Responden::find($id_responden),
            'kuesioner'  => $kuesioner,
        ]);
    }

    public function export(Request $request)
    {
        // Excel::create('Filename', function($excel) {

        //     // Our first sheet
        //     $excel->sheet('First sheet', function($sheet) {
        //         $sheet->fromArray(
        //             [
        //                 ['data1', 'data2'],
        //                 ['data3', 'data4']
        //             ]
        //         );
        //     });

        //     // Our second sheet
        //     $excel->sheet('Second sheet', function($sheet) {

        //     });

        // })->export('xls');
        // 
        $kuesioner = [];

        // EOP Pembudidaya Ikan
        $kuesioner['vanelkanas'] = [
            [
                'no'        => 'A',
                'kuesioner' => 'PEMBUDIDAYA IKAN',
                'link'      => 'keramba',
            ],
            [
                'no'        => 'B',
                'kuesioner' => 'PETAMBAK',
                'link'      => 'tambak',
            ],
            [
                'no'        => 'C',
                'kuesioner' => 'EXISTENCE VALUE)',
                'link'      => 'eval',
            ],
            [
                'no'        => 'D',
                'kuesioner' => 'VALUASI PEMANFAAT KAYU',
                'link'      => 'kayu',
            ],
            [
                'no'        => 'E',
                'kuesioner' => 'VALUASI PENCARI SATWA',
                'link'      => 'satwa',
            ],
            [
                'no'        => 'F',
                'kuesioner' => 'VALUASI TERUMBU KARANG',
                'link'      => 'nelayan',
            ],
            [
                'no'        => 'G',
                'kuesioner' => 'VALUASI WISATA',
                'link'      => 'wisata',
            ],
            [
                'no'        => 'H',
                'kuesioner' => 'BUDIDAYA RUMPUT LAUT',
                'link'      => 'budidaya-rumput-laut',
            ],
        ];
        
        
        return view('responden.export', [
            'kuesioner'  => $kuesioner,
        ]);
    }

    public function export_to_excel(Request $request, $kuesioner)
    {
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
        $columns = array_merge($columns, $this->get_column_keramba());
        
        $data[] = $columns;

        foreach (Responden::all() as $index => $item) {
            $merge_data = [];
            // Responden
            $merge_data = array_merge($merge_data, [
                $item['nama'],
                $item['telepon'],
                $item['alamat'],
                $item['umur'],
                $this->jenis_kelamin[$item['jenis_kelamin']],
                $this->pendidikan[$item['pendidikan']],
                $item['lama_pendidikan'],
                $this->status_kawin[$item['stat_kawin']],
                $item['jum_ang_kel_total'],
                $item['jum_ang_kel_anak'],
                $item['jum_ang_kel_dewasa'],
                $this->status_keluarga[$item['stat_keluarga']],
                $this->jenis_pendapatan[$item['pendapatan']],
                $this->pekerjaan[$item['pekerjaan_utama']],
                $this->pekerjaan[$item['pekerjaan_sampingan']],
            ]);
            $merge_data = array_merge($merge_data, $this->get_keramba($item->id_responden));
            $data[] = $merge_data;
        }

        // print_r($data);
        Excel::create($kuesioner, function($excel) use($data){
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

    public function get_keramba($id_responden)
    {
        $status_usaha = [
            1 => 'Pemilik',
            2 => 'Penggarap',
            3 => 'Penyewa',
        ]; 

        $jenis_komoditas = [
            1 => 'Kerapu Macam',
            2 => 'Kerapu Bebek/Kerapu Tikus',
            3 => 'Kerapu Sunu',
            4 => 'Kerapu Lodi',
            5 => 'Kerapu Sunu',
            6 => 'Kerapu Lobster Pasir',
            7 => 'Lobster Mutiara',
            8 => 'Udang',
        ];
        $budidaya_keramba = BudidayaKeramba::where('id_responden', $id_responden)->first();
        $jenis_komunitas = explode(',', $budidaya_keramba->jenis_komoditas);
        $keramba = [
            $budidaya_keramba->lama_usaha,
            $status_usaha[$budidaya_keramba->status_usaha],
            $budidaya_keramba->mapen_sblm_keramba,
            $budidaya_keramba->luas_lahan,
            $budidaya_keramba->keramba_total,
            $budidaya_keramba->keramba_aktif,
            $budidaya_keramba->keramba_tidak_aktif,
            in_array('1', $jenis_komunitas)? 'Ya': 'Tidak',
            in_array('2', $jenis_komunitas)? 'Ya': 'Tidak',
            in_array('3', $jenis_komunitas)? 'Ya': 'Tidak',
            in_array('4', $jenis_komunitas)? 'Ya': 'Tidak',
            in_array('5', $jenis_komunitas)? 'Ya': 'Tidak',
            in_array('6', $jenis_komunitas)? 'Ya': 'Tidak',
            in_array('7', $jenis_komunitas)? 'Ya': 'Tidak',
            $budidaya_keramba->waktu_pemeliharaan,
            $budidaya_keramba->jum_siklus_panen,
        ];


        return $keramba;
    }

    public function get_column_keramba()
    {
        return 
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
    }
}