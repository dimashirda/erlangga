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
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        @php $number = number_format("$penjualan",2,",","."); @endphp
                        <h3>Rp {{$number}}</h3>
                        <p>Penjualan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop