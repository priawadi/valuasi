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
                    {!! Form::open(array('url' => $action, 'class' => 'form-horizontal')) !!}
                        <table class="table table-hover">
                            <tr>
                                <td width="30">1.</td>
                                <td width="400">Apakah Bapak/Ibu/Sdr(i) merupakan nelayan yang melakukan penangkapan ikan di wilayah perairan sekitar?</td>
                                <td>
                                    @foreach ($status_nelayan as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'is_nelayan', 
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
                                <td>2.</td>
                                <td width="400">Lamanya pengalaman usaha sebagai nelayan</td>
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
                                <td>3.</td>
                                <td>Jenis perahu/kapal yang digunakan</td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Ukuran perahu/kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'panjang', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Panjang',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'lebar', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Lebar',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'tinggi', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Tinggi',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Tonase perahu/kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'tonase', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'GT',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>c.  Jumlah perahu/kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jumlah', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'unit',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>d.  Harga beli perahu/kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'harga_beli', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Rp',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>e.  Umur teknis perahu/kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'umur_teknis', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'tahun',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Jenis alat tangkap yang digunakan</td>
                                <td></td>
                            </tr>
                            @foreach ($jenis_alat_tangkap as $id_alat_tangkap => $alat_tangkap)
                            <tr>
                                <td></td>
                                <td>4.{{$id_alat_tangkap}}  {{$alat_tangkap}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a.  Nama alat tangkap</td>
                                <td>
                                    {{
                                        Form::text(
                                            'nama', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Nama',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b.  Ukuran alat tangkap (pxlxt)</td>
                                <td>
                                    {{
                                        Form::text(
                                            'panjang', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Panjang',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'lebar', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Lebar',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'tinggi', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Tinggi',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>c.  Jumlah alat tangkap</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jumlah', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Rp',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'satuan_jumlah', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'satuan',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>d.  Harga beli alat tangkap</td>
                                <td>
                                    {{
                                        Form::text(
                                            'harga_beli', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Rp',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'satuan_harga_beli', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'satuan',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>e.  Umur teknis alat tangkap</td>
                                <td>
                                    {{
                                        Form::text(
                                            'umur_teknis', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'tahun',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>5.</td>
                                <td>Mesin penggerak perahu/kapal</td>
                                <td></td>
                            </tr>
                            @foreach ($jenis_mesin_penggerak as $id_mesin_penggerak => $mesin_penggerak)
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'mesin_penggerak[jenis]', 
                                                        $id_mesin_penggerak,
                                                        false,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                {{ $mesin_penggerak }}
                                            </label>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                @if ($id_mesin_penggerak > 1)
                                    <tr>
                                        <td></td>
                                        <td>a.  Jenis mesin</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'mesin_penggerak[merk]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'merk',
                                                        'maxlength'   => 255
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b.  Kekuatan mesin</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'mesin_penggerak[kekuatan]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'PK',
                                                        'maxlength'   => 255
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>c.  Jumlah mesin</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'mesin_penggerak[jumlah]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'unit',
                                                        'maxlength'   => 255
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>d.  Harga beli mesin</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'mesin_penggerak[harga_beli]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'Rp/unit',
                                                        'maxlength'   => 255
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>e.  Umur teknis mesin</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'mesin_penggerak[umur_teknis]', 
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
                                @endif
                            @endforeach
                        </table>
                        <br>
                        <br>
                        <table class="table table-hover">
                            <tr>
                                <td width="30">6.</td>
                                <td>Alat bantu penangkapan dan peralatan lainnya :</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Alat Bantu</th>
                                    <th>Spesifikasi Ukuran</th>
                                    <th>Satuan</th>
                                    <th>Biaya Pembuatan/Harga Beli per Satuan Unit<br/> (Rp/satuan unit)</th>
                                    <th>Umur Teknis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_alat_bantu_tangkap as $id_jenis_alat_bantu_tangkap => $alat_bantu_tangkap)
                                    <tr>
                                        <td>{{$id_jenis_alat_bantu_tangkap}}</td>
                                        <td>{{$alat_bantu_tangkap}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[spesifikasi_ukuran][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[jumlah][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[satuan_jumlah][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[umur_teknis][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'maxlength'   => 2
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
                                <td width="30">7.</td>
                                <td>Jumlah tenaga penangkap per unit penangkapan </td>
                                <td></td>
                            </tr>
                            @foreach ($jenis_tenaga_kerja as $id_tenaga_kerja => $tenaga_kerja)
                                <tr>
                                    <td></td>
                                    <td width="300">{{$tenaga_kerja}}</td>
                                    <td>
                                        {{
                                            Form::text(
                                                'tenaga_kerja[' . $id_tenaga_kerja . ']', 
                                                '', 
                                                [
                                                    'class'       => 'form-control',
                                                    'maxlength'   => 4,
                                                    'placeholder' => 'orang'
                                                ]
                                            )
                                        }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-hover">
                            <tr>
                                <td width="30">8.</td>
                                <td>Status kepemilikan usaha</td>
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
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td width="30">9.</td>
                                <td width="400">Status/kedudukan Bapak/Ibu/Sdr (i) sekarang</td>
                                <td>
                                    @foreach ($status_kedudukan as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'status_kedudukan', 
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
                                         @if ($k == 4)
                                            {{
                                                Form::text(
                                                    'status_kepemilikan_lain', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => 'Sebutkan'
                                                    ]
                                                )
                                            }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <tr>
                                <td width="30">10.</td>
                                <td>Daerah operasional penangkapan ikan (<em>fishing ground</em>) :</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi Penangkapan</th>
                                    <th>Jarak dr Pantai</th>
                                    <th>Waktu Tempuh</th>
                                    <th>Zona</th>
                                    <th>Bulan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[spesifikasi_ukuran][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[spesifikasi_ukuran][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[jumlah][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[satuan_jumlah][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[umur_teknis][' . $id_jenis_alat_bantu_tangkap . ']', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'maxlength'   => 2
                                                    ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                @endfor
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