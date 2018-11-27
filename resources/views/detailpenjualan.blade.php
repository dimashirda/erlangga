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
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Detail Transaksi #{{$penjualan->id}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{url('/transaksi/tambah')}}" class='btn btn-primary'>Print</a>
                            <a href="{{url('/transaksi/tambah')}}" class='btn btn-info'>Edit</a>
                            <a href="{{url('/transaksi/tambah')}}" class='btn btn-danger'>Delete</a>
                        </div>
                    </div>
                    <br>
                    @if($detail->count())
                    <div style="overflow-x:auto;">
                        <div class="row col-md-12">
                            <div class="col-md-3">
                            <h4>Pembeli : {{$penjualan->pelanggan->nama}}</h4>
                            </div>
                            <div class="col-md-3">
                            <h4>Kasir : {{$penjualan->kasir->name}}</h4>
                            </div>
                            <div class="col-md-3">
                            <h4>Jenis Pembayaran : @if($penjualan->jenis_penjualan == 1) Kredit @else Tunai @endif</h4>    
                            </div>
                            <div class="col-md-3">
                            <h4>Jatuh Tempo : @if($penjualan->jenis_penjualan == 1) {{$penjualan->tanggal_jatuh_tempo}} 
                            @else - @endif</h4>    
                            </div>    
                        </div>
                        <table class="table table-new table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detail as $a)
                            <tr>
                            @php $number = number_format("$a->total_satuan",2,",","."); @endphp
                                <td>{{ $a->barang->nama }}</td>
                                <td>{{ $a->jumlah }}</td>
                                <td>Rp {{ $number }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Total Pembelian</th>
                            </tr>
                            @php $number = number_format("$penjualan->total_akhir",2,",","."); @endphp
                            <tr>
                                <td>Rp {{$number}}</td>
                            </tr>
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