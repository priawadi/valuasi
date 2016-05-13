<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FasilitasPendukung;
use App\MotivasiResponden;
use App\BiayaPerjalanan;
use App\PersepsiResponden;
use App\BiayaWisata;

class WisataController extends Controller
{
    var $jenis_pengeluaran = [
        1 => 'Biaya Transportasi',
        2 => 'Tiket Masuk Lokasi Wisata',
        3 => 'Penginapan (Hotel/Home Stay)',
        4 => 'Biaya Konsumsi (Makanan dll)',
        5 => 'Biaya Sewa Kendaraan Dalam Kawasan Wisata (Motor, Perahu, Mobil)',
        6 => 'Biaya Dokumentasi',
        7 => 'Biaya Jasa Wisata Ex. Pemandu wisata, sewa alat snorkling dll',
    ];

    var $pertanyaan = [
        1 => 'Tujuan utama datang ke tempat ini?', 
        2 => 'Kedatangan ke tempat ini merupakan:',
        3 => 'Jika (2) adalah persinggahan, maka tujuan utama adalah:',
        4 => 'Alasan mengunjungi tempat ini?',
        5 => 'Sumber informasi tentang kawasan ini:',
        6 => 'a. Berapa kali anda mengunjungi lokasi ini? Jawab:',
        7 => 'b. Frekuensi kunjungan dalam setahun:',
    ];

    var $opsi_motivasi = 
    [
        1 => [
            1 => 'Wisata pantai',
            2 => 'Wisata mangrove',
            3 => 'Snorkling/diving',
            4 => 'Pengamatan Flora/Fauna',
            5 => 'Pendidikan/ Penelitian',
            6 => 'Wisata alam  perairan lain',
        ],
        2 => [
            1 => 'Tujuan Utama',
            2 => 'Persinggahan',
        ],
        4 => [
            1 => 'Jarak yang dekat',
            2 => 'Kemudahan transportasi',
            3 => 'Biaya yang murah',
            4 => 'Potensi alamnya',
            5 => 'Lingkungan yang alami',
            6 => 'Lainnya',
        ],
        5 => [
            1 => 'Media cetak & Elektronik',
            2 => 'Teman/ keluarga',
            3 => 'Organisasi',
            4 => 'Internet',
        ],
        6 => [
            1 => '1 kali dalam setahun',
            2 => '2 kali dalam setahun',
            3 => 'Lebih dari 2 kali dalam setahun',
        ],
    ];

    var $opsi_fasilitas = 
    [
        'ketersediaan' => [
            1 => 'Ya',
            2 => 'Tidak',
        ],
        'jumlah' => [
            1 => 'Memadai',
            2 => 'Tidak Memadai',
        ],
        'kondisi' => [
            1 => 'Baik',
            2 => 'Cukup Baik',
            3 => 'Kurang Baik',
        ],
    ];

