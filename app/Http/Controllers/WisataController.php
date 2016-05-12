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
            'action'                    => 'wisata/tambah',
            'subtitle'                  => 'Valuasi Wisata',
            'fasilitas_pendukung'       => FasilitasPendukung::all(),
            'jenis_pengeluaran'         => $this->jenis_pengeluaran,
            'pertanyaan'                => $this->pertanyaan,
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
        $motivasi                           = new MotivasiResponden;
        $motivasi->id_responden             = $request->session()->get('id_responden');
        $motivasi->id_pertanyaan            = $id_pertanyaan;
        $motivasi->jawaban                  = $request->input('jawaban.' .$id_pertanyaan, null);
        $motivasi->jawaban_lain             = $request->input('jawaban_lain.' .$id_pertanyaan, null);

        $motivasi->save();
        }

        foreach (FasilitasPendukung::where('is_pertanyaan', 1)->get() as $id_fasilitas_Pendukung => $item) {
        $persepsi                           = new PersepsiResponden;
        $persepsi->id_responden             = $request->session()->get('id_responden');
        $persepsi->id_fasilitas_pendukung   = $item->id_fasilitas_pendukung;
        $persepsi->ketersediaan             = $request->input('ketersediaan.' .$id_pertanyaan, null);;
        $persepsi->jumlah                   = $request->input('jumlah.' .$id_pertanyaan, null);
        $persepsi->kondisi                  = $request->input('kondisi.' .$id_pertanyaan, null);

        $persepsi->save();
        }

        $perjalanan                         = new BiayaPerjalanan;
        $perjalanan->id_responden           = $request->session()->get('id_responden');
        $perjalanan->jenis_rombongan        = $request->input('jenis_rombongan', null);
        $perjalanan->jumlah_orang           = $request->input('jumlah_orang', null);
        $perjalanan->penyelenggara          = $request->input('penyelenggara', null);
        $perjalanan->jenis_transportasi     = $request->input('jenis_transportasi', null);

        $perjalanan->save();

        $wisata                             = new BiayaWisata;
        $wisata->id_responden               = $request->session()->get('id_responden');
        $wisata->jenis_pengeluaran          = $request->input('jenis_pengeluaran', null);;
        $wisata->biaya                      = $request->input('biaya', null);
        $wisata->jumlah                     = $request->input('jumlah', null);
        $wisata->satuan_jumlah              = $request->input('satuan_jumlah', null);
        $wisata->total                      = $request->input('total', null);

        $wisata->save();

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
        //
    }
}
