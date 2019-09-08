<!DOCTYPE html>
<html>
<head>
	<title>Print Nota</title>
	<style type="text/css">
	body{
		font-family: sans-serif;
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
</style>
</head>
<body>
	<table>
		<tr>
			<td width="30%">
				<table>
					<tr>
						<td colspan="2">UD ERLANGGA SURABAYA</td>
					</tr>
					<tr>
						<td>Telp.</td>
						<td>031-5991755, 5929736</td>
					</tr>
					<!-- <tr>
						<td></td>
						<td>0812</td>
					</tr> -->
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
			<td width="40%" class="title"> 
				FAKTUR
			</td>
			<td width="30%">
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
				<th class="double" width="5%">No</th>
				<th class="double" width="35%">NAMA BARANG</th>
				<th class="double" width="15%">SATUAN</th>
				<th class="double" width="15%">JUMLAH</th>
				<th class="double" width="30%">KETERANGAN</th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($data))
			@php $i = 1; @endphp
			@foreach($data['detail'] as $item)
			<tr>
				<td>{{$i}}</td>
				<td>{{$item->barang->nama}}</td>
				<td>{{$item->barang->satuan}}</td>
				<td>{{$item->jumlah}}</td>
				<td></td>
			</tr>
			@php $i++; @endphp
			@endforeach
			@endif
		</tbody>
	</table>

	<!-- SURAT JALAN -->
	<div class="pagebreak"></div>
	<table>
		<tr>
			<td width="30%">
				<table>
					<tr>
						<td colspan="2">UD ERLANGGA SURABAYA</td>
					</tr>
					<tr>
						<td>Telp.</td>
						<td>031-5991755, 5929736</td>
					</tr>
					<!-- <tr>
						<td></td>
						<td>0812</td>
					</tr> -->
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
			<td width="40%" class="title"> 
				Surat Jalan
			</td>
			<td width="30%">
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
				<th class="double" width="35%">NAMA BARANG</th>
				<th class="double" width="15%">SATUAN</th>
				<th class="double" width="15%">JUMLAH</th>
				<th class="double" width="30%">KETERANGAN</th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($data))
			@php $i = 1; @endphp
			@foreach($data['detail'] as $item)
			<tr>
				<td>{{$i}}</td>
				<td>{{$item->barang->nama}}</td>
				<td>{{$item->barang->satuan}}</td>
				<td>{{$item->jumlah}}</td>
				<td></td>
			</tr>
			@php $i++; @endphp
			@endforeach
			@endif
		</tbody>
	</table>
</body>
</html>