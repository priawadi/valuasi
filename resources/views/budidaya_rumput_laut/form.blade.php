@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Responden</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="panel-body">
                    {!! Form::open(array('url' => $action, 'class' => 'form-horizontal')) !!}
                        <table class="table table-hover">
                            <tr>
                                <td width="400">1. Lama Usaha</td>
                                <td>
                                    {{
                                        Form::text(
                                            'lama_usaha', 
                                            '', 
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
                                                        false,
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
                                            'pekerjaan_sebelumnya', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Mata Pencaharian',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>4. Berapa pendapatan bersih saudara dari usaha budidaya rumput laut</td>
                                <td>
                                    {{
                                        Form::text(
                                            'pendapatan_bersih', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Rp/tahun',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>5. Berapa banyak Unit/Lokasi budidaya yang dimiliki</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jumlah_lokasi', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'unit',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Apakah ukuran masing-masing unit sama  (ya/tdk). Jika ya isi tabel berikut</td>
                                <td>
                                    @foreach ($ukuran_lokasi as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'is_ukuran_sama', 
                                                        $k,
                                                        false,
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
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Panjang bentang</th>
                                    <th>Jarak antar tali bentang</th>
                                    <th>Jumlah bentang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lokasi_budidaya as $id_lokasi_budidaya => $lokasi)
                                    <tr>
                                        <td>{{$lokasi}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'panjang_bentang[' . $id_lokasi_budidaya . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'm',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'jarak_antar_bentang[' . $id_lokasi_budidaya . ']',
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'm',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'jumlah_bentang[' . $id_lokasi_budidaya . ']',
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'kali',
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-hover">
                            <tr>
                                <td>6. Status kepemilikan lahan</td>
                                <td>
                                    @foreach ($status_kepemilikan as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'status_kepemilikan', 
                                                        $k,
                                                        false,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                {{ $v }}
                                                @if ($k == 4)
                                                    {{
                                                        Form::text(
                                                            'status_kepemilikan_lain', 
                                                            '', 
                                                            [
                                                                'class'       => 'form-control',
                                                                'placeholder' => 'Sebutkan',
                                                            ]
                                                        )
                                                    }}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>7. Jenis rumput laut yang Diusahakan</td>
                                <td>
                                    {{
                                        Form::select(
                                            'jenis_rumput_laut[]', 
                                            $jenis_rumput_laut, 
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
                                <td>8. Berapa kali panen yang dapat dilakukan selama satu tahun (nyatakan dalam jumlah)?</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jumlah_panen', 
                                            '', 
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
                        9. Biaya Invetasi (1/2/3/4 Pilih salah satu)
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
                                @foreach ($master_biaya_invest as $id_master_biaya => $item)
                                <tr>
                                    <td> {{$item -> biaya}} </td>
                                    <td> {{$item -> satuan}} </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'volume['. $item -> id_master_biaya .']', 
                                                '', 
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
                                                'harga_satuan['. $item -> id_master_biaya .']', 
                                                '', 
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
                                                'total['. $item -> id_master_biaya .']', 
                                                '', 
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
                        10. Biaya Operasional
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Biaya Operasional</th>
                                    <th>Satuan</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan<br/> (Rp/Unit)</th>
                                    <th>Jumlah Biaya<br/> (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($master_biaya_ops as $id_master_biaya => $item)
                                <tr>
                                    <td> {{$item -> biaya}} </td>
                                    <td> {{$item -> satuan}} </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'volume['. $item -> id_master_biaya .']', 
                                                '', 
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
                                                'harga_satuan['. $item -> id_master_biaya .']', 
                                                '', 
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
                                                'total['. $item -> id_master_biaya .']', 
                                                '', 
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
                                @foreach ($master_biaya_tetap as $id_master_biaya => $item)
                                <tr>
                                    <td> {{$item -> biaya}} </td>
                                    <td> {{$item -> satuan}} </td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'volume['. $item -> id_master_biaya .']', 
                                                '', 
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
                                                'harga_satuan['. $item -> id_master_biaya .']', 
                                                '', 
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
                                                'total['. $item -> id_master_biaya .']', 
                                                '', 
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
                        12. Produksi
                        @foreach ($jenis_musim as $id_musim => $musim)
                            <br>
                            <br>
                            <table class="table table-hover">
                                <tr>
                                    <td>{{$id_musim}}.</td>
                                    <td><b>{{$musim}}</b></td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'musim_panen[]['. $item -> id_master_biaya .']', 
                                                '', 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td>sd</td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'musim['. $item -> id_master_biaya .']', 
                                                '', 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => ''
                                                ]
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>Total Panen</b></td>
                                    <td>
                                        {{  
                                            Form::text(
                                                'musim['. $item -> id_master_biaya .']', 
                                                '', 
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => 'kali/musim'
                                                ]
                                            )
                                        }}
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Biaya Penerimaan</th>
                                        <th>Satuan</th>
                                        <th>Volume</th>
                                        <th>Harga Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kondisi_rumput_laut as $id_kondisi_rumput_laut => $kondisi)
                                        <tr>
                                            <td>{{$id_kondisi_rumput_laut}}</td>
                                            <td>{{$kondisi}}</td>
                                        </tr>
                                        @foreach ($jenis_rumput_laut as $id_rumput_laut => $rumput_laut)
                                            <tr>
                                                <td></td>
                                                <td>{{$id_rumput_laut}}. {{$rumput_laut}}</td>
                                                <td>
                                                    {{  
                                                        Form::text(
                                                            'musim['. $item -> id_master_biaya .']', 
                                                            '', 
                                                            [
                                                                'class'       => 'form-control',
                                                                'placeholder' => 'kali/musim'
                                                            ]
                                                        )
                                                    }}
                                                </td>
                                                <td>
                                                    {{  
                                                        Form::text(
                                                            'musim['. $item -> id_master_biaya .']', 
                                                            '', 
                                                            [
                                                                'class'       => 'form-control',
                                                                'placeholder' => 'kali/musim'
                                                            ]
                                                        )
                                                    }}
                                                </td>
                                                <td>
                                                    {{  
                                                        Form::text(
                                                            'musim['. $item -> id_master_biaya .']', 
                                                            '', 
                                                            [
                                                                'class'       => 'form-control',
                                                                'placeholder' => 'kali/musim'
                                                            ]
                                                        )
                                                    }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>   
                            </table>
                        @endforeach
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