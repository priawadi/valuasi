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
                                <td>1.  Apakah keberadaan ekosistem di lokasi ini memiliki arti berikut bagi anda</td>
                            </tr>
                            <tr>
                                <td> &nbsp;&nbsp;&nbsp; a. Keindahan &nbsp;&nbsp; 
                                    <div class="radio-inline">
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
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-inline">
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
                                                    'status_tambak', 
                                                    1,
                                                    false,
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
                                                    'status_tambak', 
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
                                <td> &nbsp;&nbsp;&nbsp; c. Budaya &nbsp;&nbsp; 
                                    <div class="radio-inline">
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
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-inline">
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
                                                    'status_tambak', 
                                                    1,
                                                    false,
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
                                                    'status_tambak', 
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
                                <td>2.  Seberapa penting arti keberadaan ekosistem diatas bagi anda</td>
                            </tr> 
                            <tr>
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
                                            Sangat Penting
                                        </label>
                                    </div>
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
                                            Penting
                                        </label>
                                    </div> 
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
                                            Kurang Penting
                                        </label>
                                    </div>
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
                                                    'status_tambak', 
                                                    1,
                                                    false,
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
                                                    'status_tambak', 
                                                    1,
                                                    false,
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
