@extends('adminlte::page')

@section('title','CV Erlangga')

@section('content')
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Tambah Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="{{url('/barang/simpan')}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="IdBarang" class="col-sm-2 control-label">ID Barang</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idbarang" name="id_barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NamaBarang" class="col-sm-2 control-label">Nama Barang</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namabarang" name="nama_barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HargaBeli" class="col-sm-2 control-label">Harga Beli</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="hargabeli" name="harga_beli">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HargaJual" class="col-sm-2 control-label">Harga Jual</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="hargajual" name="harga_jual">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="StokBarang" class="col-sm-2 control-label">Stok Barang</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="stokbarang" name="stok_barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="SatuanBarang" class="col-sm-2 control-label">Satuan</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="satuanbarang" name="satuan_barang">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{url('/barang')}}">
                                <button type="button" class="btn btn-default">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-success pull-right">Simpan</button>


                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
@stop