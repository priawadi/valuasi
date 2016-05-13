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
        foreach (KayuProd::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $kayuprod[$item->id_master_kayu] = 
            [
                'id_kayu_prod' => $item->id_kayu_prod,
                'satuan'       => $item->satuan,
                'produksi'     => $item->produksi,
                'harga'        => $item->harga,
                'nilai_prod'   => $item->nilai_prod,
            ];
        }

        // data kayu ops
        $kayuops = [];
        foreach (KayuOps::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $kayuops[$item->id_master_kayu] = 
            [
                'id_kayu_ops'   => $item->id_kayu_ops,
                'biaya'         => $item->biaya,
                'jumlah'        => $item->jumlah,
                'total_biaya'   => $item->total_biaya,
            ];
        } 

        // data kayu non komersil
        $kayunon = [];
        foreach (KayuNon::where('id_responden', $request->session()->get('id_responden'))->get() as $idx => $item) {
            $kayunon[$item->id_master_kayu] = 
            [
                'id_kayu_nonkomersil'   => $item->id_kayu_nonkomersil,
                'satuan'                => $item->satuan,
                'jumlah'                => $item->jumlah,
                'harga'                 => $item->harga,
                'nilai_manfaat'         => $item->nilai_manfaat,
            ];
        }                

        return view('kayu.edit', [
            'subtitle'                  => 'Edit Kayu',
            'action'                    => 'kayu/edit/' . $id,   
            'kayuprod'                  => $kayuprod,  
            'kayuops'                   => $kayuops,           
            'kayunon'                   => $kayunon,           
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

        foreach ($request->input('satuan') as $id_kayu_prod => $item) {
        $kayuprod                       = KayuProd::find($id_kayu_prod);
        $kayuprod->satuan               = $request->input('satuan.' . $id_kayu_prod, null);
        $kayuprod->produksi             = $request->input('produksi.' . $id_kayu_prod, null);
        $kayuprod->harga                = $request->input('harga.' . $id_kayu_prod, null);
        $kayuprod->nilai_prod           = $request->input('nilai_prod.' . $id_kayu_prod, null);

        $kayuprod->save();
        }

        foreach ($request->input('biaya') as $id_kayu_ops => $item) {
        $kayuops                       = KayuOps::find($id_kayu_ops);
        $kayuops->biaya                = $request->input('biaya.' . $id_kayu_ops, null);
        $kayuops->jumlah               = $request->input('jumlah.' . $id_kayu_ops, null);
        $kayuops->total_biaya          = $request->input('total_biaya.' . $id_kayu_ops, null);

        $kayuops->save();
        }   

        foreach ($request->input('satuan') as $id_kayu_nonkomersil => $item) {
        $kayunon                       = KayuNon::find($id_kayu_nonkomersil);
        $kayunon->satuan               = $request->input('satuan.' . $id_kayu_nonkomersil, null);
        $kayunon->jumlah               = $request->input('jumlah.' . $id_kayu_nonkomersil, null);
        $kayunon->harga                = $request->input('harga.' . $id_kayu_nonkomersil, null);
        $kayunon->nilai_manfaat        = $request->input('nilai_manfaat.' . $id_kayu_nonkomersil, null);

        $kayunon->save();
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
        KayuProd::where('id_responden', $id)->delete();
        KayuNon::where('id_responden', $id)->delete();
        KayuOps::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
