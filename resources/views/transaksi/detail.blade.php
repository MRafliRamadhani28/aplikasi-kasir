@extends('app-layout')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mb-4">
      <select class="single-select w-100 mb-1" id="detail" name="detail" onChange="showDetail()">
        <option selected disabled>Pilih Transaksi</option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}">{{ $detail->id }} - {{ date('d M Y h:i:s', strtotime($detail->created_at)) }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-12" id="dataTable">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID Transaksi</th>
                  <th>Barang yang dibeli</th>
                  <th>Total Harga</th>
                  <th>Waktu Transaksi</th>
                </tr>
              </thead>
              <tbody id="tBody">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@push('js')
    <script>

      function showDetail()
      {
        const detail_id = $('#detail').val();

        $.ajax({
          type: "get",
          url: "{{ url('showDetail') }}",
          data: "id=" + detail_id,
          success: (data) => {
            $('#tBody').html(data);
            $('#barang').val(0);
          }
        });
        // setTimeout(function(){
          // window.location.reload();
        // },500);
      }
    </script>
@endpush
