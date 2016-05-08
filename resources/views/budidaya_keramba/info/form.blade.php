@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Responden</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="panel-body">
                    {!! Form::open(array('url' => $action, 'class' => 'form-horizontal')) !!}
                        <div class="form-group">
                            {{
                                Form::label(
                                    'lama_usaha', 
                                    'Lama Usaha (tahun)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-1">
                                {{
                                    Form::text(
                                        'lama_usaha', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Lama Usaha',
                                            'maxlength'   => 2

                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'status_usaha', 
                                    'Status Usaha', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($status_usaha as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'status_usaha', 
                                                    $k,
                                                    false,
                                                    [
                                                        'class' => 'control-label'
                                                    ]
                                                )
                                            }} 
                                            {{ $v }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'mata_pencaharian', 
                                    'Mata Pencaharian sebelum menjadi pembudidaya', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-5">
                                {{
                                    Form::text(
                                        'mapen_sblm_keramba', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Mata Pencarian',
                                            'maxlength'   => 255
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'luas_lahan', 
                                    'Luas Lahan Budidaya Keramba (meter persegi)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'luas_lahan', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Luas Lahan',
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'jumlah_total', 
                                    'Jumlah Total Keramba (unit)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'keramba_total', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Jumlah Total Keramba',
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'keramba_aktif', 
                                    'Jumlah Keramba yang Aktif (unit)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'keramba_aktif', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Jumlah Keramba yang Aktif',
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'keramba_tidak_aktif', 
                                    'Jumlah Keramba yang Tidak Aktif (unit)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'keramba_tidak_aktif', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Jumlah Keramba yang Tidak Aktif',
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'jenis_komoditas', 
                                    'Jenis komoditas yang diusahakan', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::select(
                                        'jenis_komoditas[]', 
                                        $jenis_komoditas, 
                                        null, 
                                        [
                                            'class'    => 'form-control',
                                            'multiple' => 'multiple',
                                            'id'       => 'jenis-komoditas'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'waktu_pemeliharaan', 
                                    'Waktu Pemeliharaan (bulan)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'waktu_pemeliharaan', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Waktu Pemeliharaan',
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'jum_siklus_panen', 
                                    'Jumlah Siklus/Panen per Tahun pada Unit Usaha (kali)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'jum_siklus_panen', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Jumlah Siklus Panen',
                                        ]
                                    )
                                }}
                            </div>
                        </div>
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