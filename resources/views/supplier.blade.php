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
                    <h3 class="box-title">Daftar Supplier</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{url('/supplier/tambah')}}" class='btn btn-primary'><i class="fa fa-plus-circle"></i> Tambah baru</a>
                        </div>
                    </div>
                    <br>
                    @if($acc->count())
                    <div style="overflow-x:auto;">
                        <table class="table table-new table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Alamat Supplier</th>
                                <th>No Telpon</th>
                                <th>Kota</th>
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
                                @if(Auth::User()->name == 'dimas')
                                <td align="center" width="30px">
                                    <button type="button" class="btn btn-default edit-button" data-toggle="modal" 
                                    data-target="#modal-default"
                                    data-id="{{$a->id}}" data-name="{{$a->nama}}" data-alamat="{{$a->alamat}}" 
                                    data-telpon="{{$a->telepon}}" data-kota="{{$a->kota}}">
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
                                <h4 class="modal-title">Edit Data Supplier</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="form-edit">
                                   {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="IdSupplier" class="col-sm-2 control-label">ID Supplier</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="idsupplier" name="id_supplier" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NamaSupplier" class="col-sm-2 control-label">Nama Supplier</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="namasupplier" name="nama_supplier">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Alamat" class="col-sm-2 control-label">Alamat Supplier</label>

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
            var nama_supplier = $(this).data('name');
            var id = $(this).data('id');
            var alamat = $(this).data('alamat');
            var no_telepon = $(this).data('telpon');
            var kota = $(this).data('kota');
            //console.log(id);
            //console.log(val(nama_barang));
            $("#idsupplier").val(id);
            $("#namasupplier").val(nama_supplier);
            $("#kota").val(kota);
            $("#nomor").val(no_telepon);
            $("#alamat").val(alamat);
            $("#form-edit").attr('action','{{url('/supplier/edit')}}' + '/' + id);
        });

        $(document).on("click",".delete-button", function () {
            var id = $(this).data('id')
            var nama_supplier = $(this).data('name');
            $("#del-btn").attr('href','{{url('/supplier/delete')}}' + '/' + id)
            $("#show-name").html('Anda yakin ingin menghapus supplier ' + nama_supplier + '?')

        })
    </script>
@stop