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
                                                    false,
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
                                </tr>
                                <tr>
                                    <td>2. Lamanya pengalaman usaha:
                                        <label>
                                        {{  
                                            Form::text(
                                                'pengalaman_usaha', 
                                                '', 
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
                                                [], 
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
                                                        false,
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
                                                            '', 
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
                                                        false,
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
                                                            '', 
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
                                                    'jumlah_satwa['. $item -> id_master_pencari_satwa .']',
                                                    '', 
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
                                                    'harga_jual['. $item -> id_master_pencari_satwa .']', 
                                                    '', 
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
                                                    'volume['. $item -> id_master_pencari_satwa .']',
                                                    '', 
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
                                                    'harga_beli['. $item -> id_master_pencari_satwa .']', 
                                                    '', 
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
                                                    'umur_ekonomis['. $item -> id_master_pencari_satwa .']', 
                                                    '', 
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
                                                    'volume['. $item -> id_master_pencari_satwa .']',
                                                    '', 
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
                                                    'harga_satuan['. $item -> id_master_pencari_satwa .']', 
                                                    '', 
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
                                                    'jumlah['. $item -> id_master_pencari_satwa .']', 
                                                    '', 
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
