<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Responden;

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
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id_responden)
    {
        // Save id responden in session
        $request->session()->put('id_responden', $id_responden);
        $kuesioner = [];

        $kuesioner['aspek_modal_sosial'] = [
            [
                'kuesioner' => 'Partisipasi Sosial',
                'is_done'   => (JwbPartisipasi::where('id_responden', $request->session()->get('id_responden'))->where('kateg_partisipasi', 1)->count()),
                'link'      => 'partisipasi-sosial',
            ],
            [
                'kuesioner' => 'Partisipasi Organisasi',
                'is_done'   => (JwbPartisipasi::where('id_responden', $request->session()->get('id_responden'))->where('kateg_partisipasi', 2)->count()),
                'link'      => 'partisipasi-organisasi',
            ],
            [
                'kuesioner' => 'Partisipasi Politik',
                'is_done'   => (JwbPartisipasi::where('id_responden', $request->session()->get('id_responden'))->where('kateg_partisipasi', 3)->count()),
                'link'      => 'partisipasi-politik',
            ],
            [
                'kuesioner' => 'Rasa Percaya Antar Masyarakat',
                'is_done'   => (JwbRasaPercaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_rasa_percaya', 1)->count()),
                'link'      => 'rasa-percaya-masyarakat',
            ],
            [
                'kuesioner' => 'Rasa Percaya terhadap Organisasi Sosial',
                'is_done'   => (JwbRasaPercaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_rasa_percaya', 2)->count()),
                'link'      => 'rasa-percaya-organisasi',
            ],
            [
                'kuesioner' => 'Rasa Percaya Politik',
                'is_done'   => (JwbRasaPercaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_rasa_percaya', 3)->count()),
                'link'      => 'rasa-percaya-politik',
            ],
            [
                'kuesioner' => 'Nilai dan Norma',
                'is_done'   => (JwbNilaiNorma::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'nilai-norma',
            ]
        ];
        $kuesioner['karakteristik_rt'] = [
            [
                'kuesioner' => 'Karakteristik Anggota Rumah Tangga dan Pendapatan',
                'is_done'   => (KarakteristikRumahTangga::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'karakteristik-rumah-tangga',
            ],
            [
                'kuesioner' => 'Jenis Pekerjaan Rumah Tangga',
                'is_done'   => (JenisPekerjaanRumahTg::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'jenis-pekerjaan-rumah-tangga',
            ],
            [
                'kuesioner' => 'Aset Rumah Tangga',
                'is_done'   => (AsetRumahTangga::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'aset-rumah-tangga',
            ],
            [
                'kuesioner' => 'Kesehatan',
                'is_done'   => (Kesehatan::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'kesehatan',
            ],
        ];

        $kuesioner['konsumsi'] = [
            [
                'kuesioner' => 'Pengeluaran Pangan Mingguan Rumah Tangga Perikanan',
                'is_done'   => (JawabanKonsumsi::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'konsumsi',
            ],
            [
                'kuesioner' => 'Pengeluaran Non Pangan Bulanan Rumah Tangga',
                'is_done'   => (JawabanKonsumsi::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'konsumsi',
            ],
            [
                'kuesioner' => 'Pengeluaran Non Pangan Tahunan Rumah Tangga Perikanan',
                'is_done'   => (JawabanKonsumsi::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'konsumsi',
            ],
        ];

        $kuesioner['usaha_tenaga_kerja'] = [
            [
                'kuesioner' => 'Perahu',
                'is_done'   => (Perahu::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'perahu',
            ],
            [
                'kuesioner' => 'Tenaga Penggerak / Mesin',
                'is_done'   => (Mesin::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'tenaga-penggerak',
            ],
            [
                'kuesioner' => 'Alat Tangkap',
                'is_done'   => (AlatTangkap::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'alat-tangkap',
            ],
            [
                'kuesioner' => 'Aset Pendukung Usaha',
                'is_done'   => (AsetPendukungUsaha::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'aset-pendukung-usaha',
            ],
            [
                'kuesioner' => 'Biaya Perizinan dan Pemeliharaan Selama 1 Tahun',
                'is_done'   => (BiayaPerijinan::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'biaya-perijinan',
            ],
            [
                'kuesioner' => 'Biaya Variabel Berdasarkan Musim (Biaya Operasional per Trip)',
                'is_done'   => (BiayaOperasional::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'biaya-operasional',
            ],
            [
                'kuesioner' => 'Biaya Variabel Berdasarkan Musim (Biaya Ransum / Perbekalan per Trip)',
                'is_done'   => (BiayaRansum::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'biaya-ransum',
            ],
            [
                'kuesioner' => 'Biaya Jasa',
                'is_done'   => (BiayaJasa::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'biaya-jasa',
            ],
            [
                'kuesioner' => 'Penerimaan Usaha Berdasarkan Musim',
                'is_done'   => (HasilTangkapan::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'hasil-tangkapan-ikan',
            ],
            [
                'kuesioner' => 'Ketenagakerjaan',
                'is_done'   => (Ketenagakerjaan::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'ketenagakerjaan',
            ],
        ];
        return view('responden.detail', [
            'responden'  => Responden::find($id_responden),
            'kuesioner'  => $kuesioner,
            'enumerator' => Enumerator::where('id_responden', $request->session()->get('id_responden'))->get(),
        ]);
    }
}
