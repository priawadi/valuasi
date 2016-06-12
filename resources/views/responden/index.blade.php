@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function show_modal(url, kuesioner)
    {
        form_delete.action = url;
        $('#delete-info').text(kuesioner);
        $('#modal-delete').modal('show');

    }
</script>

<div id="modal-delete" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        {!! Form::open(array('url' => '', 'class' => 'form-horizontal', 'method' => 'delete', 'name' => 'form_delete')) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan menghapus data:</p>
                <b><p id="delete-info"></p></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
        </div>
        {!! Form::close() !!}
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
                    <a href="{{url('responden/tambah')}}" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    <br><br>
                    <table class="table table-bordered" id="responden-table">
                        <thead> 
                            <tr> 
                                <!-- <th>#</th>  -->
                                <th>Nama Responden</th> 
                                <th>Telepon</th> 
                                <th>Alamat</th> 
                                <th>Aksi</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
<!--                             @foreach ($responden as $index => $item)
                            <tr> 
                                <th scope="row">{{ $index + 1 }}</th> 
                                <td>{{$item->nama}}</td> 
                                <td>{{$item->telepon}}</td> 
                                <td>
                                    <a href="#" onclick="show_modal('{{url('responden/hapus/' . $item->id_responden)}}', '{{$item->nama}}');return false;" title="Hapus data responden"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{url('responden/edit/' . $item->id_responden)}}" title="Edit data responden"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{url('responden/lihat/' . $item->id_responden)}}" title="Lihat data responden"><i class="glyphicon glyphicon-file"></i></a>
                                </td> 
                            </tr>
                            @endforeach -->
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw';
    var t = $('#responden-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            // { data: null, searchable: false, orderable: false, targets: 0 },
            { data: 'nama', name: 'nama' },
            { data: 'telepon', name: 'telepon' },
            { data: 'alamat', name: 'alamat' },
            { targets : [3], 
             render: function(data, type, full) {
                return '<a class="btn btn-danger btn-sm" onclick="show_modal(\'responden/hapus/'+ full.id_responden +'\',\''+ full.nama +'\')">' + 'Hapus' + '</a> <a class="btn btn-info btn-sm" href=responden/edit/' + full.id_responden + '>' + 'Edit' + '</a> <a class="btn btn-primary btn-sm" href=responden/lihat/' + full.id_responden + '>' + 'Isi Kuesioner' + '</a>';
            }}
        ],
        // order: [[1, 'asc']],
    });
    // t.on( 'order.dt search.dt', function () {
    //     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //         cell.innerHTML = i+1;
    //     } );
    // } ).draw();    
});
</script>
@endsection

