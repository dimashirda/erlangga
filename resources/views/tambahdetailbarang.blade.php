@extends('adminlte::page')

@section('title','CV Erlangga')

@section('content')
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Tambah Detail Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="{{url('/barang/simpandetail')}}" method="POST">
                        {{csrf_field()}}
                        <div class="box-body">
                            <input type="hidden" name="barang_id" value="{{$id}}">
                            <div class="form-group">
                                <label for="HargaJual" class="col-sm-2 control-label">Harga Beli</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" autocomplete="off" id="hargajual" name="harga_beli">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="SatuanBarang" class="col-sm-2 control-label">Jumlah</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="satuanbarang" name="jumlah" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{url('/barang/detail')}}/{{$id}}">
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