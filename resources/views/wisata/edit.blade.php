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
                                    <td>{{$pertanyaan[1]}}
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[1]', 
                                                    1,
                                                    $motivasi_responden['jawaban'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Wisata Pantai
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[1]', 
                                                    2,
                                                    $motivasi_responden['jawaban'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Wisata Mangrove
                                        </label>
                                    </div>  
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[1]', 
                                                    3,
                                                    $motivasi_responden['jawaban'] == 3,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Snorkling/Diving
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[1]', 
                                                    4,
                                                    $motivasi_responden['jawaban'] == 4,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Pengamatan Flora/Fauna
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[1]', 
                                                    5,
                                                    $motivasi_responden['jawaban'] == 5,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Pendidikan/Penelitian
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[1]', 
                                                    6,
                                                    $motivasi_responden['jawaban'] == 6,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Wisata Alam Perairan lain, sebutkan

                                            {{  
                                                Form::text(
                                                    'jawaban_lain[1]', 
                                                    $motivasi_responden['jawaban_lain'],  
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}                                             
                                        </label>
                                    </div> 
                                    </td>    
                                    <td>{{$pertanyaan[2]}}
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[2]', 
                                                    1,
                                                    $motivasi_responden['jawaban'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Tujuan Utama
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[2]', 
                                                    2,
                                                    $motivasi_responden['jawaban'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Persinggahan
                                        </label>
                                    </div>  
                                    </td>  
                                    <td>{{$pertanyaan[3]}}
                                            {{  
                                                Form::text(
                                                    'jawaban_lain[3]', 
                                                    $motivasi_responden['jawaban_lain'],  
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
                                    <td>{{$pertanyaan[4]}}
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[4]', 
                                                    1,
                                                    $motivasi_responden['jawaban'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Jarak yang dekat
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[4]', 
                                                    2,
                                                    $motivasi_responden['jawaban'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Kemudahan transportasi
                                        </label>
                                    </div>  
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[4]', 
                                                    3,
                                                    $motivasi_responden['jawaban'] == 3,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Biaya yang murah
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[4]', 
                                                    4,
                                                    $motivasi_responden['jawaban'] == 4,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Potensi alamnya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[4]', 
                                                    5,
                                                    $motivasi_responden['jawaban'] == 5,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Lingkungan yang alami
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[4]', 
                                                    6,
                                                    $motivasi_responden['jawaban'] == 6,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Lainnya, sebutkan

                                            {{  
                                                Form::text(
                                                    'jawaban_lain[4]', 
                                                    $motivasi_responden['jawaban_lain'],  
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}                                             
                                        </label>
                                    </div> 
                                    </td>
                                    <td>{{$pertanyaan[5]}}
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[5]', 
                                                    1,
                                                    $motivasi_responden['jawaban'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Media cetak dan Elektronik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[5]', 
                                                    2,
                                                    $motivasi_responden['jawaban'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Teman/Keluarga
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[5]', 
                                                    3,
                                                    $motivasi_responden['jawaban'] == 3,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Organisasi
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[5]', 
                                                    4,
                                                    $motivasi_responden['jawaban'] == 4,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Internet
                                        </label>
                                    </div>                                                                                                            
                                    </td>  
                                    <td>{{$pertanyaan[6]}}
                                            {{  
                                                Form::text(
                                                    'jawaban_lain[6]', 
                                                    $motivasi_responden['jawaban_lain'],  
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}   
                                        <br/>
                                        {{$pertanyaan[7]}}
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[7]', 
                                                    1,
                                                    $motivasi_responden['jawaban'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            1 kali dalam setahun
                                        </label>
                                    </div>                      
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[7]', 
                                                    2,
                                                    $motivasi_responden['jawaban'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            2 kali dalam setahun
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jawaban[7]', 
                                                    3,
                                                    $motivasi_responden['jawaban'] == 3,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Lebih dari 2 kali dalam setahun
                                        </label>
                                    </div>            
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
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'ketersediaan[' . $id_fasilitas_Pendukung . ']' , 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'ketersediaan[' . $id_fasilitas_Pendukung . ']' ,  
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Tidak
                                        </label>
                                    </div>                                         
                                    </td>
                                    <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jumlah[' . $id_fasilitas_Pendukung . ']' ,  
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Memadai
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jumlah[' . $id_fasilitas_Pendukung . ']' , 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Tidak Memadai
                                        </label>
                                    </div>                                     
                                    </td>
                                    <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'kondisi[' . $id_fasilitas_Pendukung . ']' ,  
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Baik
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'kondisi[' . $id_fasilitas_Pendukung . ']' , 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Cukup Baik
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'kondisi[' . $id_fasilitas_Pendukung . ']' , 
                                                    3,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Kurang Baik
                                        </label>
                                    </div>     
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
                                    <td>Dengan siapa datang ke kawasan?
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jenis_rombongan', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Sendirian
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jenis_rombongan', 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Rombongan

                                            {{  
                                                Form::text(
                                                    'jumlah_orang', 
                                                    '', 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}                                              
                                        </label>
                                    </div>                                    
                                    </td>
                                    <td>Penyelenggara menuju kawasan
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'penyelenggara', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Perseorangan
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'penyelenggara', 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Travel Agent
                                        </label>
                                    </div> 
                                    </td>
                                    <td>Jenis Transportasi yang Digunakan:
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jenis_transportasi', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Pribadi
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jenis_transportasi', 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Sewa
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jenis_transportasi', 
                                                    3,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Umum
                                        </label>
                                    </div>                                                                         
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
                                                    'biaya', 
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
                                                    'jumlah', 
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
                                                    'satuan_jumlah', 
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
                                                    'total_biaya', 
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
                    @include('components.form.prev_next_btn')                  
                    {!! Form::close() !!}
                </div>      
            </div>
        </div>
    </div>
</div>
@endsection
