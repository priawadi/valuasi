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
                                        <div class="checkbox">
                                            <label>
                                                {{
                                                    Form::checkbox(
                                                        'jenis_satwa', 
                                                        1,
                                                        false,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                Kelelawar
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                {{
                                                    Form::checkbox(
                                                        'jenis_satwa', 
                                                        2,
                                                        false,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                Ular
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                {{
                                                    Form::checkbox(
                                                        'jenis_satwa', 
                                                        3,
                                                        false,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                Burung
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                {{
                                                    Form::checkbox(
                                                        'jenis_satwa', 
                                                        4,
                                                        false,
                                                        [
                                                            'class' => 'control-label'
                                                        ]
                                                    )
                                                }} 
                                                Buaya
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4. Seberapa sering Bapak/Ibu/Saudara(i) melakukan pemburuan satwa ?
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            1 hari sekali
                                        </label>
                                    </div>  
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            1 hari sekali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            2 hari sekali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    3,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            3 hari sekali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    4,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            4 hari sekali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    5,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Seminggu sekali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    6,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Sebulan sekali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'lama_buru', 
                                                    7,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Lainnya

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
                                        </label>
                                    </div>                                                                                                                                                                                                                         
                                    </td>
                                </tr>
                                <tr>
                                    <td>5. Dalam satu tahun berapa kali Bapak/Ibu/Sdr(i) melakukan operasi perburuan satwa? 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'setahun_buru', 
                                                    1,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            12 kali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'setahun_buru', 
                                                    2,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            24 kali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'setahun_buru', 
                                                    3,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            36 kali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'setahun_buru', 
                                                    4,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            48 kali
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'setahun_buru', 
                                                    5,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Lainnya

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
                                        </label>
                                    </div>                                                                                                                                                 
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
                                                    'jumlah_satwa', 
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
                                                    'harga_jual', 
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
                                                    'volume', 
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
                                                    'harga_beli', 
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
                                                    'umur_ekonomis', 
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
                                                    'volume', 
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
                                                    'harga_satuan', 
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
                                                    'jumlah', 
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
