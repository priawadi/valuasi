<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PencariSatwa;
use App\MasterPencariSatwa;
use App\HasilSatwa;
use App\BiayaSatwa;
use App\OpsSatwa;

class PencariSatwaController extends Controller
{
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
        if (PencariSatwa::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }
        return view('satwa.form', [
            'action'                    => 'satwa/tambah',
            'subtitle'                  => 'Pencari Satwa',
            'hasil_satwa'               => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'))->get(),
            'biaya_satwa'               => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'))->get(),
            'ops_satwa'                 => MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'))->get(),

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
        $pencarisatwa                       = new PencariSatwa;
        // $pencarisatwa->id_responden         = $request->session()->get('id_responden');
        $pencarisatwa->pencari_satwa_mgv    = $request->input('pencari_satwa_mgv', null);
        $pencarisatwa->pengalaman_usaha     = $request->input('pengalaman_usaha', null);
        $pencarisatwa->jenis_satwa          = $request->input('jenis_satwa', null);
        $pencarisatwa->lama_buru            = $request->input('lama_buru', null);
        $pencarisatwa->lama_buru_txt        = $request->input('lama_buru_txt', null);
        $pencarisatwa->setahun_buru         = $request->input('setahun_buru', null);
        $pencarisatwa->setahun_buru_txt     = $request->input('setahun_buru_txt', null);

        $pencarisatwa->save();

        foreach (MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.HASIL_PENERIMAAN'))->get() as $key => $value) {
        $hasilsatwa                                 = new HasilSatwa;
        $hasilsatwa->id_master_pencari_satwa        = $value->id_master_pencari_satwa;
        //$hasilsatwa->id_responden                 = $request->session()->get('id_responden');
        $hasilsatwa->jumlah_satwa                   = $request->input('jumlah_satwa.' .$value->id_master_pencari_satwa, null);
        $hasilsatwa->harga_jual                     = $request->input('harga_jual.' .$value->id_master_pencari_satwa, null);

        $hasilsatwa->save();
        }

        foreach (MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_INVESTASI'))->get() as $key => $value) {
        $biayasatwa                                 = new BiayaSatwa;
        $biayasatwa->id_master_pencari_satwa        = $value->id_master_pencari_satwa;
        //$biayasatwa->id_responden                 = $request->session()->get('id_responden');
        $biayasatwa->volume                         = $request->input('volume.' .$value->id_master_pencari_satwa, null);
        $biayasatwa->harga_beli                     = $request->input('harga_beli.' .$value->id_master_pencari_satwa, null);
        $biayasatwa->umur_ekonomis                  = $request->input('umur_ekonomis.' .$value->id_master_pencari_satwa, null);

        $biayasatwa->save();
        }   

        foreach (MasterPencariSatwa::where('kategori', \Config::get('constants.PENCARI_SATWA.BIAYA_OPERASIONAL'))->get() as $key => $value) {
        $opssatwa                                 = new OpsSatwa;
        $opssatwa->id_master_pencari_satwa        = $value->id_master_pencari_satwa;
        //$opssatwa->id_responden                 = $request->session()->get('id_responden');
        $opssatwa->volume                         = $request->input('volume.' .$value->id_master_pencari_satwa, null);
        $opssatwa->harga_satuan                   = $request->input('harga_satuan.' .$value->id_master_pencari_satwa, null);
        $opssatwa->jumlah                         = $request->input('jumlah.' .$value->id_master_pencari_satwa, null);

        $opssatwa->save();
        }               

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
