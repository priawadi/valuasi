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
                                                        $k == $nelayan['is_nelayan'],
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
                                            $nelayan['lama_usaha'], 
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
                                            'perahu[panjang]', 
                                            $perahu['panjang'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Panjang',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'perahu[lebar]', 
                                            $perahu['lebar'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Lebar',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'perahu[tinggi]', 
                                            $perahu['tinggi'], 
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
                                            'perahu[tonase]', 
                                            $perahu['tonase'], 
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
                                            'perahu[jumlah]', 
                                            $perahu['jumlah'], 
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
                                            'perahu[harga_beli]', 
                                            $perahu['harga_beli'], 
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
                                            'perahu[umur_teknis]', 
                                            $perahu['umur_teknis'], 
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
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][nama]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['nama'], 
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
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][panjang]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['panjang'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Panjang',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][lebar]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['lebar'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Lebar',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][tinggi]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['tinggi'], 
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
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][jumlah]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['jumlah'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Rp',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][satuan_jumlah]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['satuan_jumlah'], 
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
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][harga_beli]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['harga_beli'], 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Rp',
                                                'maxlength'   => 255
                                            ]
                                        )
                                    }}
                                    {{
                                        Form::text(
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][satuan_harga_beli]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['satuan_harga_beli'], 
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
                                            'alat_tangkap[' . $dt_alat_tangkap[$id_alat_tangkap]['id_alat_tangkap'] . '][umur_teknis]', 
                                            $dt_alat_tangkap[$id_alat_tangkap]['umur_teknis'], 
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
                                                        $id_mesin_penggerak == $dt_mesin_penggerak['jenis'],
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
                                                    'mesin_penggerak[' . $id_mesin_penggerak . '][merk]', 
                                                    $id_mesin_penggerak == $dt_mesin_penggerak['jenis']? $dt_mesin_penggerak['merk']: '', 
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
                                                    'mesin_penggerak[' . $id_mesin_penggerak . '][kekuatan]', 
                                                    $id_mesin_penggerak == $dt_mesin_penggerak['jenis']? $dt_mesin_penggerak['kekuatan']: '', 
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
                                                    'mesin_penggerak[' . $id_mesin_penggerak . '][jumlah]', 
                                                    $id_mesin_penggerak == $dt_mesin_penggerak['jenis']? $dt_mesin_penggerak['jumlah']: '', 
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
                                                    'mesin_penggerak[' . $id_mesin_penggerak . '][harga_beli]', 
                                                    $id_mesin_penggerak == $dt_mesin_penggerak['jenis']? $dt_mesin_penggerak['harga_beli']: '', 
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
                                                    'mesin_penggerak[' . $id_mesin_penggerak . '][umur_teknis]', 
                                                    $id_mesin_penggerak == $dt_mesin_penggerak['jenis']? $dt_mesin_penggerak['umur_teknis']: '', 
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
                                    <th>Jumlah Satuan</th>
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
                                                    'alat_bantu_tangkap[' . $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['id_alat_bantu_tangkap'] . '][spesifikasi_ukuran]', 
                                                    $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['spesifikasi_ukuran'],
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[' . $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['id_alat_bantu_tangkap'] . '][jumlah]', 
                                                    $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['jumlah'],
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[' . $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['id_alat_bantu_tangkap'] . '][satuan_jumlah]', 
                                                    $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['satuan_jumlah'], 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[' . $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['id_alat_bantu_tangkap'] . '][harga_beli]', 
                                                    $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['harga_beli'],
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'alat_bantu_tangkap[' . $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['id_alat_bantu_tangkap'] . '][umur_teknis]', 
                                                    $dt_alat_bantu_tangkap[$id_jenis_alat_bantu_tangkap]['umur_teknis'],
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
                                                'tenaga_kerja[' . $dt_tenaga_kerja[$id_tenaga_kerja]['id_tenaga_kerja'] . '][jumlah]', 
                                                $dt_tenaga_kerja[$id_tenaga_kerja]['jumlah'],
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
                                                        $k == $nelayan['status_kepemilikan'],
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
                                                        $k == $nelayan['status_kedudukan'],
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
                                                    'status_kedudukan_lain', 
                                                    $nelayan['status_kedudukan_lain'], 
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
                                @foreach ($dt_daerah_ops as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'daerah_operasional[lokasi][' . $item['id_daerah_operasional'] . ']', 
                                                    $item['lokasi'], 
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'daerah_operasional[jarak_dr_pantai][' . $item['id_daerah_operasional'] . ']', 
                                                    $item['jarak_dr_pantai'],
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'daerah_operasional[waktu_tempuh][' . $item['id_daerah_operasional'] . ']', 
                                                    $item['waktu_tempuh'],
                                                    [
                                                        'class'       => 'form-control',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::select(
                                                    'daerah_operasional[zona][' . $item['id_daerah_operasional'] . ']', 
                                                    $zona_ops, 
                                                    $item['zona'],
                                                    [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Pilih'
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'daerah_operasional[bulan][' . $item['id_daerah_operasional'] . ']', 
                                                    $item['bulan'],
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
                                <td width="30">11.</td>
                                <td width="300">Jumlah hari penangkapan ikan untuk satu kali trip operasi</td>
                                <td>
                                    {{
                                        Form::text(
                                            'penangkapan[jumlah_hari]', 
                                            $dt_penangkapan['jumlah_hari'], 
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
                                            'penangkapan[rata_jumlah]', 
                                            $dt_penangkapan['rata_jumlah'],  
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
                                            'penangkapan[jumlah_bulan_tdk_tangkap]', 
                                            $dt_penangkapan['jumlah_bulan_tdk_tangkap'],  
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
                                        Form::select(
                                             'penangkapan[bulan_tdk_tangkap][]', 
                                            $bulan, 
                                            $selected_bulan_penangkapan, 
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
                                                    Form::select(
                                                        'musim_tangkap[' . $dt_musim_tangkap[$id_jenis_ikan]['id_musim_tangkap'] . '][bulan' . $i . ']', 
                                                        $musim, 
                                                        $dt_musim_tangkap[$id_jenis_ikan]['bulan' . $i], 
                                                        [
                                                            'class'       => 'form-control',
                                                            'placeholder' => 'Pilih'
                                                        ]
                                                    )
                                                }}
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                                    'penangkapan[penanganan_ikan]', 
                                                    $id_penanganan_ikan,
                                                    $dt_penangkapan['penanganan_ikan'] == $id_penanganan_ikan,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            {{ $penanganan }}
                                            @if ($id_penanganan_ikan == 4)
                                            {{
                                                Form::text(
                                                    'penangkapan[penanganan_ikan_lain]', 
                                                    $dt_penangkapan['penanganan_ikan'] == $id_penanganan_ikan? $dt_penangkapan['penanganan_ikan_lain']: '',
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => 'Sebutkan',
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
                                                    'hasil_tangkap[' . $dt_hasil_tangkap[$id_jenis_ikan]['id_hasil_tangkap'] . '][produksi_musim_puncak]', 
                                                    $dt_hasil_tangkap[$id_jenis_ikan]['produksi_musim_puncak'], 
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
                                                    'hasil_tangkap[' . $dt_hasil_tangkap[$id_jenis_ikan]['id_hasil_tangkap'] . '][produksi_musim_sedang]', 
                                                    $dt_hasil_tangkap[$id_jenis_ikan]['produksi_musim_sedang'], 
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
                                                    'hasil_tangkap[' . $dt_hasil_tangkap[$id_jenis_ikan]['id_hasil_tangkap'] . '][produksi_musim_paceklik]', 
                                                    $dt_hasil_tangkap[$id_jenis_ikan]['produksi_musim_paceklik'],
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
                                            'penangkapan[bagi_hasil_pemilik]', 
                                            $dt_penangkapan['bagi_hasil_pemilik'], 
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
                                            'penangkapan[bagi_hasil_awak]', 
                                            $dt_penangkapan['bagi_hasil_awak'], 
                                            [
                                                'class'       => 'form-control col-sm-4',
                                                'placeholder' => 'bagian',
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>18.</td>
                                <td>Biaya operasional per trip penangkapan ikan :</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Komponen</th>
                                    <th>Jumlah</th>
                                    <th>Satuan Unit</th>
                                    <th>Harga Satuan</th>
                                    <th>Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($master_biaya_ops as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}.</td>
                                        <td>{{$item->biaya}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'biaya_ops[jumlah][' . $dt_ops_nelayan[$item->id_master_biaya]['id_ops_nelayan'] . ']', 
                                                    $dt_ops_nelayan[$item->id_master_biaya]['jumlah'], 
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => '',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>{{$item->satuan}}</td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'biaya_ops[harga_satuan][' . $dt_ops_nelayan[$item->id_master_biaya]['id_ops_nelayan'] . ']', 
                                                    $dt_ops_nelayan[$item->id_master_biaya]['harga_satuan'], 
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => 'Rp/satuan',
                                                    ]
                                                )
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                Form::text(
                                                    'biaya_ops[total_biaya][' . $dt_ops_nelayan[$item->id_master_biaya]['id_ops_nelayan'] . ']', 
                                                    $dt_ops_nelayan[$item->id_master_biaya]['total_biaya'], 
                                                    [
                                                        'class'       => 'form-control col-sm-4',
                                                        'placeholder' => 'Rp',
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
                                            'biaya_perawatan[' . $dt_biaya_perawatan[$id_biaya_perawatan]['id_biaya_perawatan'] . ']', 
                                            $dt_biaya_perawatan[$id_biaya_perawatan]['biaya'], 
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