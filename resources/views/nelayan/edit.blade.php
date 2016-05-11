@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$subtitle}}</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="panel-body">
                    {!! Form::open(array('url' => $action, 'class' => 'form-horizontal', 'method' => 'patch')) !!}
                        <table class="table table-hover">
                            <tr>
                                <td width="400">1. Lama Usaha</td>
                                <td>
                                    {{
                                        Form::text(
                                            'lama_usaha', 
                                            $budidaya_keramba['lama_usaha'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'tahun',
                                                'maxlength'   => 2

                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>2. Status Usaha</td>
                                <td>
                                    @foreach ($status_usaha as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'status_usaha', 
                                                        $k,
                                                        $budidaya_keramba['status_usaha'] == $k,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                {{ $v }}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>3. Mata Pencaharian sebelum menjadi Pembudidaya</td>
                                <td>
                                    {{
                                        Form::text(
                                            'mapen_sblm_keramba', 
                                            $budidaya_keramba['mapen_sblm_keramba'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Mata Pencarian',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>4. Luas Lahan Budidaya Keramba</td>
                                <td>
                                    {{
                                        Form::text(
                                            'luas_lahan', 
                                            $budidaya_keramba['luas_lahan'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'meter persegi',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>5. Jumlah Total Keramba</td>
                                <td>
                                    {{
                                        Form::text(
                                            'keramba_total', 
                                            $budidaya_keramba['keramba_total'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'unit',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Keramba yang Aktif</td>
                                <td>
                                    {{
                                        Form::text(
                                            'keramba_aktif', 
                                            $budidaya_keramba['keramba_aktif'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'unit',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Keramba yang Tidak Aktif</td>
                                <td>
                                    {{
                                        Form::text(
                                            'keramba_tidak_aktif', 
                                            $budidaya_keramba['keramba_tidak_aktif'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'unit',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>6. Jenis komoditas yang Diusahakan</td>
                                <td>
                                    {{
                                        Form::select(
                                            'jenis_komoditas[]', 
                                            $jenis_komoditas, 
                                            null, 
                                            [
                                                'class'    => 'form-control',
                                                'multiple' => 'multiple',
                                                'id'       => 'jenis-komoditas'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>7. Waktu Pemeliharaan</td>
                                <td>
                                    {{
                                        Form::text(
                                            'waktu_pemeliharaan', 
                                            $budidaya_keramba['waktu_pemeliharaan'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'bulan',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>8. Jumlah Siklus/Panen per Tahun pada Unit Usaha</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jum_siklus_panen', 
                                            $budidaya_keramba['jum_siklus_panen'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'kali',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                        </table>
                        <br>
                        9. Biaya Investasi
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Investasi</th>
                                    <th>Satuan</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan<br/> (Rp/Unit)</th>
                                    <th>Jumlah Biaya<br/> (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya_invest as $idx => $item)
                                <tr>
                                    <td> {{$item -> biaya}} </td>
                                    <td> {{$item -> satuan}} </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'volume['. $jwb_biaya_invest[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_invest[$item -> id_master_biaya]['volume'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'harga_satuan['. $jwb_biaya_invest[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_invest[$item -> id_master_biaya]['harga_satuan'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'total['. $jwb_biaya_invest[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_invest[$item -> id_master_biaya]['total'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>

                        10. Biaya Variabel
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Biaya Variabel</th>
                                    <th>Satuan</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan<br/> (Rp/Unit)</th>
                                    <th>Jumlah Biaya<br/> (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya_var as $idx => $item)
                                <tr>
                                    <td> {{$item -> biaya}} </td>
                                    <td> {{$item -> satuan}} </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'volume['. $jwb_biaya_var[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_var[$item -> id_master_biaya]['volume'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'harga_satuan['. $jwb_biaya_var[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_var[$item -> id_master_biaya]['harga_satuan'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'total['. $jwb_biaya_var[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_var[$item -> id_master_biaya]['total'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        11. Biaya Tetap
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Biaya Tetap</th>
                                    <th>Satuan</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan<br/> (Rp/Unit)</th>
                                    <th>Jumlah Biaya<br/> (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya_tetap as $idx => $item)
                                <tr>
                                    <td> {{$item -> biaya}} </td>
                                    <td> {{$item -> satuan}} </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'volume['. $jwb_biaya_tetap[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_tetap[$item -> id_master_biaya]['volume'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'harga_satuan['. $jwb_biaya_tetap[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_tetap[$item -> id_master_biaya]['harga_satuan'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'total['. $jwb_biaya_tetap[$item -> id_master_biaya]['id_biaya'] .']', 
                                                $jwb_biaya_tetap[$item -> id_master_biaya]['total'], 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        12. Hasil Panen per Siklus (per Unit)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Komoditas</th>
                                    <th>Satuan</th>
                                    <th>Jumlah Produksi</th>
                                    <th>Harga Jual (Rp/Kg)</th>
                                    <th>Jumlah Penerimaan (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komoditas as $idx => $item)
                                    <tr>
                                        <td>{{$idx + 1}}</td>
                                        <td>{{$item['komoditas']}}</td>
                                        <td>{{$item['satuan']}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'jumlah[' . $hasil_panen[$item->id_master_komoditas]['id_hasil_panen'] . ']', 
                                                    $hasil_panen[$item->id_master_komoditas]['jumlah'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => '',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'harga_jual[' . $hasil_panen[$item->id_master_komoditas]['id_hasil_panen'] . ']', 
                                                    $hasil_panen[$item->id_master_komoditas]['harga_jual'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => '',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'jumlah_penerimaan[' . $hasil_panen[$item->id_master_komoditas]['id_hasil_panen'] . ']', 
                                                    $hasil_panen[$item->id_master_komoditas]['jumlah_penerimaan'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => '',
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      @include('components.form.prev_next_btn')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#jenis-komoditas').multiselect();
    });
</script>
@endsection