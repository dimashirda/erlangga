@extends('adminlte::page')

@section('title','CV Erlangga')

@section('content')
	 <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
    <div class="row">
        @if(Session::has('alert-success'))
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{Session::get('alert-success')}}
                </div>
            </div>
        @elseif(Session::has('alert-danger'))
            <div class="col-xs-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-times"></i> Gagal!</h4>
                    {{Session::get('alert-danger')}}
                </div>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Daftar Pelanggan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{url('/pelanggan/tambah')}}" class='btn btn-primary'><i class="fa fa-plus-circle"></i> Tambah baru</a>
                        </div>
                    </div>
                    <br>
                    @if($acc->count())
                    <div style="overflow-x:auto;">
                        <table class="table table-new table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat Pelanggan</th>
                                <th>No Telpon</th>
                                <th>Kota</th>
                                <th>Limit</th>
                                <th>Kredit</th>
                                @if(Auth::User()->name == 'dimas')
                                <th style="text-align: center" colspan="2">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($acc as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td>{{ $a->telepon }}</td>
                                <td>{{ $a->kota }}</td>
                                <td>{{ $a->limit }}</td>
                                <td>{{ $a->kredit }}</td>
                                @if(Auth::User()->name == 'dimas')
                                <td align="center" width="30px">
                                    <button type="button" class="btn btn-default edit-button" data-toggle="modal" data-target="#modal-default"
                                    data-id="{{$a->id}}" data-name="{{$a->nama}}" data-alamat="{{$a->alamat}}" 
                                    data-telpon="{{$a->telepon}}" data-kota="{{$a->kota}}" 
                                    data-limit="{{$a->limit}}" data-kredit="{{$a->kredit}}">
                                        Edit
                                    </button>
                                </td>
                                <td align="center" width="30px">
                                    <button type="button" class="btn btn-danger delete-button" data-name="{{$a->nama}}" 
                                    data-id="{{$a->id}}" data-toggle="modal" data-target="#modal-danger">
                                        Hapus
                                    </button>
                                </td>
                                    @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="modal-default" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Data Pelanggan</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="form-edit">
                                   {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="IdPelanggan" class="col-sm-2 control-label">ID Pelanggan</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="idpelanggan" name="id_pelanggan" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NamaPelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="namapelanggan" name="nama_pelanggan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Alamat" class="col-sm-2 control-label">Alamat Pelanggan</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NomorTelpon" class="col-sm-2 control-label">Nomor Telepon</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="nomor" name="nomor">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Kota" class="col-sm-2 control-label">Kota</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kota" name="kota">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Limit" class="col-sm-2 control-label">Limit</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="limit" name="limit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Kredit" class="col-sm-2 control-label">Kredit</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="kredit" name="kredit">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success pull-right">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="modal-danger" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Hapus Data</h4>
                            </div>
                            <div class="modal-body">
                                <p id="show-name"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <a id="del-btn">
                                    <button type="button" class="btn btn-danger pull-right" style="margin-left: 4px ;">Hapus</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <p>Data tidak ditemukan</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", ".edit-button", function(){
            var nama_pelanggan = $(this).data('name');
            var id = $(this).data('id');
            var alamat = $(this).data('alamat');
            var no_telepon = $(this).data('telpon');
            var kota = $(this).data('kota');
            var limit = $(this).data('limit');
            var kredit = $(this).data('kredit');
            //console.log(id);
            //console.log(val(nama_barang));
            $("#idpelanggan").val(id);
            $("#namapelanggan").val(nama_pelanggan);
            $("#kota").val(kota);
            $("#nomor").val(no_telepon);
            $("#alamat").val(alamat);
            $("#kredit").val(kredit);
            $("#limit").val(limit);
            $("#form-edit").attr('action','{{url('/pelanggan/edit')}}' + '/' + id);
        });

        $(document).on("click",".delete-button", function () {
            var id = $(this).data('id')
            var nama_pelanggan = $(this).data('name');
            $("#del-btn").attr('href','{{url('/pelanggan/delete')}}' + '/' + id)
            $("#show-name").html('Anda yakin ingin menghapus planggan ' + nama_pelanggan + '?')

        })
    </script>
@stop