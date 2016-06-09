@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ekspor Data Responden</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr> 
                                <th width="40px">#</th> 
                                <th>Kuesioner</th> 
                                <th width="150px">Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($kuesioner['vanelkanas'] as $key => $item)
                            <tr>
                                <td>{{$item['no']}}.</td>
                                <td>{{$item['kuesioner']}}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-primary btn-sm" href="{{url($item['link'])}}">Export</a>
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
