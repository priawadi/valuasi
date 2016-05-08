<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BudidayaKeramba;
use App\MasterKomoditas;
use App\HasilPanen;

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
            'komoditas'       => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get()
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
        // check if input is not null
        if ($request->input('jenis_komoditas')){
            foreach ($request->input('jenis_komoditas') as $key => $value) 
            {
                $jenis_komoditas .= ($key)? ',' . $value: $value;
            }
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

        // save hasil panen
        foreach (MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get() as $idx => $item) {
            $hasil_panen                      = new HasilPanen;
            $hasil_panen->id_responden        = $request->session()->get('id_responden');
            $hasil_panen->kateg_modul         = \Config::get('constants.MODULE.KERAMBA');
            $hasil_panen->id_master_komoditas = $item->id_master_komoditas;
            $hasil_panen->jumlah              = $request->input('jumlah.' . $item->id_master_komoditas, null);
            $hasil_panen->harga_jual          = $request->input('harga_jual.' . $item->id_master_komoditas, null);
            $hasil_panen->jumlah_penerimaan   = $request->input('jumlah_penerimaan.' . $item->id_master_komoditas, null);
            $hasil_panen->save();
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
        $hasil_panen = [];
        foreach (HasilPanen::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $hasil_panen[$item->id_master_komoditas] = 
            [
                'id_hasil_panen'    => $item->id_hasil_panen,
                'jumlah'            => $item->jumlah,
                'harga_jual'        => $item->harga_jual,
                'jumlah_penerimaan' => $item->jumlah_penerimaan,
            ];
        }

        return view('budidaya_keramba.info.edit', [
            'subtitle'         => 'Edit Budidaya Keramba',
            'action'           => 'budidaya-keramba/info/edit/' . $id,
            'status_usaha'     => $this->status_usaha,
            'jenis_komoditas'  => $this->jenis_komoditas,
            'budidaya_keramba' => BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->first(),
            'komoditas'        => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->get(),
            'hasil_panen'      => $hasil_panen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $jenis_komoditas = '';
        // check if input is not null
        if ($request->input('jenis_komoditas')){
            foreach ($request->input('jenis_komoditas') as $key => $value) 
            {
                $jenis_komoditas .= ($key)? ',' . $value: $value;
            }
        }

        $budiday_keramba                      = BudidayaKeramba::where('id_responden', $request->session()->get('id_responden'))->first();
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

        // save hasil panen
        foreach ($request->input('jumlah') as $id_hasil_panen => $item) {
            $hasil_panen                    = HasilPanen::find($id_hasil_panen);
            $hasil_panen->jumlah            = $request->input('jumlah.' . $id_hasil_panen);
            $hasil_panen->harga_jual        = $request->input('harga_jual.' . $id_hasil_panen);
            $hasil_panen->jumlah_penerimaan = $request->input('jumlah_penerimaan.' . $id_hasil_panen);
            $hasil_panen->save();
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
        HasilPanen::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.KERAMBA'))->delete();
        BudidayaKeramba::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
