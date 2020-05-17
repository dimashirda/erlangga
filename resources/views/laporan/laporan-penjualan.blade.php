<table>
    <tr>
        <td colspan="7">LAPORAN PENJUALAN</td>
    </tr>
    <tr>
        <td colspan="7">{{$tanggal1}} - {{$tanggal2}}</td>
    </tr>
    <tr>
        <td align="center">No</td>
        <td align="center">Nama Pelanggan</td>
        <td align="center">Jenis Pembayaran</td>
        <td align="center">Jatuh Tempo</td>
        <td align="center">Total Belanja</td>
        <td align="center">Terbayar</td>
        <td align="center">Kekurangan</td>
    </tr>
    @foreach($result as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
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
            <td>Rp {{number_format($item->total_akhir,2,",",".")}}</td>
            <td>Rp {{number_format($item->terbayar,2,",",".")}}</td>
            @php
                $i = 0;
                $i = $item->total_akhir - $item->terbayar;
            @endphp
            <td>Rp {{number_format($i,2,",",".")}}</td>
        </tr>
    @endforeach
    <tr>
    </tr>
</table>