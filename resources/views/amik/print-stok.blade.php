<!DOCTYPE html>
<html>
<head>
	<title>Laporan Stok</title>
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
		border-bottom: 6px double;
	}
	.subtitle{
		font-size: 14px;
	}
</style>
</head>
<body>
	<table>
		<tr>
			<td class="centered"><b class="title">LAPORAN STOCK</b></td>
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<td width="50%" class="subtitle">Tanggal Cetak : @if(!empty($data)) {{$data['tanggal']}} @endif</td>
			<!-- <td width="50%" class="subtitle righted">Halaman : 1</td> -->
		</tr>
	</table>
	<table>
		<thead>
			<tr>
				<!-- <th class="double" width="15%">KODE BARANG</th> -->
				<th class="double" width="25%">NAMA BARANG</th>
				<th class="double" width="10%">JENIS</th>
				<th class="double" width="10%">KMS</th>
				<th class="double" width="10%">ONHAND</th>
				<th class="double righted" width="15%">HARGA JUAL</th>
				<th class="double righted" width="15%">HARGA BELI</th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($data))
			@foreach($data['barang'] as $item)
			<tr>
				<!-- <td>{{$item->kode}}</td> -->
				<td>{{$item->nama}}</td>
				<td>@if(!empty($item->jenis_barang))
					{{$item->jenis_barang->nama}}
					@else
					-
					@endif
				</td>
				<td>{{$item->satuan}}</td>
				<td>{{$item->stok}}</td>
				<td class="righted"><p>Rp {{number_format($item->harga_jual,2,",",".")}}</p></td>
				<td class="righted"><p>Rp @if(!empty($item->harga_beli)) 
					{{number_format($item->harga_beli->harga_beli,2,",",".")}}
					@else 0
					@endif </p></td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</body>
</html>