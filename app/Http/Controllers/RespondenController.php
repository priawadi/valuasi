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
                'kuesioner' => 'EFFECT ON PRODUCTION (EOP) PEMBUDIDAYA IKAN',
                'is_done'   => (BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'budidaya-keramba/info',
            ],
            [
                'no'        => 'B',
                'kuesioner' => 'EFFECT ON PRODUCTION (EOP) PETAMBAK',
                'is_done'   => (Tambak::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'tambak',
            ],
            [
                'no'        => 'C',
                'kuesioner' => 'NILAI KEBERADAAN (EXISTENCE VALUE)',
                'is_done'   => (ExistenceValue::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'eval',
            ],
            [
                'no'        => 'D',
                'kuesioner' => 'PEMANFAATAN EKOSISTEM MANGROVE (PEMANFAAT KAYU)',
                'is_done'   => (KayuNon::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'kayu',
            ],
            [
                'no'        => 'E',
                'kuesioner' => 'PEMANFAATAN EKOSISTEM MANGROVE (PENCARI SATWA)',
                'is_done'   => (PencariSatwa::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'satwa',
            ],
            [
                'no'        => 'F',
                'kuesioner' => 'PEMANFAATAN SUMBER DAYA PERIKANAN TANGKAP EKOSISTEM TERUMBU KARANG',
                'is_done'   => (Nelayan::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'nelayan',
            ],
            [
                'no'        => 'G',
                'kuesioner' => 'PEMANFAATAN EKOSISTEM TERUMBU KARANG DAN MANGROVE (TRAVEL COST METHOD/TCM)',
                'is_done'   => (MotivasiResponden::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'wisata',
            ],
            [
                'no'        => 'H',
                'kuesioner' => 'PEMANFAATAN SUMBER DAYA PERIKANAN BUDIDAYA RUMPUT LAUT',
                'is_done'   => (BudidayaRumputLaut::where('id_responden', $request->session()->get('id_responden'))->count()),
                'link'      => 'budidaya-rumput-laut',
            ],
        ];
        
        
        return view('responden.detail', [
            'responden'  => Responden::find($id_responden),
            'kuesioner'  => $kuesioner,
        ]);
    }
}
