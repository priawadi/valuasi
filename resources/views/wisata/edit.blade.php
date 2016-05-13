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
                        <b>B. Target Responden Wisatawan</b><br />  
                        1. Motivasi Responden
                        <table class="table">
                            <thead>
                                <tr>
                                    <td colspan="3">Pertanyaan dan Kode</td>
                                </tr>
                                <tr>
                                    <td>(1)</td>
                                    <td>(2)</td>
                                    <td>(3)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{$pertanyaan[1]}}
                                        @foreach ($opsi_motivasi[1] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jawaban[' . $dt_motivasi_responden[1]['id_motivasi_responden'] . ']', 
                                                            $id_opsi,
                                                            $dt_motivasi_responden[1]['jawaban'] == $id_opsi,
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }} 
                                                    {{$opsi}}
                                                    @if ($id_opsi == 6)
                                                        {{  
                                                            Form::text(
                                                                'jawaban_lain[' . $dt_motivasi_responden[1]['id_motivasi_responden'] . ']', 
                                                                $dt_motivasi_responden[1]['jawaban_lain'], 
                                                                [
                                                                    'class'       => 'form-control',
                                                                    'placeholder' => 'Sebutkan'
                                                                ]
                                                            )
                                                        }}
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach 
                                    </td>    
                                    <td>
                                        {{$pertanyaan[2]}}
                                        @foreach ($opsi_motivasi[2] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jawaban[' . $dt_motivasi_responden[2]['id_motivasi_responden'] . ']', 
                                                            $id_opsi,
                                                            $id_opsi == $dt_motivasi_responden[2]['jawaban'],
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }}
                                                    {{$opsi}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </td>  
                                    <td>{{$pertanyaan[3]}}
                                            {{  
                                                Form::text(
                                                    'jawaban_lain[' . $dt_motivasi_responden[3]['id_motivasi_responden'] . ']', 
                                                    $dt_motivasi_responden[3]['jawaban_lain'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }} 
                                    </td>                                                                                                                                                                                           
                                </tr>
                                <tr>
                                    <td>(4)</td>
                                    <td>(5)</td>
                                    <td>(6)</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{$pertanyaan[4]}}
                                        @foreach ($opsi_motivasi[4] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jawaban[' . $dt_motivasi_responden[4]['id_motivasi_responden'] . ']', 
                                                            $id_opsi,
                                                            $id_opsi == $dt_motivasi_responden[4]['jawaban'],
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }}
                                                    {{$opsi}}
                                                    @if ($id_opsi == 6)
                                                        {{  
                                                            Form::text(
                                                                'jawaban_lain[' . $dt_motivasi_responden[4]['id_motivasi_responden'] . ']', 
                                                                $dt_motivasi_responden[4]['jawaban_lain'], 
                                                                [
                                                                    'class'       => 'form-control',
                                                                    'placeholder' => 'Sebutkan'
                                                                ]
                                                            )
                                                        }}
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach 
                                    </td>
                                    <td>
                                        {{$pertanyaan[5]}}
                                        @foreach ($opsi_motivasi[5] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jawaban[' . $dt_motivasi_responden[5]['id_motivasi_responden'] . ']', 
                                                            $id_opsi,
                                                            $id_opsi == $dt_motivasi_responden[5]['jawaban'],
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }}
                                                    {{$opsi}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>                                                                                                            
                                    </td>  
                                    <td>{{$pertanyaan[6]}}
                                            {{  
                                                Form::text(
                                                    'jawaban_lain[' . $dt_motivasi_responden[6]['id_motivasi_responden'] . ']', 
                                                    $dt_motivasi_responden[6]['jawaban_lain'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}   
                                        <br/>
                                        {{$pertanyaan[7]}}
                                        @foreach ($opsi_motivasi[6] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jawaban[' . $dt_motivasi_responden[7]['id_motivasi_responden'] . ']', 
                                                            $id_opsi,
                                                            $id_opsi == $dt_motivasi_responden[7]['jawaban'],
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }}
                                                    {{$opsi}}
                                                </label>
                                            </div>
                                        @endforeach      
                                    </td>                                                                                                           
                                </tr>                                
                            </tbody>
                        </table>
                        2. Persepsi Responden Terhadap Kondisi Fasilitas Pendukung Wisata
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Fasilitas Pendukung Wisata</td>
                                    <td>(1)<br/>Ketersediaan</td>
                                    <td>(2)<br/>Jumlah</td>
                                    <td>(3)<br/>Kondisi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fasilitas_pendukung as $id_fasilitas_Pendukung => $item)
                                <tr>
                                    <td>{{$item -> fasilitas_pendukung}}</td>
                                    @if($item -> is_pertanyaan == 1)
                                        <td>        
                                            @foreach ($opsi_fasilitas['ketersediaan'] as $id_opsi => $opsi)
                                                <div class="radio">
                                                    <label>
                                                        {{
                                                            Form::radio(
                                                                'persepsi_responden[ketersediaan][' . $dt_persepsi_responden[$item->id_fasilitas_pendukung]['id_persepsi_responden'] . ']' , 
                                                                $id_opsi,
                                                                $dt_persepsi_responden[$item->id_fasilitas_pendukung]['ketersediaan'] == $id_opsi,
                                                                [
                                                                    'class' => 'control-label'
                                                                ]
                                                            )
                                                        }} 
                                                        {{$opsi}}
                                                    </label>
                                                </div>
                                            @endforeach                                         
                                        </td>
                                        <td>
                                            @foreach ($opsi_fasilitas['jumlah'] as $id_opsi => $opsi)
                                                <div class="radio">
                                                    <label>
                                                        {{
                                                            Form::radio(
                                                                'persepsi_responden[jumlah][' . $dt_persepsi_responden[$item->id_fasilitas_pendukung]['id_persepsi_responden'] . ']' , 
                                                                $id_opsi,
                                                                $dt_persepsi_responden[$item->id_fasilitas_pendukung]['jumlah'] == $id_opsi,
                                                                [
                                                                    'class' => 'control-label'
                                                                ]
                                                            )
                                                        }} 
                                                        {{$opsi}}
                                                    </label>
                                                </div>
                                            @endforeach                             
                                        </td>
                                        <td>
                                            @foreach ($opsi_fasilitas['kondisi'] as $id_opsi => $opsi)
                                                <div class="radio">
                                                    <label>
                                                        {{
                                                            Form::radio(
                                                                'persepsi_responden[kondisi][' . $dt_persepsi_responden[$item->id_fasilitas_pendukung]['id_persepsi_responden'] . ']' , 
                                                                $id_opsi,
                                                                $dt_persepsi_responden[$item->id_fasilitas_pendukung]['kondisi'] == $id_opsi,
                                                                [
                                                                    'class' => 'control-label'
                                                                ]
                                                            )
                                                        }} 
                                                        {{$opsi}}
                                                    </label>
                                                </div>
                                            @endforeach 
                                        </td>
                                    @else
                                        <td></td><td></td><td></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        3. Informasi Biaya Perjalanan Menuju Kawasan
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>(1)</td>
                                    <td>(2)</td>
                                    <td>(3)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Dengan siapa datang ke kawasan?
                                        @foreach ($opsi_perjalanan[1] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jenis_rombongan', 
                                                            $id_opsi,
                                                            $dt_biaya_perjalanan['jenis_rombongan'] == $id_opsi,
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }} 
                                                    {{$opsi}}
                                                    @if ($id_opsi == 2)
                                                        {{  
                                                            Form::text(
                                                                'jumlah_orang', 
                                                                $dt_biaya_perjalanan['jumlah_orang'], 
                                                                [
                                                                    'class'       => 'form-control',
                                                                    'placeholder' => ''
                                                                ]
                                                            )
                                                        }}
                                                    @endif
                                                </label>
                                            </div> 
                                        @endforeach                          
                                    </td>
                                    <td>
                                        Penyelenggara menuju kawasan
                                        @foreach ($opsi_perjalanan[2] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'penyelenggara', 
                                                            $id_opsi,
                                                            $dt_biaya_perjalanan['penyelenggara'] == $id_opsi,
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }} 
                                                    {{$opsi}}
                                                </label>
                                            </div> 
                                        @endforeach 
                                    </td>
                                    <td>
                                        Jenis Transportasi yang Digunakan:
                                        @foreach ($opsi_perjalanan[1] as $id_opsi => $opsi)
                                            <div class="radio">
                                                <label>
                                                    {{
                                                        Form::radio(
                                                            'jenis_transportasi', 
                                                            $id_opsi,
                                                            $dt_biaya_perjalanan['jenis_transportasi'] == $id_opsi,
                                                            [
                                                                'class' => 'control-label'
                                                            ]
                                                        )
                                                    }} 
                                                    {{$opsi}}
                                                </label>
                                            </div> 
                                        @endforeach                                                                         
                                    </td>
                                </tr>
                            </tbody>                            
                        </table>
                        4. Informasi Biaya Wisata
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Jenis Pengeluaran</td>
                                    <td>Biaya (Rp/Orang/Hari)</td>
                                    <td>Jumlah</td>
                                    <td>Satuan</td>
                                    <td>Total Biaya(Rp/Org)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_pengeluaran as $k => $v)
                                <tr>                                    
                                    <td>{{ $v }}</td>
                                    <td>
                                            {{  
                                                Form::text(
                                                    'biaya_wisata[biaya][' . $dt_biaya_wisata[$k]['id_biaya_wisata'] . ']', 
                                                    $dt_biaya_wisata[$k]['biaya'], 
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
                                                    'biaya_wisata[jumlah][' . $dt_biaya_wisata[$k]['id_biaya_wisata'] . ']', 
                                                    $dt_biaya_wisata[$k]['jumlah'], 
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
                                                    'biaya_wisata[satuan_jumlah][' . $dt_biaya_wisata[$k]['id_biaya_wisata'] . ']', 
                                                    $dt_biaya_wisata[$k]['satuan_jumlah'], 
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
                                                    'biaya_wisata[total][' . $dt_biaya_wisata[$k]['id_biaya_wisata'] . ']', 
                                                    $dt_biaya_wisata[$k]['total'], 
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
                    @include('components.form.prev_next_btn')                  
                    {!! Form::close() !!}
                </div>      
            </div>
        </div>
    </div>
</div>
@endsection
