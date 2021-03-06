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
                                <td>1.  Apakah keberadaan ekosistem di lokasi ini memiliki arti berikut bagi anda</td>
                            </tr>
                            <tr>
                                <td> &nbsp;&nbsp;&nbsp; a. Keindahan &nbsp;&nbsp; 
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'keindahan', 
                                                    1,
                                                    $existence_value['keindahan'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'keindahan', 
                                                    2,
                                                    $existence_value['keindahan'] == 2,
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
                                <td> &nbsp;&nbsp;&nbsp; b. Spiritual &nbsp;&nbsp; 
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'spiritual', 
                                                    1,
                                                    $existence_value['spiritual'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'spiritual', 
                                                    2,
                                                    $existence_value['spiritual'] == 2,
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
                                <td> &nbsp;&nbsp;&nbsp; c. Budaya &nbsp;&nbsp; 
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'budaya', 
                                                    1,
                                                    $existence_value['budaya'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'budaya', 
                                                    2,
                                                    $existence_value['budaya'] == 2,
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
                                <td> &nbsp;&nbsp;&nbsp; d. Keanekaragaman Hayati &nbsp;&nbsp; 
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'anekaragam', 
                                                    1,
                                                    $existence_value['anekaragam'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'anekaragam', 
                                                    2,
                                                    $existence_value['anekaragam'] == 2,
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
                                <td>2.  Seberapa penting arti keberadaan ekosistem diatas bagi anda</td>
                            </tr> 
                            <tr>
                                <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'tkt_kepentingan', 
                                                    1,
                                                    $existence_value['tkt_kepentingan'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Sangat Penting
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'tkt_kepentingan', 
                                                    2,
                                                    $existence_value['tkt_kepentingan'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Penting
                                        </label>
                                    </div> 
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'tkt_kepentingan', 
                                                    3,
                                                    $existence_value['tkt_kepentingan'] == 3,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Kurang Penting
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'tkt_kepentingan', 
                                                    4,
                                                    $existence_value['tkt_kepentingan'] == 4,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Tidak Penting
                                        </label>
                                    </div>                                    
                                </td>
                            </tr> 
                            <tr>
                                <td>3.  Bila memiliki arti penting, apakah bersedia untuk ikut melestarikan ekosistem tersebut</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'sedia_lestari', 
                                                    1,
                                                    $existence_value['sedia_lestari'] == 1,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Bersedia
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'sedia_lestari', 
                                                    2,
                                                    $existence_value['sedia_lestari'] == 2,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            Tidak Bersedia
                                        </label>
                                    </div>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>4.  Bila bersedia, dengan cara berpartisipasi dalam gerakan pelestarian lingkungan seperti transplantasi karang/ penanaman mangrove</td>
                            </tr>
                            <tr>
                                <td>-   Berkorban tenaga dengan kerja sukarela selama 
                                    {{  
                                        Form::text(
                                            'korban_tenaga', 
                                            $existence_value['korban_tenaga'],  
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => 'hari/minggu'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>-   Menyumbang iuran pelestarian lingkungan sebesar 
                                    {{  
                                        Form::text(
                                            'sumbang_iuran', 
                                            $existence_value['sumbang_iuran'],  
                                            [
                                                'class'       => 'form-control',
                                                'placeholder' => '(Rp/bulan) atau (Rp/tahun)'
                                            ]
                                        )
                                    }}
                                </td>
                            </tr>                                                                                                              
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
