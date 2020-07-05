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
                    <h3 class="box-title">List Transaksi Penjualan
                    @if(!empty($flag))
                        @if($flag == 1) (Semua) @elseif ($flag == 2) (Belum Lunas) @else (Sudah Lunas) 
                        @endif
                    @endif</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    @if(empty($flag))
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{url('/transaksi/tambah')}}" class='btn btn-primary'><i class="fa fa-plus-circle"></i> Tambah baru</a>
                        </div>
                    </div>
                    @else
                    <label>Pilih Jenis Transaksi</label>
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{url('/pelanggan/detail')}}/{{$pelanggan_id}}/2" class='btn btn-primary'>Belum Lunas</a>
                        </div>
                        <div class="col-md-1">
                            <a href="{{url('/pelanggan/detail')}}/{{$pelanggan_id}}/3" class='btn btn-primary'>Sudah Lunas</a>
                        </div>
                        <div class="col-md-1">
                            <a href="{{url('/pelanggan/detail')}}/{{$pelanggan_id}}" class='btn btn-primary'>Semua</a>
                        </div>
                    </div>
                    @endif

                    <br>
                    @if($acc->count())
                    <div style="overflow-x:auto;">
                        <table class="table table-new table-striped table-hover" id="example">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Kasir</th>
                                <th>Pelanggan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Jenis Belanja</th>
                                <th>Total Belanja</th>
                                @if(Auth::User()->role == '1')
                                <th>Action</th>
                                @endif
                            </tr>
                            </thead>
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
    var j = jQuery.noConflict();
    j( function() {
        j( "#datepicker" ).datepicker();
    } );
    $(document).ready(function(){
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('transaksi/all') }}",

            columns: [
                    { data: 'nomor', name: 'nomor' },
                    { data: 'kasir', name: 'kasir' },
                    { data: 'pembeli', name: 'pembeli' },
                    { data: 'tanggal_transaksi', name: 'tanggal_transaksi' },
                    { data: 'tanggal_jatuh_tempo', name: 'tanggal_jatuh_tempo' },
                    { data: 'jenis', name: 'jenis'},
                    { data: 'total', name: 'total'},
                    { data: 'detail', name: 'detail'}
                    ],
            order: [[ 3, "desc" ]]
        }); 
    });
    </script>
@stop