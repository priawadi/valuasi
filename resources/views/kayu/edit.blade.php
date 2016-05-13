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
                    <b>A. Penggunaan komersil</b> <br/>
                    1. Produksi
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Jenis Pemanfaatan</td>
                                <td>Satuan</td>
                                <td>Produksi Pertahun</td>
                                <td>Harga (Rp)</td>
                                <td>Nilai Produksi <br> (Rp/Tahun)</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($master_kayu as $idx => $item)
                            <tr>
                                <td>{{$item['rincian']}}</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'satuan[' . $kayuprod[$item->id_master_kayu]['id_kayu_prod'] . ']',
                                            $kayuprod[$item->id_master_kayu]['satuan'],
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
                                            'produksi[' . $kayuprod[$item->id_master_kayu]['id_kayu_prod'] . ']',
                                            $kayuprod[$item->id_master_kayu]['produksi'],
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
                                            'harga[' . $kayuprod[$item->id_master_kayu]['id_kayu_prod'] . ']',
                                            $kayuprod[$item->id_master_kayu]['harga'],
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
                                            'nilai_prod[' . $kayuprod[$item->id_master_kayu]['id_kayu_prod'] . ']',
                                            $kayuprod[$item->id_master_kayu]['nilai_prod'],
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
                    2. Biaya Operasional
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Uraian Biaya</td>
                                <td>Biaya Satuan</td>
                                <td>Jumlah</td>
                                <td>Total Biaya</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($master_kayu_ops as $idx => $item)
                            <tr>
                                <td>{{$item -> rincian}}</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'biaya[' . $kayuops[$item->id_master_kayu]['id_kayu_ops'] . ']', 
                                            $kayuops[$item->id_master_kayu]['biaya'],
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
                                            'jumlah[' . $kayuops[$item->id_master_kayu]['id_kayu_ops'] . ']', 
                                            $kayuops[$item->id_master_kayu]['jumlah'],
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
                                            'total_biaya[' . $kayuops[$item->id_master_kayu]['id_kayu_ops'] . ']', 
                                            $kayuops[$item->id_master_kayu]['total_biaya'],
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
                    <b>B. Penggunaan Non komersil</b>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Jenis Pemanfaatan</td>
                                <td>Satuan</td>
                                <td>Jumlah Pemanfaatan Pertahun</td>
                                <td>Harga Bayangan<br/> Harga Barang Pengganti</td>
                                <td>Nilai Manfaat<br/> (Rp/Tahun)</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($master_kayu_non as $idx => $item)
                            <tr>
                                <td>{{$item -> rincian}}</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'satuan[' . $kayunon[$item->id_master_kayu]['id_kayu_nonkomersil'] . ']', 
                                            $kayunon[$item->id_master_kayu]['satuan'], 
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
                                            'jumlah[' . $kayunon[$item->id_master_kayu]['id_kayu_nonkomersil'] . ']', 
                                            $kayunon[$item->id_master_kayu]['jumlah'],
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
                                            'harga[' . $kayunon[$item->id_master_kayu]['id_kayu_nonkomersil'] . ']', 
                                            $kayunon[$item->id_master_kayu]['harga'],
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
                                            'nilai_manfaat[' . $kayunon[$item->id_master_kayu]['id_kayu_nonkomersil'] . ']', 
                                            $kayunon[$item->id_master_kayu]['nilai_manfaat'],
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
