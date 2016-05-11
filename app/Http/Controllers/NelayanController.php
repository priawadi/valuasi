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
            'subtitle'       => 'Nelayan',
            'action'         => 'nelayan/tambah',
            'status_nelayan' => $this->status_nelayan,
            'jenis_alat_tangkap' => $this->jenis_alat_tangkap,
            'jenis_mesin_penggerak' => $this->jenis_mesin_penggerak,
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
