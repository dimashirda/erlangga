@extends('adminlte::page')

@section('title','CV Erlangga')
<style>
 { box-sizing: border-box; }
body {
  font: 16px Arial; 
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
/*input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}*/
/*input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}*/
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
@section('content')
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Pelunasan Transaksi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="{{url('/transaksi/pelunasan')}}/{{$penjualan->id}}/bayar" method="post" id="form_pesanan" autocomplete="off">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <tr>
                                <label for="Pembeli" class="col-sm-2 control-label">Nama Pelanggan</label>
                                  <td>
                                    <div class="autocomplete col-sm-5">
                                      <input class="form-control" 
                                      id="myInput" type="text" name="namapelanggan" placeholder="Nama Pelanggan" value="{{$penjualan->pelanggan->nama}}">
                                    </div>
                                  </td>  
                                </tr>
                            </div>
                            <div class="form-group">
                                <label for="TotalHarga" class="col-sm-2 control-label">Total Harga</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="total_harga" value="{{$penjualan->total_akhir}}" disabled>
                                    <input type="hidden" id="total_harga_sent" name="total_akhir" value="{{$penjualan->total_akhir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Terbayarkan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$penjualan->terbayar}}" disabled>
                                    <input type="hidden" id="total_harga_sent" name="terbayar" value="{{$penjualan->terbayar}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kekurangan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$penjualan->total_akhir - $penjualan->terbayar}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Bayar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="bayar">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
@stop