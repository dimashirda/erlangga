@extends('adminlte::page')

@section('title','CV Erlangga')

@section('content')
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Tambah pelanggan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <form class="form-horizontal" method="post" action="{{url('/pelanggan/simpan')}}">
                        {{ csrf_field() }}
                            <div class="box-body">
                                <!-- <div class="form-group">
                                    <label for="IdPelanggan" class="col-sm-2 control-label">ID Pelanggan</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="idpelanggan" name="id_pelanggan">
                                    </div>
                                </div> -->
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
                        <div class="box-footer">
                            <a href="{{url('/pelanggan')}}">
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