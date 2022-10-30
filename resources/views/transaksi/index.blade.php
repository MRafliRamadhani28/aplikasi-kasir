@extends('app-layout')
@section('content')
<div class="container-fluid">
  <div class="row ms-auto">
    <div class="col-7">
      <div class="col-md-12 mb-1">  
        <select class="single-select w-100 mb-1" id="barang" name="barang" onChange="addCartSearch()">
          <option selected disabled>Pilih Barang</option>
          @foreach ($barangs as $barang)
            <option value="{{ $barang->id }}/{{ $barang->harga_satuan }}">{{ ucfirst($barang->nama_barang) }}</option>
          @endforeach
        </select>
      </div>
    </div>
  
    <div class="col-5">
      <div id="cart">
        <div class="list-group">
          <div href="javascript:;" class="list-group-item ps-3 py-1 mb-1">
            <div class="d-flex w-100 justify-content-center">
              <h6 class="mb-1 mt-1" id="titleCart">Bill</h6>
            </div>
          </div>
        </div>
        <div class="overflow-auto" style="max-height: 60vh">
          <div class="list-group">
            <a class="list-group-item ps-3 py-1">
              <table class="table">
                <thead>
                  <tr class="text-right">
                    <th class="text-left">Nama</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $totalCart = 0; ?>
                  @foreach ($carts as $cart)
                  <?php $totalHarga = ($cart->barangCart->harga_satuan * $cart->qty); ?>
                   <?php $totalCart += $totalHarga; ?>
                      <tr class="list-group-item-action text-right">
                        <td>{{ $cart->barangCart->nama_barang}}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ number_format($cart->barangCart->harga_satuan,0,',','.') }}</td>
                        <td>{{ number_format($totalHarga,0,',','.') }}</td>
                        <td></td>
                      </tr>
                  @endforeach
                </tbody>
                <tbody>
                  <tr>
                    <th colspan="4">Total</th>
                    <th class="text-right total-cart">Rp. {{ number_format($totalCart,0,',','.') }}</th>
                    <th></th>
                  </tr>
                </tbody>
              </table>
            </a>
          </div>
        </div>
        <div class="list-group">
          <a href="javascript:;" class="list-group-item list-group-item-action ps-3 py-1 mt-1 clean-cart bg-info" onclick="charge()">
            <div class="d-flex w-100 justify-content-center">
              <p class="mb-1 mt-1 text-white">Charge Rp {{ number_format($totalCart,0,',','.') }}</p>
              <input type="hidden" name="paymentTotal" id="paymentTotal" value="{{ $totalCart }}">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
    <script>

      function addCartSearch()
      {
        const barang_id   = $('#barang').val();
        const harga_satuan = barang_id.split('/');
        
        $.ajax({
          type: "get",
          url: "{{ url('addCart') }}",
          data: "barang_id=" + harga_satuan[0] + "&harga_satuan="+ harga_satuan[1],
        });
        // setTimeout(function(){
        //       window.location.reload();
        //     },500);

        $('#barang').val(0);
      }
      // setInterval(1000);

      function charge()
      {
        const total = parseInt($('#paymentTotal').val());

        $.ajax({
          type: "get",
          url: "{{ url('charge') }}",
          data: "total=" + total,
        });
        setTimeout(function(){
        window.location.reload();
        },500);
      }
    </script>
@endpush
