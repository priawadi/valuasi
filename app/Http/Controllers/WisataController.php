<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FasilitasPendukung;
use App\MotivasiResponden;

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
    public function create()
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
        $motivasi                           = new MotivasiResponden;
        $motivasi->id_motivasi_responden    = $value->id_master_kayu;
        // $motivasi->id_responden             = $request->session()->get('id_responden');
        // $motivasi->id_pertanyaan            = $request->input('pertanyaan', null);
        $motivasi->jawaban                  = $request->input('jawaban', null);
        $motivasi->jawaban_lain             = $request->input('jawaban_lain', null);

        $motivasi->save();
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
