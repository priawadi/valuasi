<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tambak;
use App\MasterBiaya;
use App\Biaya;
use App\HasilPanen;
use App\MasterKomoditas;

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
        $hasil_panen                = MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Tambak::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }

        return view('tambak.form', [
            'action'           			=> 'tambak/tambah',
            'subtitle'					=> 'Usaha Budidaya Tambak',
			'jenis_komoditas_tambak' 	=> $this->jenis_komoditas_tambak,
			'master_biaya' 				=> MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_var'          => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'master_biaya_tetap'        => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            'hasil_panen'               => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get(),
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
        if ($request->input('jenis_komoditas_tambak')){
            foreach ($request->input('jenis_komoditas_tambak') as $key => $value) 
            {
                $jenis_komoditas_tambak .= ($key)? ',' . $value: $value;
            }
        }
        $tambak                            = new Tambak;
        $tambak->id_responden              = $request->session()->get('id_responden');
        $tambak->lama_tambak               = $request->input('lama_tambak', null);
        $tambak->status_tambak             = $request->input('status_tambak', null);
        $tambak->mapen_sblm_tambak         = $request->input('mapen_sblm_tambak', null);
        $tambak->luas_tambak               = $request->input('luas_tambak', null);
        $tambak->status_kepem_tambak       = $request->input('status_kepem_tambak', null);
        $tambak->jenis_komoditas_tambak    = $jenis_komoditas_tambak;
        $tambak->waktu_pemeliharaan_tambak = $request->input('waktu_pemeliharaan_tambak', null);
        $tambak->jum_panen_tambak          = $request->input('jum_panen_tambak', null);

        $tambak->save();

        // save biaya investasi
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $key => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.INVESTASI');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.TAMBAK');
            $biaya->volume          = $request->input('volume.' .$value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' .$value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' .$value->id_master_biaya, null);

            $biaya->save();
    	}

        // save biaya variabel
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $key => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.VARIABEL');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.TAMBAK');
            $biaya->volume          = $request->input('volume.' .$value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' .$value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' .$value->id_master_biaya, null);

            $biaya->save();
        }

        // save biaya tetap
        foreach (MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $key => $value) {
            $biaya                  = new Biaya;
            $biaya->id_responden    = $request->session()->get('id_responden');
            $biaya->id_master_biaya = $value->id_master_biaya;
            $biaya->kateg_biaya     = \Config::get('constants.BIAYA.TETAP');
            $biaya->kateg_modul     = \Config::get('constants.MODULE.TAMBAK');
            $biaya->volume          = $request->input('volume.' .$value->id_master_biaya, null);
            $biaya->harga_satuan    = $request->input('harga_satuan.' .$value->id_master_biaya, null);
            $biaya->total           = $request->input('total.' .$value->id_master_biaya, null);

            $biaya->save();
        }     

        // save hasil panen
        foreach (MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get() as $key => $value) {
        $hasil_panen                        = new HasilPanen;
        $hasil_panen->id_responden          = $request->session()->get('id_responden');
        $hasil_panen->kateg_modul           = \Config::get('constants.MODULE.TAMBAK');
        $hasil_panen->id_master_komoditas   = $value->id_master_komoditas;
        $hasil_panen->jumlah                = $request->input('jumlah.' .$value->id_master_komoditas, null);
        $hasil_panen->harga_jual            = $request->input('harga_jual.' .$value->id_master_komoditas, null);
        $hasil_panen->jumlah_penerimaan     = $request->input('jumlah_penerimaan.' .$value->id_master_komoditas, null);

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

        // data biaya investasi
        $jwb_biaya_invest = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get() as $idx => $item) {
            $jwb_biaya_invest[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya variabel
        $jwb_biaya_var = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get() as $idx => $item) {
            $jwb_biaya_var[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data biaya tetap
        $jwb_biaya_tetap = [];
        foreach (Biaya::where('id_responden', $request->session()->get('id_responden'))->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get() as $idx => $item) {
            $jwb_biaya_tetap[$item->id_master_biaya] = 
            [
                'id_biaya'     => $item->id_biaya,
                'volume'       => $item->volume,
                'harga_satuan' => $item->harga_satuan,
                'total'        => $item->total,
            ];
        }

        // data hasil panen
        $hasil_panen = [];
        foreach (HasilPanen::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $hasil_panen[$item->id_master_komoditas] = 
            [
                'id_hasil_panen'    => $item->id_hasil_panen,
                'jumlah'            => $item->jumlah,
                'harga_jual'        => $item->harga_jual,
                'jumlah_penerimaan' => $item->jumlah_penerimaan,
            ];
        }

        $tambak = Tambak::where('id_responden', $request->session()->get('id_responden'))->first();
        
        $selected_jenis_komoditas = [];
        if ($tambak['jenis_komoditas_tambak'] != '')
        {
            foreach (explode(",", $tambak['jenis_komoditas_tambak']) as $key => $value) {
                $selected_jenis_komoditas[] = $value;
            }
        }

        return view('tambak.edit', [
            'subtitle'                  => 'Edit Budidaya Tambak',
            'action'                    => 'tambak/edit/' . $id,
            'tambak'                    => $tambak,     
            'jwb_biaya_invest'          => $jwb_biaya_invest,
            'jwb_biaya_var'             => $jwb_biaya_var,
            'jwb_biaya_tetap'           => $jwb_biaya_tetap,
            'hasil_panen'               => $hasil_panen,            
            'jenis_komoditas_tambak'    => $this->jenis_komoditas_tambak,
            'selected_jenis_komoditas'  => $selected_jenis_komoditas,
            'master_biaya'              => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.INVESTASI'))->get(),
            'master_biaya_var'          => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.VARIABEL'))->get(),
            'master_biaya_tetap'        => MasterBiaya::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->where('kateg_biaya', \Config::get('constants.BIAYA.TETAP'))->get(),
            'komoditas'                 => MasterKomoditas::where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->get(),                
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

        $jenis_komoditas_tambak = '';
        if ($request->input('jenis_komoditas_tambak')){
            foreach ($request->input('jenis_komoditas_tambak') as $key => $value) 
            {
                $jenis_komoditas_tambak .= ($key)? ',' . $value: $value;
            }
        }
        $tambak                            = Tambak::where('id_responden', $request->session()->get('id_responden'))->first();
        $tambak->id_responden              = $request->session()->get('id_responden');
        $tambak->lama_tambak               = $request->input('lama_tambak', null);
        $tambak->status_tambak             = $request->input('status_tambak', null);
        $tambak->mapen_sblm_tambak         = $request->input('mapen_sblm_tambak', null);
        $tambak->luas_tambak               = $request->input('luas_tambak', null);
        $tambak->status_kepem_tambak       = $request->input('status_kepem_tambak', null);
        $tambak->jenis_komoditas_tambak    = $jenis_komoditas_tambak;
        $tambak->waktu_pemeliharaan_tambak = $request->input('waktu_pemeliharaan_tambak', null);
        $tambak->jum_panen_tambak          = $request->input('jum_panen_tambak', null);

        $tambak->save();

        // save biaya investasi, variabel, dan tetap
        foreach ($request->input('volume') as $id_biaya => $item) {
            $biaya               = Biaya::find($id_biaya);
            $biaya->volume       = $request->input('volume.' . $id_biaya, null);
            $biaya->harga_satuan = $request->input('harga_satuan.' . $id_biaya, null);
            $biaya->total        = $request->input('total.' . $id_biaya, null);
            $biaya->save();
        }

        // save hasil panen
        foreach ($request->input('jumlah') as $id_hasil_panen => $item) {
            $hasil_panen                    = HasilPanen::find($id_hasil_panen);
            $hasil_panen->jumlah            = $request->input('jumlah.' . $id_hasil_panen, null);
            $hasil_panen->harga_jual        = $request->input('harga_jual.' . $id_hasil_panen, null);
            $hasil_panen->jumlah_penerimaan = $request->input('jumlah_penerimaan.' . $id_hasil_panen, null);
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
        HasilPanen::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->delete();
        Tambak::where('id_responden', $id)->delete();
        Biaya::where('id_responden', $id)->where('kateg_modul', \Config::get('constants.MODULE.TAMBAK'))->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
