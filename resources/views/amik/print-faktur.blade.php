<!DOCTYPE html>
<html>
<head>
	<title>Print Nota</title>
	<style type="text/css">
	body{
		font-family: courier;
		font-size: 14px;
	}
	table{
		width: 100%;
		border-collapse: collapse;
	}
	td{
		padding-left: 4px;
		padding-right: 4px;
	}
	.centered{
		text-align: center;
	}
	.double{
		border-bottom: 4px double;
		border-top: 4px double;
	}
	.righted{
		text-align: right;
	}
	.title{
		font-size: 16px;
		vertical-align: middle;
		text-align: center;
		font-weight: bold;
	}
	.subtitle{
		font-size: 14px;
	}
	.pagebreak { page-break-before: always; }
	td{
		vertical-align: top;
	}
	.dummy{
		font-size: 30px;
		color: white;
	}
	.bold{
		font-weight: bold;
	}
	@page{
		size : 210mm 145mm;
		font-weight: bold;
	}
</style>
</head>
<body>
	<table>
		<tr>
			<td width="40%">
				<table>
					<tr>
						<td colspan="2">ERLANGGA</td>
					</tr>
					<tr>
						<td>Telp. 031-5991755,5929736</td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;081230399955</td>
						<td></td>
					</tr>
				</table>
				<br>
				<table>
					<tr>
						<td>Kepada Yth :</td>
					</tr>
					<tr>
						<td>@if(!empty($data)) {{$data['penjualan']->pelanggan->nama}} @endif</td>
					</tr>
					<tr>
						<td>@if(!empty($data)) {{$data['penjualan']->pelanggan->alamat}} @endif</td>
					</tr>
					<tr>
						<td>@if(!empty($data)) {{$data['penjualan']->pelanggan->kota}} @endif</td>
					</tr>
				</table>
			</td>
			<td width="20%" class="title"> 
				FAKTUR
			</td>
			<td width="40%">
				<table>
					<tr>
						<td>No.Surat Jalan</td>
						<td>: TA @if(!empty($data)) {{$data['nomor_surat']}} @endif</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>: @if(!empty($data)) {{$data['tanggal']}} @endif</td>
					</tr>
					<tr>
						<td>Syarat Pbyr</td>
						<td>: 0 hari</td>
					</tr>
					<tr>
						<td>Jatuh Tempo</td>
						<td>: @if(!empty($data)) @if(!empty($data['tanggal_jatuh_tempo'])) {{$data['tanggal_jatuh_tempo']}} @else - @endif @endif</td>
					</tr>
					<tr>
						<td>ADMIN</td>
						<td>: @if(!empty($data)) {{$data['admin']}} @endif</td>
					</tr>
					<tr>
						<td>Time Printed</td>
					<td>: @if(!empty($data)) {{$data['jam']}} @endif</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br>
	<table>
		<thead>
			<tr>
				<td class="double centered" width="5%">No</td>
				<td class="double centered" width="35%">NAMA BARANG</td>
				<td class="double" width="12%">SATUAN</td>
				<td class="double" width="7%">JML</td>
				<td class="double centered" width="19%">HARGA</td>
				<td class="double" width="1%"></td>
				<td class="double centered" width="20%">TOTAL</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="7">&nbsp;</td>
			</tr>
			@if(!empty($data))
			@php $i = 1; $total = 0;@endphp
			@foreach($data['detail'] as $item)
			<tr>
				<td class="centered">{{$i}}</td>
				<td>{{$item->barang->nama}}</td>
				<td>{{$item->barang->satuan}}</td>
				<td>{{$item->jumlah}}</td>
				<td><a style="text-align: left !important;">Rp</a> <a style="float: right;">{{number_format($item->harga_satuan,0,",",".")}}</a></td>
				<!-- <td>@if(!empty($data['penjualan']->diskon)) <a style="text-align: left !important;"> Rp </a> <a style="float: right;">{{number_format($data['penjualan']->diskon,0,",",".")}} @else Rp 0 @endif </a></td> -->
				<td>&nbsp;</td>
				<td><a style="text-align: left !important;">Rp</a> <a style="float: right;">{{number_format($item->harga_satuan * $item->jumlah,0,",",".")}}</a></td>
				@php $total += $item->harga_satuan * $item->jumlah; @endphp
			</tr>
			@php $i++; @endphp
			@endforeach
			@endif
			<tr>
				<td colspan="7" class="dummy">.</td>
			</tr>
			<tr>
				<td class="double righted bold" colspan="6"> TOTAL SELURUH : </td>
				<td class="double bold"><a style="text-align: left !important;">Rp </a> <a style="float: right;">{{number_format($total,0,",",".")}}</a></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table>
		<tr>
			<td width="33%" class="centered">Penerima</td>
			<td width="33%" class="centered"></td>
			<td width="33%" class="centered">Hormat Kami</td>
		</tr>
	</table>

	<!-- SURAT JALAN -->
	<div class="pagebreak"></div>
	<table>
		<tr>
			<td width="40%">
				<table>
					<tr>
						<td colspan="2">UD ERLANGGA SURABAYA</td>
					</tr>
					<tr>
						<td>Telp. 031-5991755,5929736</td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;081230399955</td>
						<td></td>
					</tr>
				</table>
				<br>
				<table>
					<tr>
						<td>Kepada Yth :</td>
					</tr>
					<tr>
						<td>@if(!empty($data)) {{$data['penjualan']->pelanggan->nama}} @endif</td>
					</tr>
					<tr>
						<td>@if(!empty($data)) {{$data['penjualan']->pelanggan->alamat}} @endif</td>
					</tr>
					<tr>
						<td>@if(!empty($data)) {{$data['penjualan']->pelanggan->kota}} @endif</td>
					</tr>
				</table>
			</td>
			<td width="20%" class="title"> 
				Surat Jalan
			</td>
			<td width="40%">
				<table>
					<tr>
						<td>No.Surat Jalan</td>
						<td>: TA @if(!empty($data)) {{$data['nomor_surat']}} @endif</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>: @if(!empty($data)) {{$data['tanggal']}} @endif</td>
					</tr>
					<tr>
						<td>Syarat Pbyr</td>
						<td>: 0 hari</td>
					</tr>
					<tr>
						<td>Jatuh Tempo</td>
						<td>: @if(!empty($data['tanggal_jatuh_tempo'])) @if(!empty($data)) {{$data['tanggal_jatuh_tempo']}} @endif @else - @endif</td>
					</tr>
					<tr>
						<td>ADMIN</td>
						<td>: @if(!empty($data)) {{$data['admin']}} @endif</td>
					</tr>
					<tr>
						<td>Time Printed</td>
					<td>: @if(!empty($data)) {{$data['jam']}} @endif</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br>
	<table>
		<thead>
			<tr>
				<th class="double" width="5%">No</th>
				<th class="double" width="45%">NAMA BARANG</th>
				<th class="double" width="25%">SATUAN</th>
				<th class="double" width="25%">JUMLAH</th>
