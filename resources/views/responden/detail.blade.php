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
                    <b>Nama Responden : {{$responden->nama}}</b>
                    <br>
                    <br>
                    <b>A. <em>EFFECT ON PRODUCTION</em> (EOP) PEMBUDIDAYA IKAN</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['pembudidaya_ikan'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>B. <em>EFFECT ON PRODUCTION</em> (EOP) PETAMBAK</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['petambak'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>C. NILAI KEBERADAAN (<em>EXISTENCE VALUE</em>)</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['nilai_keberadaan'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>D. PEMANFAATAN EKOSISTEM MANGROVE</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['pemanfaatan_mangrove'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>E. PEMANFAATAN EKOSISTEM MANGROVE (PEMANFAAT KAYU)</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['pemanfaat_kayu'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>F. PEMANFAATAN EKOSISTEM MANGROVE (PENCARI SATWA)</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['pencari_satwa'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>G. PEMANFAATAN SUMBER DAYA PERIKANAN TANGKAP EKOSISTEM TERUMBU KARANG</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['terumbu_karang'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>H. PEMANFAATAN EKOSISTEM TERUMBU KARANG DAN MANGROVE (TRAVEL COST METHOD/TCM)</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['travel_cost_method'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    <b>I. PEMANFAATAN SUMBER DAYA PERIKANAN BUDIDAYA RUMPUT LAUT</b>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="100px">Status</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['rumput_laut'] as $key => $item)
                            <tr>
                                <td>{{($key + 1)}}</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <span class="label label-{{$item['is_done']? 'success': 'warning'}}">{{$item['is_done']? 'Sudah': 'Belum'}}</span>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($item['is_done'])
                                            <a class="btn btn-danger btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Hapus</a>
                                            <a class="btn btn-success btn-sm" href="{{url($item['link'])}}/hapus/{{$responden['id_responden']}}">Edit</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}/tambah">Tambah</a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
