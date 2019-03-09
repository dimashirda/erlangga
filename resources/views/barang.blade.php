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
                    <h3 class="box-title">Daftar Stok & Harga Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{url('/barang/tambah')}}" class='btn btn-primary'><i class="fa fa-plus-circle"></i> Tambah baru</a>
                        </div>
                    </div>
                    <br>
                    @if($acc->count())
                    <div style="overflow-x:auto;">
                        <table class="table table-new table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Jual</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Detail</th>
                                @if(Auth::User()->role == 1)
                                <th style="text-align: center" colspan="2">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($acc as $a)
                            <tr>
                                <td>{{ $a->kode }}</td>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->harga_jual }}</td>
                                <td>{{ $a->satuan }}</td>
                                @php
                                $total_stok = 0;
                                @endphp
                                @foreach($a->barang_detail as $item)
                                @php $total_stok += $item->jumlah; @endphp
                                @endforeach
                                <td>{{ $total_stok }}</td>
                                <td><a href="{{url()->current()}}/detail/{{$a->id}}"><button type="button" class="btn btn-info">Detail</button></a></td>
                                @if(Auth::User()->role == 1)
                                <td align="center" width="30px">
                                    <button type="button" class="btn btn-default edit-button" data-toggle="modal" 
                                    data-target="#modal-default" data-id="{{$a->id}}" data-kode="{{$a->kode}}" 
                                    data-name="{{$a->nama}}" data-hargabeli="{{$a->harga_beli}}" 
                                    data-hargajual="{{$a->harga_jual}}"
                                    data-stok="{{$a->stok}}" data-satuan="{{$a->satuan}}">
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
                                <h4 class="modal-title">Edit Data Barang</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="form-edit">
                                   {{ csrf_field() }}
                                   <input type="hidden" name="id" id="id">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="IdBarang" class="col-sm-2 control-label">Kode Barang</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kodebarang" name="kode_barang"
                                                autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NamaBarang" class="col-sm-2 control-label">Nama Barang</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" 
                                                autocomplete="off" id="namabarang" name="nama_barang">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="HargaBeli" class="col-sm-2 control-label">Harga Beli</label>

                                            <div class="col-sm-10">
                                                <input type="number" autocomplete="off" class="form-control" id="hargabeli" name="harga_beli">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="HargaJual" class="col-sm-2 control-label">Harga Jual</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" 
                                                autocomplete="off" id="hargajual" name="harga_jual">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="StokBarang" class="col-sm-2 control-label">Stok Barang</label>

                                            <div class="col-sm-10">
                                                <input type="number"
                                                 autocomplete="off" class="form-control" id="stokbarang" name="stok_barang">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="SatuanBarang" class="col-sm-2 control-label">Satuan</label>

                                            <div class="col-sm-10">
                                                <input type="text"  
                                                autocomplete="off" class="form-control" id="satuan" name="satuan_barang">
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

    <script type="text/javascript">
        $(document).on("click", ".edit-button", function(){
            var nama_barang = $(this).data('name');
            var id = $(this).data('id');
            var harga_beli = $(this).data('hargabeli');
            var harga_jual = $(this).data('hargajual');
            var stok = $(this).data('stok');
            var satuan = $(this).data('satuan');
            var kode = $(this).data('kode');
            //console.log(id);
            //console.log(val(nama_barang));
            $("#id").val(id);
            $("#kodebarang").val(kode)
            $("#namabarang").val(nama_barang);
            $("#hargabeli").val(harga_beli);
            $("#hargajual").val(harga_jual);
            $("#stokbarang").val(stok);
            $("#satuan").val(satuan);

            $("#form-edit").attr('action','{{url('/barang/edit')}}' + '/' + id);
        });

        $(document).on("click",".delete-button", function () {
            var id = $(this).data('id')
            var nama_barang = $(this).data('name');
            $("#del-btn").attr('href','{{url('/barang/delete')}}' + '/' + id)
            $("#show-name").html('Anda yakin ingin Barang ' + nama_barang + '?')

        })
    </script>
@stop