<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tambak;
use App\MasterBiaya;
use App\Biaya;

class TambakController extends Controller
{

        var $jenis_komoditas_tambak = [
            1 => 'Udang Vaname',
            2 => 'Udang Windu',
            3 => 'Bandeng',
            4 => 'Kepiting/Rajungan'
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$master_biaya               = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get();
        $master_biaya_var           = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get();
        $master_biaya_tetap         = MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambak.form', [
            'action'           			=> 'tambak/tambah',
            'subtitle'					=> 'Usaha Budidaya Tambak',
			'jenis_komoditas_tambak' 	=> $this->jenis_komoditas_tambak,
			'master_biaya' 				=> MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_var'          => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'master_biaya_tetap'        => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
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
        $jenis_komoditas_tambak = '';
        foreach ($request->get('jenis_komoditas_tambak') as $key => $value) 
        {
            $jenis_komoditas_tambak .= ($key)? ',' . $value: $value;
        } 

        $tambak                      		= new Tambak;
        $tambak->lama_tambak         		= $request->input('lama_tambak', null);
        $tambak->status_tambak       		= $request->input('status_tambak', null);
        $tambak->mapen_sblm_tambak       	= $request->input('mapen_sblm_tambak', null);
        $tambak->luas_tambak				= $request->input('luas_tambak', null);
        $tambak->status_kepem_tambak		= $request->input('status_kepem_tambak', null);
        $tambak->jenis_komoditas_tambak 	= $jenis_komoditas_tambak;
        $tambak->waktu_pemeliharaan_tambak 	= $request->input('waktu_pemeliharaan_tambak', null);
        $tambak->jum_panen_tambak			= $request->input('jum_panen_tambak', null);

        $tambak->save();

        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $key => $value) {
        $biaya 								= new Biaya;
        $biaya->kateg_biaya					= \Config::get('constants.BIAYA.INVESTASI');
        $biaya->kateg_modul					= \Config::get('constants.MODULE.TAMBAK');
        $biaya->volume						= $request->input('volume.' .$value->id_master_biaya, null);
        $biaya->harga_satuan				= $request->input('harga_satuan.' .$value->id_master_biaya, null);
        $biaya->total 						= $request->input('total.' .$value->id_master_biaya, null);

        $biaya->save();
    	}

        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $key => $value) {
        $biaya                              = new Biaya;
        $biaya->kateg_biaya                 = \Config::get('constants.BIAYA.VARIABEL');
        $biaya->kateg_modul                 = \Config::get('constants.MODULE.TAMBAK');
        $biaya->volume                      = $request->input('volume.' .$value->id_master_biaya, null);
        $biaya->harga_satuan                = $request->input('harga_satuan.' .$value->id_master_biaya, null);
        $biaya->total                       = $request->input('total.' .$value->id_master_biaya, null);

        $biaya->save();
        }

        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $key => $value) {
        $biaya                              = new Biaya;
        $biaya->kateg_biaya                 = \Config::get('constants.BIAYA.TETAP');
        $biaya->kateg_modul                 = \Config::get('constants.MODULE.TAMBAK');
        $biaya->volume                      = $request->input('volume.' .$value->id_master_biaya, null);
        $biaya->harga_satuan                = $request->input('harga_satuan.' .$value->id_master_biaya, null);
        $biaya->total                       = $request->input('total.' .$value->id_master_biaya, null);

        $biaya->save();
        }                

        return redirect('tambak');
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
