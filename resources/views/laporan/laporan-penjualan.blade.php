<table>
    <tr>
        <td colspan="7">LAPORAN PENJUALAN</td>
    </tr>
    <tr>
        <td colspan="7">{{$tanggal1}} - {{$tanggal2}}</td>
    </tr>
    <tr>
        <td align="center">No</td>
        <td align="center">Kasir</td>
        <td align="center">Nama Pelanggan</td>
        <td align="center">Jenis Pembayaran</td>
        <td align="center">Jatuh Tempo</td>
        <td align="center">Total Belanja</td>
        <td align="center">Keuntungan</td>
    </tr>
    @foreach($result as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->kasir->name}}</td>
            <td>{{$item->pelanggan->nama}}</td>
            <td>@if($item->jenis_penjualan == 1) 
                Kredit
                @elseif($item->jenis_penjualan == 2)
                Tunai
                @elseif($item->jenis_penjualan == 3)
                Transfer
                @elseif($item->jenis_penjualan == 4)
                Giro
                @endif
            </td>
            <td>@if(!empty($item->tanggal_jatuh_tempo)) 
                {{$item->tanggal_jatuh_tempo}} 
                @else 
                - 
                @endif
            </td>
            @php $number = number_format("$item->total",0,",","."); @endphp
            <td>Rp{{$number}}</td>
            @php $number = number_format("$item->untung",0,",","."); @endphp
            <td>Rp{{$number}}</td>
        </tr>
    @endforeach
    <tr>
    </tr>
</table>