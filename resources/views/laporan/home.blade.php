@extends('adminlte::page')

@section('title', 'CV ERLANGGA')

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
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        @php $number = number_format("$untung",2,",","."); @endphp
                        <h3>Rp {{$number}}</h3>
                        <p>Keuntungan</p>
                        <p>Tanggal {{$start}} - {{$end}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        @php $number = number_format("$penjualan",2,",","."); @endphp
                        <h3>Rp {{$number}}</h3>
                        <p>Penjualan</p>
                        <p>Tanggal {{$start}} - {{$end}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Pilih Tanggal</p>
                        <div class="btn btn-box-tool text-xs-center">
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal_penjualan" data-title="Laporan Kunjungan Harian">Buat Laporan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
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
                                <th>Keuntungan</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($acc as $a)
                                <tr>
                                    <td>TA{{$a->id + 2000}}</td>
                                    <td>{{ $a->kasir->name }}</td>
                                    <td>{{ $a->pelanggan->nama }}</td>
                                    <td>{{ $a->tanggal_transaksi }}</td>
                                    <td>{{ $a->tanggal_jatuh_tempo }}</td>
                                    <td>@if($a->jenis_penjualan == 1) Kredit @else Tunai @endif</td>
                                    @php $number = number_format("$a->total",0,",","."); @endphp
                                    <td>Rp{{$number}}</td>
                                    @php $number = number_format("$a->untung",0,",","."); @endphp
                                    <td>Rp{{$number}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$acc->appends(request()->except('page'))->links()}}
                    </div>
                </div>
                @else
                    <p>Data tidak ditemukan</p>
                @endif
            </div>
        </div>
    </div>
<div id="modal_penjualan" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <form method="get" action="{{url('laporan')}}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pilih Tanggal</h4>
                </div>
                <div class="modal-body">
                    <div class="col-3 col-md-4 col-xl-1">
                        <span>Tanggal Mulai</span>
                        <input type="text" name="tanggal1" class="form-control datepicker" autocomplete="off">
                    </div>
                    <div class="col-3 col-md-4 col-xl-1">
                        <span>Tanggal Akhir</span>
                        <input type="text" name="tanggal2" class="form-control datepicker" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>    
    </div>
</div>
<script type="text/javascript">
    var j = jQuery.noConflict();
        j( function() {
            j( ".datepicker" ).datepicker();
        } );
    // $(document).ready(function(){
    //     $('#example').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: "{{ url('transaksi/all') }}",

    //         columns: [
    //                 { data: 'nomor', name: 'nomor' },
    //                 { data: 'kasir', name: 'kasir' },
    //                 { data: 'pembeli', name: 'pembeli' },
    //                 { data: 'tanggal_transaksi', name: 'tanggal_transaksi' },
    //                 { data: 'tanggal_jatuh_tempo', name: 'tanggal_jatuh_tempo' },
    //                 { data: 'jenis', name: 'jenis'},
    //                 { data: 'total', name: 'total'},
    //                 { data: 'detail', name: 'detail'}
    //                 ],
    //         order: [[ 3, "desc" ]]
    //     }); 
    // });
</script>
@stop