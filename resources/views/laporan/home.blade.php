@extends('adminlte::page')

@section('title', 'CV ERLANGGA')

@section('content')
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
</script>
@stop