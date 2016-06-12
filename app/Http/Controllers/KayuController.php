<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterKayu;
use App\KayuProd;
use App\KayuOps;
use App\KayuNon;
use App\Responden;
use Excel;

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

        foreach ($request->input('kayu_prod.satuan') as $id_kayu_prod => $item) {
            $kayuprod                       = KayuProd::find($id_kayu_prod);
            $kayuprod->satuan               = $request->input('kayu_prod.satuan.' . $id_kayu_prod, null);
            $kayuprod->produksi             = $request->input('kayu_prod.produksi.' . $id_kayu_prod, null);
            $kayuprod->harga                = $request->input('kayu_prod.harga.' . $id_kayu_prod, null);
            $kayuprod->nilai_prod           = $request->input('kayu_prod.nilai_prod.' . $id_kayu_prod, null);

            $kayuprod->save();
        }

        foreach ($request->input('kayu_ops.biaya') as $id_kayu_ops => $item) {
            $kayuops                       = KayuOps::find($id_kayu_ops);
            $kayuops->biaya                = $request->input('kayu_ops.biaya.' . $id_kayu_ops, null);
            $kayuops->jumlah               = $request->input('kayu_ops.jumlah.' . $id_kayu_ops, null);
            $kayuops->total_biaya          = $request->input('kayu_ops.total_biaya.' . $id_kayu_ops, null);

            $kayuops->save();
        }   

        foreach ($request->input('kayu_nonkomersil.satuan') as $id_kayu_nonkomersil => $item) {
            $kayunon                       = KayuNon::find($id_kayu_nonkomersil);
            $kayunon->satuan               = $request->input('kayu_nonkomersil.satuan.' . $id_kayu_nonkomersil, null);
            $kayunon->jumlah               = $request->input('kayu_nonkomersil.jumlah.' . $id_kayu_nonkomersil, null);
            $kayunon->harga                = $request->input('kayu_nonkomersil.harga.' . $id_kayu_nonkomersil, null);
            $kayunon->nilai_manfaat        = $request->input('kayu_nonkomersil.nilai_manfaat.' . $id_kayu_nonkomersil, null);

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

    public function export()
    {
        $jenis_kelamin = [
            1 => 'Laki-Laki',
            2 => 'Perempuan',
        ];

        $pendidikan = [
            1  => 'Tidak sekolah',
            2  => 'SD',
            3  => 'SLTP',
            4  => 'SLTA',
            5  => 'D1',
            6  => 'D2',
            7  => 'D3',
            8  => 'S1',
            9  => 'S2',
            10 => 'S3',
        ];

        $status_kawin = [
            1  => 'Belum Menikah',
            2  => 'Menikah',
            3  => 'Duda',
            4  => 'Janda',
        ];

        $status_keluarga = [
            1 => 'Suami',
            2 => 'Istri',
            3 => 'Anak',
            4 => 'Sepupu',
            5 => 'Keponakan',
            6 => 'Mertua',
        ];

        $jenis_pendapatan = [
            1 => 'kurang dari Rp. 10.000.000,-',
            2 => 'Rp. 10.000.000,- hingga Rp. Rp. 20.000.000,-',
            3 => 'Rp. 20.000.000,- hingga Rp. Rp. 30.000.000,-',
            4 => 'Rp. 30.000.000,- hingga Rp. Rp. 40.000.000,-',
            5 => 'lebih dari Rp. 40.000.000,-',
        ];

        $pekerjaan = [
            1 => 'Pegawai Negeri',
            2 => 'Pegawai Swasta',
            3 => 'Wiraswasta',
            4 => 'Petani',
            5 => 'Pembudidaya',
            6 => 'Nelayan',
            7 => 'Pengrajin',
            8 => 'Pengrajin Pengrajin',
            9 => 'Buruh non perikanan',
            10 => 'Buruh Nelayan',
            11 => 'Penyedia jasa perikanan',
            12 => 'Pedagang perikanan',
            13 => 'Lainnya',
        ];

        $master_kayu        = MasterKayu::where('kategori', \Config::get('constants.KAYU.PRODUKSI'))->get();
        $master_kayu_ops    = MasterKayu::where('kategori', \Config::get('constants.KAYU.BIAYA_OPERASIONAL'))->get();
        $master_kayu_non    = MasterKayu::where('kategori', \Config::get('constants.KAYU.NON_KOMERSIL'))->get();

        // Set column
        $data = [];
        // Set column Reponden
        $columns = [
            'Nama', 
            'NoKontak', 
            'Alamat', 
            'Umur', 
            'JenisKelamin', 
            'Pendidikan', 
            'LamaPendidikan', 
            'StatusPerkawinan', 
            'JumlahAnggotaKeluarga', 
            'Anak_anak', 
            'Dewasa', 
            'StatusDalamKeluarga', 
            'PendapatanRumahTangga', 
            'PekerjaanUtama', 
            'PekerjaanSampingan'];

        $columns = array_merge($columns, $this->get_column_kayu($master_kayu, $master_kayu_ops, $master_kayu_non));
        
        $data[] = $columns;

        foreach (Responden::all() as $index => $item) {
            $merge_data = [];
            // Responden
            $merge_data = array_merge($merge_data, [
                $item['nama'],
                $item['telepon'],
                $item['alamat'],
                $item['umur'],
                isset($jenis_kelamin[$item['jenis_kelamin']])? $jenis_kelamin[$item['jenis_kelamin']]: null,
                isset($pendidikan[$item['pendidikan']])? $pendidikan[$item['pendidikan']]: null,
                $item['lama_pendidikan'],
                isset($status_kawin[$item['stat_kawin']])? $status_kawin[$item['stat_kawin']]: null,
                $item['jum_ang_kel_total'],
                $item['jum_ang_kel_anak'],
                $item['jum_ang_kel_dewasa'],
                isset($status_keluarga[$item['stat_keluarga']])? $status_keluarga[$item['stat_keluarga']]: null,
                isset($jenis_pendapatan[$item['pendapatan']])? $jenis_pendapatan[$item['pendapatan']]: null,
                isset($pekerjaan[$item['pekerjaan_utama']])? $pekerjaan[$item['pekerjaan_utama']]: null,
                isset($pekerjaan[$item['pekerjaan_sampingan']])? $pekerjaan[$item['pekerjaan_sampingan']]: null,
            ]);

            // kayu
            $merge_data = array_merge($merge_data, $this->get_kayu($item['id_responden'], $master_kayu, $master_kayu_non, $master_kayu_ops));
            $data[]     = $merge_data;
        }

        // print_r($data);
        Excel::create('Kayu', function($excel) use($data){
            // Our first sheet
            $excel->sheet('First sheet', function($sheet) use($data){
                
                $sheet->fromArray(
                    $data,
                    null,
                    'A1',
                    false,
                    false
                );


                // Set format of cell
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setFontWeight('bold');

                });
            });

        })->export('xls');
    }

    public function get_kayu($id_responden, $master_kayu, $master_kayu_ops, $master_kayu_non)
    {
        // data kayu prod
        $kayuprod = [];
        foreach (KayuProd::where('id_responden', $id_responden)->get() as $idx => $item) {
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
        foreach (KayuOps::where('id_responden', $id_responden)->get() as $idx => $item) {
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
        foreach (KayuNon::where('id_responden', $id_responden)->get() as $idx => $item) {
            $kayunon[$item->id_master_kayu] = 
            [
                'id_kayu_nonkomersil'   => $item->id_kayu_nonkomersil,
                'satuan'                => $item->satuan,
                'jumlah'                => $item->jumlah,
                'harga'                 => $item->harga,
                'nilai_manfaat'         => $item->nilai_manfaat,
            ];
        } 

        //data kayu prod
        foreach ($master_kayu as $key => $value) {
            $kayu[]     = $kayuprod[$value->id_master_kayu]['satuan'];
            $kayu[]     = $kayuprod[$value->id_master_kayu]['produksi'];
            $kayu[]     = $kayuprod[$value->id_master_kayu]['harga'];
            $kayu[]     = $kayuprod[$value->id_master_kayu]['nilai_prod'];
        }

        //data kayu ops
        foreach ($master_kayu_ops as $key => $value) {
            $kayu[]     = $kayuops[$value->id_master_kayu]['biaya'];
            $kayu[]     = $kayuops[$value->id_master_kayu]['jumlah'];
            $kayu[]     = $kayuops[$value->id_master_kayu]['total_biaya'];
        }

        //data kayu non
        foreach ($master_kayu_non as $key => $value) {
            $kayu[]     = $kayunon[$value->id_master_kayu]['satuan'];
            $kayu[]     = $kayunon[$value->id_master_kayu]['jumlah'];
            $kayu[]     = $kayunon[$value->id_master_kayu]['harga'];
            $kayu[]     = $kayunon[$value->id_master_kayu]['nilai_manfaat'];
        }

        return $kayu;
    }

    public function get_column_kayu($master_kayu, $master_kayu_ops, $master_kayu_non)
    {
        foreach ($master_kayu as $key => $value) {
            $columns[]      = 'satuan_' . $value['rincian'];
            $columns[]      = 'produksi_' . $value['rincian'];
            $columns[]      = 'harga_' . $value['rincian'];
            $columns[]      = 'nilai_prod'. $value['rincian'];
        }

        foreach ($master_kayu_ops as $key => $value) {
            $columns[]      = 'biaya_' . $value['rincian'];
            $columns[]      = 'jumlah_' . $value['rincian'];
            $columns[]      = 'total_biaya_' . $value['rincian'];
        }

        foreach ($master_kayu_non as $key => $value) {
            $columns[]      = 'satuan_' . $value['rincian'];
            $columns[]      = 'jumlah_' . $value['rincian'];
            $columns[]      = 'harga_' . $value['rincian'];
            $columns[]      = 'nilai_manfaat_' . $value['rincian'];
        }

        return $columns;
    }

}