<!-- 				<th class="double" width="20%">HARGA</th>
				<th class="double" width="15%">DISC</th>
				<th class="double" width="25%">TOTAL</th> -->
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="7">&nbsp;</td>
			</tr>
			@if(!empty($data))
			@php $i = 1; $total = 0;@endphp
			@foreach($data['detail'] as $item)
			<tr>
				<td class="centered">{{$i}}</td>
				<td>{{$item->barang->nama}}</td>
				<td class="centered">{{$item->barang->satuan}}</td>
				<td class="centered">{{$item->jumlah}}</td>
				<!-- <td>Rp {{number_format($item->harga_satuan,2,",",".")}}</td>
				<td>@if(!empty($data['penjualan']->diskon)) Rp {{number_format($data['penjualan']->diskon,2,",",".")}} @else Rp 0 @endif</td>
				<td>Rp {{number_format($item->harga_satuan * $item->jumlah,2,",",".")}}</td>
				@php $total += $item->harga_satuan * $item->jumlah; @endphp -->
			</tr>
			@php $i++; @endphp
			@endforeach
			@endif
			<tr>
				<td colspan="7" class="dummy">.</td>
			</tr>
			<!-- <tr>
				<td class="double righted bold" colspan="6"> TOTAL SELURUH : </td>
				<td class="double bold">Rp {{number_format($total,2,",",".")}}</td>
			</tr> -->
		</tbody>
	</table>
	<br>
	<table>
		<tr>
			<td width="33%" class="centered">Penerima</td>
			<td width="33%" class="centered"></td>
			<td width="33%" class="centered">Hormat Kami</td>
		</tr>
	</table>
</body>
</html>