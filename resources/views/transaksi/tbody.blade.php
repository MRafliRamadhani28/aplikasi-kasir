@foreach ($items as $item)
<tr>
  <td>{{ $item->id }}</td>
  <td>{{ $item->transaksi->total_harga }}</td>
  <td>Rp. {{ number_format($item->total_harga,0,',','.') }}</td>
  <td>{{ date('d M Y h:i:s', strtotime($item->created_at)) }}</td>
</tr>
@endforeach