<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ExistenceValue;
use App\Responden;
use Excel;

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

        //set column
        $data = [];
        //set column responden
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
            'PekerjaanSampingan'
            ];

            $columns    = array_merge($columns, $this->get_column_eval());
            $data[]     = $columns;

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
                
                // Existence Value  
                $merge_data     = array_merge($merge_data, $this->get_eval($item['id_responden']));
                $data[]         = $merge_data;  
            }
            // print_r($data);
            Excel::create('Eval', function($excel) use($data){
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

    public function get_eval($id_responden)
    {
        $tingkat_kepentingan = [
            1 => 'Sangat Penting',
            2 => 'Penting',
            3 => 'Kurang Penting',
            4 => 'Tidak Penting',
        ];
        $pilihan = [
            1 => 'Ya',
            2 => 'Tidak',
        ];
        $sedia = [
            1 => 'Bersedia',
            2 => 'Tidak Bersedia',
        ];
        $eval       = ExistenceValue::where('id_responden', $id_responden)->first();
        $evaldata = [
            isset($pilihan[$eval->keindahan])? $pilihan[$eval->keindahan]: null,
            isset($pilihan[$eval->spiritual])? $pilihan[$eval->spiritual]: null,
            isset($pilihan[$eval->budaya])? $pilihan[$eval->budaya]: null,
            isset($pilihan[$eval->anekaragam])? $pilihan[$eval->anekaragam]: null,
            isset($tingkat_kepentingan[$eval->tkt_kepentingan])? $tingkat_kepentingan[$eval->tkt_kepentingan]: null,
            isset($sedia[$eval->sedia_lestari])? $sedia[$eval->sedia_lestari]: null,
            $eval->korban_tenaga,
            $eval->sumbang_iuran,
        ];

        return $evaldata;
    }

    public function get_column_eval()
    {
        $columns = 
        [
            'Keindahan',
            'Spiritual',
            'Budaya',
            'Anekaragam',
            'Tingkat_Kepentingan',
            'Sedia_Lestari',
            'Korban_Tenaga',
            'Sumbang_Iuran'
        ];

        return $columns;

    }
}