    var $opsi_perjalanan = 
    [
        1 => [
            1 => 'Sendirian',
            2 => 'Rombongan',
        ],
        2 => [
            1 => 'Perseorangan',
            2 => 'Travel Agent',
        ],
        3 => [
            1 => 'Pribadi',
            2 => 'Sewa',
            3 => 'Umum',
        ],
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
        return view('wisata.form', [
            'action'              => 'wisata/tambah',
            'subtitle'            => 'Valuasi Wisata',
            'fasilitas_pendukung' => FasilitasPendukung::all(),
            'jenis_pengeluaran'   => $this->jenis_pengeluaran,
            'pertanyaan'          => $this->pertanyaan,
            'opsi_motivasi'       => $this->opsi_motivasi,
            'opsi_fasilitas'      => $this->opsi_fasilitas,
            'opsi_perjalanan'     => $this->opsi_perjalanan,
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
        foreach ($this->pertanyaan as $id_pertanyaan => $value) {
            $motivasi                = new MotivasiResponden;
            $motivasi->id_responden  = $request->session()->get('id_responden');
            $motivasi->id_pertanyaan = $id_pertanyaan;
            $motivasi->jawaban       = $request->input('jawaban.' .$id_pertanyaan, null);
            $motivasi->jawaban_lain  = $request->input('jawaban_lain.' .$id_pertanyaan, null);

            $motivasi->save();
        }

        foreach (FasilitasPendukung::where('is_pertanyaan', 1)->get() as $id_fasilitas_Pendukung => $item) {
            $persepsi                         = new PersepsiResponden;
            $persepsi->id_responden           = $request->session()->get('id_responden');
            $persepsi->id_fasilitas_pendukung = $item->id_fasilitas_pendukung;
            $persepsi->ketersediaan           = $request->input('ketersediaan.' .$id_pertanyaan, null);;
            $persepsi->jumlah                 = $request->input('jumlah.' .$id_pertanyaan, null);
            $persepsi->kondisi                = $request->input('kondisi.' .$id_pertanyaan, null);

            $persepsi->save();
        }

        $perjalanan                     = new BiayaPerjalanan;
        $perjalanan->id_responden       = $request->session()->get('id_responden');
        $perjalanan->jenis_rombongan    = $request->input('jenis_rombongan', null);
        $perjalanan->jumlah_orang       = $request->input('jumlah_orang', null);
        $perjalanan->penyelenggara      = $request->input('penyelenggara', null);
        $perjalanan->jenis_transportasi = $request->input('jenis_transportasi', null);

        $perjalanan->save();

        foreach ($this->jenis_pengeluaran as $id_jenis_pengeluaran => $value) {
            $wisata                    = new BiayaWisata;
            $wisata->id_responden      = $request->session()->get('id_responden');
            $wisata->jenis_pengeluaran = $id_jenis_pengeluaran;
            $wisata->biaya             = $request->input('biaya_wisata.biaya', null);
            $wisata->jumlah            = $request->input('biaya_wisata.jumlah', null);
            $wisata->satuan_jumlah     = $request->input('biaya_wisata.satuan_jumlah', null);
            $wisata->total             = $request->input('biaya_wisata.total', null);

            $wisata->save();
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
        // Data Motivasi Responden
        $dt_motivasi_responden = [];
        foreach (MotivasiResponden::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $dt_motivasi_responden[$item->id_pertanyaan] = 
            [
                'id_motivasi_responden' => $item->id_motivasi_responden,
                'jawaban'               => $item->jawaban,
                'jawaban_lain'          => $item->jawaban_lain,
            ];
        }

        // Data Persepsi Responden
        $dt_persepsi_responden = [];
        foreach (PersepsiResponden::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            // except 1
            if ($item->id_fasilitas_pendukung != 1)
            {
                $dt_persepsi_responden[$item->id_fasilitas_pendukung] = 
                [
                    'id_persepsi_responden' => $item->id_persepsi_responden,
                    'ketersediaan'          => $item->ketersediaan,
                    'jumlah'                => $item->jumlah,
                    'kondisi'               => $item->kondisi,
                ];
            }
        }

        // Data Biaya Wisata
        $dt_biaya_wisata = [];
        foreach (BiayaWisata::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $dt_biaya_wisata[$item->jenis_pengeluaran] = 
            [
                'id_biaya_wisata' => $item->id_biaya_wisata,
                'biaya'           => $item->biaya,
                'jumlah'          => $item->jumlah,
                'satuan_jumlah'   => $item->satuan_jumlah,
                'total'           => $item->total,
            ];
        }



        return view('wisata.edit', [
            'subtitle'            => 'Edit Wista',
            'action'              => 'wisata/edit/' . $id,      
            'fasilitas_pendukung' => FasilitasPendukung::all(),
            'jenis_pengeluaran'   => $this->jenis_pengeluaran,
            'pertanyaan'          => $this->pertanyaan, 
            'opsi_motivasi'       => $this->opsi_motivasi,
            'opsi_fasilitas'      => $this->opsi_fasilitas,
            'opsi_perjalanan'     => $this->opsi_perjalanan,
            
            // Data
            'dt_motivasi_responden' => $dt_motivasi_responden,
            'dt_persepsi_responden' => $dt_persepsi_responden,
            'dt_biaya_perjalanan'   => BiayaPerjalanan::where('id_responden', $id)->first(),            
            'dt_biaya_wisata'       => $dt_biaya_wisata,
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
        // Save motivasi responden: jawaban
        foreach ($request->input('jawaban') as $id_motivasi_responden => $value1) {
            $motivasi          = MotivasiResponden::find($id_motivasi_responden);
            $motivasi->jawaban = $request->input('jawaban.' . $id_motivasi_responden, null);
            $motivasi->save();
        }

        // Save motivasi responden: jawaban
        foreach ($request->input('jawaban_lain') as $id_motivasi_responden => $value1) {
            $motivasi               = MotivasiResponden::find($id_motivasi_responden);
            $motivasi->jawaban_lain = $request->input('jawaban_lain.' . $id_motivasi_responden, null);
            $motivasi->save();
        }
        
        // Save persepsi responden
        foreach ($request->input('persepsi_responden.jumlah') as $id_persepsi_responden => $item) {
            $persepsi                         = PersepsiResponden::find($id_persepsi_responden);
            $persepsi->ketersediaan           = $request->input('persepsi_responden.ketersediaan.' . $id_persepsi_responden, null);;
            $persepsi->jumlah                 = $request->input('persepsi_responden.jumlah.' . $id_persepsi_responden, null);
            $persepsi->kondisi                = $request->input('persepsi_responden.kondisi.' . $id_persepsi_responden, null);

            $persepsi->save();
        }

        $perjalanan                     = BiayaPerjalanan::where('id_responden', $id)->first();
        $perjalanan->jenis_rombongan    = $request->input('jenis_rombongan', null);
        $perjalanan->jumlah_orang       = $request->input('jumlah_orang', null);
        $perjalanan->penyelenggara      = $request->input('penyelenggara', null);
        $perjalanan->jenis_transportasi = $request->input('jenis_transportasi', null);

        $perjalanan->save();

        // Save Biaya Wisata
        foreach ($request->input('biaya_wisata.biaya') as $id_biaya_wisata => $value) {
            $wisata                    = BiayaWisata::find($id_biaya_wisata);
            $wisata->biaya             = $request->input('biaya_wisata.biaya.' . $id_biaya_wisata, null);
            $wisata->jumlah            = $request->input('biaya_wisata.jumlah.' . $id_biaya_wisata, null);
            $wisata->satuan_jumlah     = $request->input('biaya_wisata.satuan_jumlah.' . $id_biaya_wisata, null);
            $wisata->total             = $request->input('biaya_wisata.total.' . $id_biaya_wisata, null);

            $wisata->save();
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
        MotivasiResponden::where('id_responden', $id)->delete();
        PersepsiResponden::where('id_responden', $id)->delete();
        BiayaPerjalanan::where('id_responden', $id)->delete();
        BiayaWisata::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
