<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BudidayaKeramba;

class BudidayaKerambaInfoController extends Controller
{
    var $status_usaha = [
        1 => 'Pemilik',
        2 => 'Penggarap',
        3 => 'Penyewa',
    ]; 

    var $jenis_komoditas = [
        1 => 'Kerapu Macam',
        2 => 'Kerapu Bebek/Kerapu Tikus',
        3 => 'Kerapu Sunu',
        4 => 'Kerapu Lodi',
        5 => 'Kerapu Sunu',
        6 => 'Kerapu Lobster Pasir',
        7 => 'Lobster Mutiara',
        8 => 'Udang',
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
        return view('budidaya_keramba.info.form', [
            'action'          => 'budidaya-keramba/info/tambah',
            'status_usaha'    => $this->status_usaha,
            'jenis_komoditas' => $this->jenis_komoditas,
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
        $jenis_komoditas = '';
        foreach ($request->input('jenis_komoditas') as $key => $value) 
        {
            $jenis_komoditas .= ($key)? ',' . $value: $value;
        }

        $budiday_keramba                      = new BudidayaKeramba;
        $budiday_keramba->id_responden        = $request->session()->get('id_responden');
        $budiday_keramba->lama_usaha          = $request->input('lama_usaha');
        $budiday_keramba->status_usaha        = $request->input('status_usaha');
        $budiday_keramba->mapen_sblm_keramba  = $request->input('mapen_sblm_keramba');
        $budiday_keramba->luas_lahan          = $request->input('luas_lahan');
        $budiday_keramba->keramba_total       = $request->input('keramba_total');
        $budiday_keramba->keramba_aktif       = $request->input('keramba_aktif');
        $budiday_keramba->keramba_tidak_aktif = $request->input('keramba_tidak_aktif');
        $budiday_keramba->jenis_komoditas     = $jenis_komoditas;
        $budiday_keramba->waktu_pemeliharaan  = $request->input('waktu_pemeliharaan');
        $budiday_keramba->jum_siklus_panen    = $request->input('jum_siklus_panen');

        $budiday_keramba->save();

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
