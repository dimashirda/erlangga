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
                    <form class="form-horizontal" action="{{url('/barang/simpan')}}" method="POST">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="IdBarang" class="col-sm-2 control-label">Kode Barang</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodebarang" name="kode_barang"
                                    autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NamaBarang" class="col-sm-2 control-label">Nama Barang</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namabarang" name="nama_barang"
                                    autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HargaJual" class="col-sm-2 control-label">Harga Jual</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" autocomplete="off" id="hargajual" name="harga_jual" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="SatuanBarang" class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-10">
                                    <select class="select-2 satuan" data-width="50%" name="satuan_barang" required>
                                        <option disabled selected>Pilih Satuan</option>
                                        <option value="RIM">RIM</option>
                                        <option value="Lembar">Lembar</option>
                                        <option value="Box">Box</option>
                                        <option value="RIM-Plano">RIM-Plano</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-10">
                                    <select class="select-2 jenis" data-width="50%" name="jenis_barang" required>
                                        <option disabled selected>Pilih Satuan</option>
                                        @foreach($jenis as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
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
@section('js')
    <script type="text/javascript">
        $('.satuan').select2();
        $('.jenis').select2();
    </script>
@stop