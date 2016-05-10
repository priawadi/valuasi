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
                            @foreach ($master_kayu as $id_master_kayu => $item)
                            <tr>
                                <td>{{$item -> rincian}}</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'satuan['. $item -> id_master_kayu .']', 
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
                                            'produksi['. $item -> id_master_kayu .']', 
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
                                            'harga['. $item -> id_master_kayu .']', 
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
                                            'nilai_prod['. $item -> id_master_kayu .']', 
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
                            @foreach ($master_kayu_ops as $id_master_kayu => $item)
                            <tr>
                                <td>{{$item -> rincian}}</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'biaya['. $item -> id_master_kayu .']', 
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
                                            'jumlah['. $item -> id_master_kayu .']', 
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
                                            'total_biaya['. $item -> id_master_kayu .']', 
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
                            @foreach ($master_kayu_non as $id_master_kayu => $item)
                            <tr>
                                <td>{{$item -> rincian}}</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'satuan['. $item -> id_master_kayu .']', 
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
                                            'jumlah['. $item -> id_master_kayu .']', 
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
                                            'harga['. $item -> id_master_kayu .']', 
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
                                            'nilai_manfaat['. $item -> id_master_kayu .']', 
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

                    <div class="col-md-10 col-md-offset-1">
                      <button type="submit" class="btn btn-primary col-md-offset-11">Simpan</button>
                      <br><br><br>
                    </div>                    
                    {!! Form::close() !!}
                </div>      
            </div>
        </div>
    </div>
</div>
@endsection
