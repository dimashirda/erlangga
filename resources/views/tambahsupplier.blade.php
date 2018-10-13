@extends('adminlte::page')

@section('title','CV Erlangga')

@section('content')
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Tambah supplier</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <form class="form-horizontal" method="post" action="{{url('/supplier/simpan')}}">
                        {{ csrf_field() }}
                            <div class="box-body">
                                <!-- <div class="form-group">
                                    <label for="Idsupplier" class="col-sm-2 control-label">ID supplier</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="idsupplier" name="id_supplier">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="Namasupplier" class="col-sm-2 control-label">Nama supplier</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namasupplier" name="nama_supplier">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Alamat" class="col-sm-2 control-label">Alamat supplier</label>

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
                        <div class="box-footer">
                            <a href="{{url('/supplier')}}">
                                <button type="button" class="btn btn-default">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-success pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop