@extends('app-layout')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" id="dataTable">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID Transaksi</th>
                  <th>Waktu Transaksi</th>
                  <th>Total Harga</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ date('d M Y h:i:s', strtotime($detail->created_at)) }}</td>
                    <td>Rp. {{ number_format($detail->total_harga,0,',','.') }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
