<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ExistenceValue;

class EvalController extends Controller
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
    public function create()
    {
        return view('eval.form', [
            'action'                    => 'eval/tambah',
            'subtitle'                  => 'Existence Value',
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
        $existence                     = new ExistenceValue();
        $existence->id_responden       = $request->session()->get('id_responden');
        $existence->keindahan          = $request->input('keindahan', null);
        $existence->spiritual          = $request->input('spiritual', null);
        $existence->budaya             = $request->input('budaya', null);
        $existence->anekaragam         = $request->input('anekaragam', null);
        $existence->tkt_kepentingan    = $request->input('tkt_kepentingan', null);
        $existence->sedia_lestari      = $request->input('sedia_lestari', null);
        $existence->korban_tenaga      = $request->input('korban_tenaga', null);
        $existence->sumbang_iuran      = $request->input('sumbang_iuran', null);

        $existence->save();

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
        $existence_value = ExistenceValue::where('id_responden', $request->session()->get('id_responden'))->first();
        return view('eval.edit', [
            'subtitle'                 => 'Edit Existence Value',
            'action'                   => 'eval/edit/' . $id,
            'existence_value'           => $existence_value,
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
        $existence                     = ExistenceValue::where('id_responden', $request->session()->get('id_responden'))->first();
        $existence->id_responden       = $request->session()->get('id_responden');
        $existence->keindahan          = $request->input('keindahan', null);
        $existence->spiritual          = $request->input('spiritual', null);
        $existence->budaya             = $request->input('budaya', null);
        $existence->anekaragam         = $request->input('anekaragam', null);
        $existence->tkt_kepentingan    = $request->input('tkt_kepentingan', null);
        $existence->sedia_lestari      = $request->input('sedia_lestari', null);
        $existence->korban_tenaga      = $request->input('korban_tenaga', null);
        $existence->sumbang_iuran      = $request->input('sumbang_iuran', null);

        $existence->save();

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
        ExistenceValue::where('id_responden', $id)->delete();

        return redirect('responden/lihat/' . $request->session()->get('id_responden'));
    }
}
