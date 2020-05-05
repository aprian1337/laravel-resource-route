@extends('layouts.master')

<!-- START PREPARATION -->
@section('type')
Transaction
@endsection

@section('transaction-active')
active
@endsection

@section('url')
/transaction
@endsection
<!-- END PREPARATION -->

<!-- START SHOW TABLE -->
@section('tabel')
<table class="table table-striped table-bordered myTable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tanggal Pembelian</th>
            <th scope="col">Detail Pembeli</th>
            <th scope="col" class="text-center">Detail Barang</th>
            <th scope="col" class="text-center">Harga Barang</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $data)
        <tr>
            <td>{{$data->kd_trx}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->nm_pembeli}} - {{$data->kota}}</td>
            <td>{{$data->nm_brg}} - {{$data->merk}}</td>
            <td>{{$data->harga}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<!-- END SHOW TABEL -->


<!-- START MODAL FORM -->
@section('modalFormInsert')

<div class="form-group">
    <label for="message-text" class="col-form-label">Pembeli :</label>
    <select name="kd_pembeli" class="form-control">
        <option value="">Pilih..</option>
        @foreach($pembeli as $data)
            <option value="{{$data->kd_pembeli}}">{{$data->nm_pembeli}} - {{$data->kota}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Detail Barang :</label>
    <select name="kd_brg" class="form-control">
        <option value="">Pilih..</option>
        @foreach($barang as $data)
            <option value="{{$data->kd_brg}}">{{$data->nm_brg}} - {{$data->merk}}</option>
        @endforeach
    </select>
</div>

@endsection
<!-- END MODAL FORM -->

<!-- START DATATABLES -->
@section('datatables')

<script type="text/javascript">

    $(document).ready(function () {
        $('.myTable').DataTable();
    });

</script>
@endsection
<!-- END DATATABLES -->
