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
                        <table class="table">
                            <thead>
                                <tr>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. Apakah Bapak/Ibu/Sdr(i) benar pencari satwa dari ekosistem mangrove?
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'pencari_satwa_mgv', 
                                                    1,
                                                    $dt_pencari_satwa['pencari_satwa_mgv'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Benar
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'pencari_satwa_mgv', 
                                                    2,
                                                    $dt_pencari_satwa['pencari_satwa_mgv'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Tidak
                                        </label>
                                    </div>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. Lamanya pengalaman usaha:
                                        <label>
                                        {{  
                                            Form::text(
                                                'pengalaman_usaha', 
                                                $dt_pencari_satwa['pengalaman_usaha'],
                                                [
                                                    'class'       => 'form-control',
                                                    'placeholder' => 'tahun'
                                                ]
                                            )
                                        }}
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3. Apabila benar, jenis satwa apa saja yang Bapak/Ibu/Sdr(i) biasanya peroleh ?
                                    <br>
                                        {{
                                            Form::select(
                                                'jenis_satwa[]', 
                                                $jenis_satwa, 
                                                $selected_jenis_satwa, 
                                                [
                                                    'class'    => 'form-control',
                                                    'multiple' => 'multiple',
                                                    'id'       => 'jenis-satwa'
                                                ]
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>4. Seberapa sering Bapak/Ibu/Saudara(i) melakukan pemburuan satwa ?
                                    @foreach ($master_lama_buru as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'lama_buru', 
                                                        $k,
                                                        $k == $dt_pencari_satwa['lama_buru'],
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                {{$v}}
                                                @if ($k == 7)
                                                    {{  
                                                        Form::text(
                                                            'lama_buru_txt', 
                                                            $dt_pencari_satwa['lama_buru_txt'], 
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
                                </tr>
                                <tr>
                                    <td>5. Dalam satu tahun berapa kali Bapak/Ibu/Sdr(i) melakukan operasi perburuan satwa? 
                                    @foreach ($master_setahun_buru as $k => $v)
                                        <div class="radio">
                                            <label>
                                                {{
                                                    Form::radio(
                                                        'setahun_buru', 
                                                        $k,
                                                        $k == $dt_pencari_satwa['setahun_buru'],
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                {{$v}}
                                                @if ($k == 5)
                                                    {{  
                                                        Form::text(
                                                            'setahun_buru_txt', 
                                                            $dt_pencari_satwa['setahun_buru_txt'], 
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
                                </tr>
                            </tbody>
                        </table>
                        6. Besaran hasil penerimaan untuk satu kali pencarian satwa: 
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Jenis Satwa yang Diperoleh</td>
                                    <td>Rata-rata Jumlah Satwa yang Diperoleh<br/>untuk setiap satu kali operasi<br/>pencarian satwa</td>
                                    <td>Satuan</td>
                                    <td>Harga Jual Satwa <br/> (Rp/Satuan)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil_satwa as $id_master_pencari_satwa => $item)
                                <tr>
                                    <td>{{$item -> rincian}}</td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'hasil_satwa[jumlah_satwa]['. $dt_hasil_satwa[$item -> id_master_pencari_satwa]['id_hasil_satwa'] .']',
                                                    $dt_hasil_satwa[$item -> id_master_pencari_satwa]['jumlah_satwa'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>                                            
                                    </td>
                                    <td>{{$item -> satuan}}</td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'hasil_satwa[harga_jual]['. $dt_hasil_satwa[$item -> id_master_pencari_satwa]['id_hasil_satwa'] .']', 
                                                    $dt_hasil_satwa[$item -> id_master_pencari_satwa]['harga_jual'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        7. Biaya investasi untuk melakukan pencarian satwa:
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Jenis Peralatan yang Digunakan</td>
                                    <td>Volume</td>
                                    <td>Satuan</td>
                                    <td>Harga Beli <br/> (Rp/Satuan)</td>
                                    <td>Umur Ekonomis (Tahun)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya_satwa as $id_master_pencari_satwa => $item)
                                <tr>
                                    <td>{{$item -> rincian}}</td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'biaya_satwa[volume]['. $dt_biaya_satwa[$item -> id_master_pencari_satwa]['id_biaya_satwa'] .']',
                                                    $dt_biaya_satwa[$item -> id_master_pencari_satwa]['volume'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
                                    </td>
                                    <td>{{$item -> satuan}}</td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'biaya_satwa[harga_beli]['. $dt_biaya_satwa[$item -> id_master_pencari_satwa]['id_biaya_satwa'] .']', 
                                                    $dt_biaya_satwa[$item -> id_master_pencari_satwa]['harga_beli'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'biaya_satwa[umur_ekonomis]['. $dt_biaya_satwa[$item -> id_master_pencari_satwa]['id_biaya_satwa'] .']', 
                                                    $dt_biaya_satwa[$item -> id_master_pencari_satwa]['umur_ekonomis'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        8. Biaya operasional yang dikeluarkan untuk satu kali operasi pencarian satwa:
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Komponen Biaya</td>
                                    <td>Volume</td>
                                    <td>Satuan</td>
                                    <td>Harga Satuan (Rp)</td>
                                    <td>Jumlah Biaya (Rp)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ops_satwa as $id_master_pencari_satwa => $item)
                                <tr>
                                    <td>{{$item -> rincian}}</td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'ops_satwa[volume]['. $dt_ops_satwa[$item -> id_master_pencari_satwa]['id_ops_satwa'] .']',
                                                    $dt_ops_satwa[$item -> id_master_pencari_satwa]['volume'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
                                    </td>
                                    <td>{{$item -> satuan}}</td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'ops_satwa[harga_satuan]['. $dt_ops_satwa[$item -> id_master_pencari_satwa]['id_ops_satwa'] .']', 
                                                    $dt_ops_satwa[$item -> id_master_pencari_satwa]['harga_satuan'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            {{  
                                                Form::text(
                                                    'ops_satwa[jumlah]['. $dt_ops_satwa[$item -> id_master_pencari_satwa]['id_ops_satwa'] .']', 
                                                    $dt_ops_satwa[$item -> id_master_pencari_satwa]['jumlah'], 
                                                    [
                                                        'class'       => 'form-control',
                                                        'placeholder' => ''
                                                    ]
                                                )
                                            }}  
                                        </label>
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
        $('#jenis-satwa').multiselect();
    });
</script>
@endsection
