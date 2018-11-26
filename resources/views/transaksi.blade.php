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
                    <h3 class="box-title">List Transaksi Penjualan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{url('/transaksi/tambah')}}" class='btn btn-primary'><i class="fa fa-plus-circle"></i> Tambah baru</a>
                        </div>
                    </div>
                    <br>
                    @if($acc->count())
                    <div style="overflow-x:auto;">
                        <table class="table table-new table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Kasir</th>
                                <th>Pelanggan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Kredit</th>
                                <th>Total Belanja</th>
                                @if(Auth::User()->name == 'dimas')
                                <th style="text-align: center" colspan="2">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($acc as $a)
                            <tr>
                                <td>{{ $a->kasir }}</td>
                                <td>{{ $a->pelanggan }}</td>
                                <td>{{ $a->tanggal_transaksi }}</td>
                                <td>{{ $a->tanggal_jatuh_tempo }}</td>
                                <td>-</td>
                                <td>{{ $a->total }}</td>
                                @if(Auth::User()->name == 'dimas')
                                <td align="center" width="30px">
                                    <button type="button" class="btn btn-default edit-button" 
                                    href="{{url('transaksi/detail/')}}{{$a->id}}">
                                        Detail
                                    </button>
                                </td>
                                    @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                    <p>Data tidak ditemukan</p>
                @endif
            </div>
        </div>
    </div>

    <script>
    </script>
@stop