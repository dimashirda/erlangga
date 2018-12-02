@extends('adminlte::page')

@section('title', 'CV ERLANGGA')

@section('content_header')
    Homepage
@stop

@section('content')
    <section class="content">
    	<div class="row">
    		<div class="col-lg-3 col-xs-6">
    			<div class="small-box bg-aqua">
    				<div class="inner">
    					<h3>{{$penjualan->count()}}</h3>
    					<p>Jumlah Transaksi Penjualan</p>
    				</div>
    			</div>
    		</div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$pembelian->count()}}</h3>
                        <p>Jumlah Transaksi Pembelian</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$pembelian->count()}}</h3>
                        <p>Keuntungan Hari Ini</p>
                    </div>
                </div>
            </div>
    	</div>
    </section>
@stop