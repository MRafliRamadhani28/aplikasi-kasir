@foreach ($items as $item)
<tr>
  <td>{{ $item->transaksi->id }}</td>
  <td>{{ $item->barang->nama_barang }}</td>
  <td>{{ $item->jumlah }}</td>
  <td>{{ date('d M Y h:i:s', strtotime($item->created_at)) }}</td>
</tr>
@endforeach