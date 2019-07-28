@extends('adminlte::page')

@section('title','CV Erlangga')

@section('content')
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Tambah Stok Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="{{url('/pemotongan-stok/tambah')}}" method="POST">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Barang Awal / Satuan / Stok / Harga Beli </label>
                                <select class="select-2" name="barang_awal" data-width="50%" required>
                                    <option value="" selected disabled>Pilih Barang</option>
                                    @foreach($barang as $item)
                                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->satuan}} / {{$item->jumlah}} / {{$item->harga_beli}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kuantitas</label>
                                <input type="number" name="kuantitas_awal" required>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Barang Akhir / Satuan / Stok / Harga Jual</label>
                                <select class="select-2" name="barang_akhir" data-width="50%" required>
                                    <option value="" selected disabled>Pilih Barang</option>
                                    @foreach($barang as $item)
                                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->satuan}} / {{$item->jumlah}} / {{$item->harga_jual}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kuantitas</label>
                                <input type="number" name="kuantitas_akhir" required>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Harga Jual Baru</label>
                                <input type="number" name="harga_jual_baru">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{url('/barang')}}">
                                <button type="button" class="btn btn-default">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-success pull-right">Potong</button>


                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
@stop
@section('js')
@stop