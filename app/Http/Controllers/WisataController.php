<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FasilitasPendukung;

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
