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
                        <table class="table table-hover">
                            <tr>
                                <td width="30">11.</td>
                                <td width="300">Jumlah hari penangkapan ikan untuk satu kali trip operasi</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jumlah_hari', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'hari'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td width="30">12.</td>
                                <td>Rata-rata jumlah trip operasi penangkapan ikan </td>
                                <td>
                                    {{
                                        Form::text(
                                            'rata_jumlah', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'hari'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td width="30">13.</td>
                                <td>Bulan tidak ke laut dalam satu tahun</td>
                                <td>
                                    {{
                                        Form::text(
                                            'jumlah_bulan_tdk_tangkap', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'bulan'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td>yaitu pada bulan:</td>
                                <td>
                                    {{
                                        Form::text(
                                            'bulan_tdk_tangkap', 
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
                                <td width="30">14.</td>
                                <td>Musim penangkapan ikan</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Jenis Ikan</th>
                                    <th colspan="12"><center>Bulan</center></th>
                                </tr>
                                <tr>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <th><center>{{$i}}</center></th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_ikan as $id_jenis_ikan => $ikan)
                                    <tr>
                                        <td>{{$id_jenis_ikan}}.</td>
                                        <td>{{$ikan}}</td>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <td>
                                                {{
                                                    Form::text(
                                                        'musim_tangkap[' . $id_jenis_ikan . '][bulan' . $i . ']', 
                                                        '', 
                                                        [
                                                            'class'     => 'form-control',
                                                            'maxlength' => '1'
                                                        ]
                                                    )
                                                }}
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        Ket:
                        <br>
                        a = musim puncak <br> 
                        b = musim sedang <br>
                        c = musim paceklik <br>
                        <table class="table table-hover">
                            <tr>
                                <td width="30">15.</td>
                                <td>Penanganan ikan di atas kapal:</td>
                            </tr>
                            @foreach ($penanganan_ikan as $id_penanganan_ikan => $penanganan)
                            <tr>
                                <td></td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'penanganan_ikan', 
                                                    $id_penanganan_ikan,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            {{ $penanganan }}
                                            @if ($id_penanganan_ikan == 4)
                                            {{
                                                Form::text(
                                                    'penanganan_lain', 
                                                    '', 
                                                    [
                                                        'class'     => 'form-control col-sm-4',
                                                    ]
                                                )
                                            }}
                                            @endif
                                        </label>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>16.</td>
                                <td>
                                    Hasil tangkapan <br>
                                    Sebutkan rata-rata hasil tangkapan berdasarkan musim sebagaimana tabel berikut
                                </td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Jenis Ikan</th>
                                    <th colspan="3"><center>Produksi</center></th>
                                </tr>
                                <tr>
                                    <th><center>Musim Puncak</center></th>
                                    <th><center>Musim Sedang</center></th>
                                    <th><center>Musim Paceklik</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_ikan as $id_jenis_ikan => $ikan)
                                    <tr>
                                        <td>{{$id_jenis_ikan}}.</td>
                                        <td>{{$ikan}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'hasil_tangkap[' . $id_jenis_ikan . '][produksi_musim_puncak]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => 'Kg/trip',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'hasil_tangkap[' . $id_jenis_ikan . '][produksi_musim_sedang]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => 'Kg/trip',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'hasil_tangkap[' . $id_jenis_ikan . '][produksi_musim_paceklik]', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => 'Kg/trip',
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
                                <td width="30">17.</td>
                                <td width="300">Sistem bagi hasil antara pemilik dengan awak kapal:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Pemilik Kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'bagi_hasil_pemilik', 
                                            '', 
                                            [
                                                'class'       => 'form-control col-sm-4',
                                                'placeholder' => 'bagian',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Awak Kapal</td>
                                <td>
                                    {{
                                        Form::text(
                                            'bagi_hasil_awak', 
                                            '', 
                                            [
                                                'class'       => 'form-control col-sm-4',
                                                'placeholder' => 'bagian',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <tr>
                                <td width="30">19.</td>
                                <td width="300">Biaya Perawatan</td>
                                <td></td>
                            </tr>
                            @foreach ($master_biaya_perawatan as $id_biaya_perawatan => $biaya_perawatan)
                            <tr>
                                <td></td>
                                <td>{{$id_biaya_perawatan}}. {{$biaya_perawatan}}</td>
                                <td>
                                    {{
                                        Form::text(
                                            'biaya_perawatan[' . $id_biaya_perawatan . ']', 
                                            '', 
                                            [
                                                'class'       => 'form-control col-sm-4',
                                                'placeholder' => 'Rp/tahun',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            @endforeach
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