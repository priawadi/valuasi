<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterKayu;
use App\KayuProd;
use App\KayuOps;
use App\KayuNon;

class KayuController extends Controller
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
        if (MasterKayu::where('id_responden', $request->session()->get('id_responden'))->count())
        {
            return redirect('responden/lihat/' . $request->session()->get('id_responden'));
        }

        return view('kayu.form', [
            'action'           			=> 'kayu/tambah',
            'subtitle'					=> 'Pemanfaatan Kayu',
            'master_kayu' 				=> MasterKayu::where('kategori', \Config::get('constants.KAYU.PRODUKSI'))->get(),
            'master_kayu_ops' 			=> MasterKayu::where('kategori', \Config::get('constants.KAYU.BIAYA_OPERASIONAL'))->get(),
            'master_kayu_non' 			=> MasterKayu::where('kategori', \Config::get('constants.KAYU.NON_KOMERSIL'))->get(),
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
    	foreach (MasterKayu::where('kategori', \Config::get('constants.KAYU.PRODUKSI'))->get() as $key => $value) {
        $kayuprod                      	= new KayuProd;
        $kayuprod->id_master_kayu       = $value->id_master_kayu;
        $kayuprod->id_responden         = $request->session()->get('id_responden');
        $kayuprod->satuan       		= $request->input('satuan.' .$value->id_master_kayu, null);
        $kayuprod->produksi       		= $request->input('produksi.' .$value->id_master_kayu, null);
        $kayuprod->harga				= $request->input('harga.' .$value->id_master_kayu, null);
        $kayuprod->nilai_prod			= $request->input('nilai_prod.' .$value->id_master_kayu, null);

        $kayuprod->save();
    	}

    	foreach (MasterKayu::where('kategori', \Config::get('constants.KAYU.BIAYA_OPERASIONAL'))->get() as $key => $value) {
        $kayuops                      	= new KayuOps;
        $kayuops->id_master_kayu       	= $value->id_master_kayu;
        $kayuops->id_responden          = $request->session()->get('id_responden');
        $kayuops->biaya       			= $request->input('biaya.' .$value->id_master_kayu, null);
        $kayuops->jumlah       			= $request->input('jumlah.' .$value->id_master_kayu, null);
        $kayuops->total_biaya			= $request->input('total_biaya.' .$value->id_master_kayu, null);

        $kayuops->save();
    	}

    	foreach (MasterKayu::where('kategori', \Config::get('constants.KAYU.NON_KOMERSIL'))->get() as $key => $value) {
        $kayunon                      	= new KayuNon;
        $kayunon->id_master_kayu       	= $value->id_master_kayu;
        $kayunon->id_responden          = $request->session()->get('id_responden');
        $kayunon->satuan       			= $request->input('satuan.' .$value->id_master_kayu, null);
        $kayunon->jumlah       			= $request->input('jumlah.' .$value->id_master_kayu, null);
        $kayunon->harga					= $request->input('harga.' .$value->id_master_kayu, null);
        $kayunon->nilai_manfaat			= $request->input('nilai_manfaat.' .$value->id_master_kayu, null);

        $kayunon->save();
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
        // data kayu prod
        $kayuprod = [];
        foreach (KayuProd::all()->where('id_responden', $request->session()->get('id_responden')) as $idx => $item) {
            $kayuprod[$item->id_master_kayu] = 
            [
                'id_master_kayu'    => $item->id_master_kayu,
                'satuan'            => $item->satuan,
                'produksi'          => $item->produksi,
                'harga'             => $item->harga,
                'nilai_prod'        => $item->nilai_prod,
            ];
        }

        return view('kayu.edit', [
            'subtitle'                  => 'Edit Kayu',
            'action'                    => 'kayu/edit/' . $id,   
            'kayuprod'                  => $kayuprod,           
            'master_kayu'               => MasterKayu::where('kategori', \Config::get('constants.KAYU.PRODUKSI'))->get(),
            'master_kayu_ops'           => MasterKayu::where('kategori', \Config::get('constants.KAYU.BIAYA_OPERASIONAL'))->get(),
            'master_kayu_non'           => MasterKayu::where('kategori', \Config::get('constants.KAYU.NON_KOMERSIL'))->get(),            
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        KayuProd::where('id_responden', $id)->delete();
        KayuNon::where('id_responden', $id)->delete();
        KayuOps::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
