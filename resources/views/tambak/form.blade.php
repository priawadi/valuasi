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
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="400"></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Lama usaha di Tambak?</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'lama_tambak', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'tahun'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>2. Status Usaha</td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'status_tambak', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Pemilik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'status_tambak', 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Penggarap
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'status_tambak', 
                                                    3,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Penyewa
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3. Mata pencaharian sebelum menjadi petambak </td>
                                <td>
                                    {{  
                                        Form::text(
                                            'mapen_sblm_tambak', 
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
                                <td>4. Luas Tambak</td>
                                <td> 
                                    {{  
                                        Form::text(
                                            'luas_tambak', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'Ha'
                                            ]
                                        )
                                    }}                                    
                                </td>
                            </tr> 
                            <tr>
                                <td>5. Status Kepemilikan Tambak</td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'status_kepem_tambak', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Milik Sendiri
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'status_kepem_tambak', 
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
                                                    'status_kepem_tambak', 
                                                    3,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Bagi Hasil
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6. Jenis Komoditas yang Diusahakan</td>
                                <td>
                                    {{
                                        Form::select(
                                            'jenis_komoditas_tambak[]', 
                                            $jenis_komoditas_tambak, 
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
                                            'waktu_pemeliharaan_tambak', 
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
                                <td>8. Jumlah Siklus/Panen per-Tahun</td>
                                <td>
                                    {{  
                                        Form::text(
                                            'jum_panen_tambak', 
                                            '', 
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'kali'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr> 
                            <tr>
                                <td>9. Biaya Investasi</td>
                                <td></td>
                            </tr>                                                   
                        </tbody>
                    </table>

                    <table class="table">
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
                            @foreach ($master_biaya as $id_master_biaya => $item)
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

                    <table class="table">
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
                            @foreach ($master_biaya_var as $id_master_biaya => $item)
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

                    <table class="table">
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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Jenis komoditas</th>
                                <th>Satuan</th>
                                <th>Jumlah Produksi</th>
                                <th>Harga Jual<br/> (Rp/Kg)</th>
                                <th>Jumlah Penerimaan<br/> (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasil_panen as $id_hasil_panen => $item)
                            <tr>
                                <td> {{$item -> komoditas}} </td>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#jenis-komoditas').multiselect();
    });
</script>
@endsection
