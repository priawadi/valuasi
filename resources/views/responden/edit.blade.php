@extends('layouts.app')
<link href="{!! asset('bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
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
                    {!! Form::open(array('url' => $action, 'class' => 'form-horizontal', 'method' => 'patch')) !!}
                        <div class="form-grup">
                            <b>A. DATA PENCACAH</b>
                            <div class="col-sm-2"></div>
                        </div>                    
                        <div class="form-group">
                            {{
                                Form::label(
                                    'nama_pencacah', 
                                    'Nama Pencacah', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'nama_pencacah', 
                                        $responden->nama_pencacah, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Nama Pencacah'
                                        ]
                                    )
                                }}
                            </div>
                        </div>   
                        <div class="form-group">
                            {{
                                Form::label(
                                    'tanggal_input', 
                                    'Tanggal Input', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'tanggal_input', 
                                        $responden->tanggal_input, 
                                        [
                                            'class'       => 'form-control datepicker',
                                            'placeholder' => 'Tanggal Input'
                                        ]
                                    )
                                }}
                            </div>
                        </div>      
                        <div class="form-grup">
                            <b>B. DATA RESPONDEN</b>
                            <div class="col-sm-2"></div>
                        </div>               
                        <div class="form-group @if ($errors->has('nama_responden')) has-error @endif">
                            {{
                                Form::label(
                                    'nama', 
                                    'Nama', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'nama', 
                                        $responden->nama, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Nama',
                                            'maxlength'   => 255

                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'telepon', 
                                    'Telepon', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'telepon', 
                                        $responden->telepon, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Telepon'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'alamat', 
                                    'Alamat', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::textarea(
                                        'alamat', 
                                        $responden->alamat, 
                                        [
                                            'class'       => 'form-control col-sm-6',
                                            'placeholder' => 'Alamat',
                                            'rows'        => 4
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'umur', 
                                    'Umur', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'umur', 
                                        $responden->umur, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Umur',
                                            'maxlength'   => 2
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'jenis_kelamin', 
                                    'Jenis Kelamin', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($jenis_kelamin as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'jenis_kelamin', 
                                                    $k,
                                                    $k == $responden->jenis_kelamin,
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
                                    'pendidikan', 
                                    'Pendidikan', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($pendidikan as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'pendidikan', 
                                                    $k,
                                                    $k == $responden->pendidikan,
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
                                    'lama_pendidikan', 
                                    'Lama Pendidikan', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'lama_pendidikan', 
                                        $responden->lama_pendidikan, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Lama Pendidikan',
                                            'maxlength'   => 2
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'stat_kawin', 
                                    'Status Kawin', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($status_kawin as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'stat_kawin', 
                                                    $k,
                                                    $k == $responden->stat_kawin,
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
                                    'jum_ang_kel', 
                                    'Jumlah Anggota Keluarga', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'jum_ang_kel_total', 
                                        $responden->jum_ang_kel_total, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Jumlah Anggota Keluarga',
                                            'maxlength'   => 2
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'anak', 
                                    'a. Anak-Anak', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'jum_ang_kel_anak', 
                                        $responden->jum_ang_kel_anak, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Anak-Anak',
                                            'maxlength'   => 2
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'dewasa', 
                                    'b. Dewasa', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-2">
                                {{
                                    Form::text(
                                        'jum_ang_kel_dewasa', 
                                        $responden->jum_ang_kel_dewasa, 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Dewasa',
                                            'maxlength'   => 2
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'stat_keluarga', 
                                    'Status dalam Keluarga', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($status_keluarga as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'stat_keluarga', 
                                                    $k,
                                                    $k == $responden->stat_keluarga,
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
                                    'pendapatan', 
                                    'Pendapatan Rumah Tangga (Rp/tahun)', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($jenis_pendapatan as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'pendapatan', 
                                                    $k,
                                                    $k == $responden->pendapatan,
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
                                    'pekerjaan_utama', 
                                    'Pekerjaan Utama', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($pekerjaan as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'pekerjaan_utama', 
                                                    $k,
                                                    $k == $responden->pekerjaan_utama,
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
                                    'pekerjaan_sampingan', 
                                    'Pekerjaan Sampingan', 
                                    [
                                        'class' => 'col-sm-4 control-label'
                                    ]
                                )
                            }}
                            <div class="col-sm-4">
                                @foreach ($pekerjaan as $k => $v)
                                    <div class="radio">
                                        <label>
                                            {{
                                                Form::radio(
                                                    'pekerjaan_sampingan', 
                                                    $k,
                                                    $k == $responden->pekerjaan_sampingan,
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
                        <div class="col-sm-offset-4 col-sm-4">
                            <a href="{{ url('responden') }}" class="btn btn-link btn-sm">Batal</a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                      </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>
@endsection
