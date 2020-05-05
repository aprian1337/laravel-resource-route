@extends('layouts.master')

<!-- START PREPARATION -->
@section('type')
Product
@endsection

@section('product-active')
active
@endsection

@section('url')
/product
@endsection
<!-- END PREPARATION -->

<!-- START SHOW TABLE -->
@section('tabel')
<table class="table table-striped table-bordered myTable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Merk</th>
            <th scope="col" style="display: none;">Type</th>
            <th scope="col">Harga</th>
            <th scope="col" style="display: none;">Stok</th>
            <th scope="col" class="text-center">Terakhir update</th>
            <th scope="col" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $data)
        <tr>
            <td>{{$data->kd_brg}}</td>
            <td>{{$data->nm_brg}}</td>
            <td>{{$data->merk}}</td>
            <td style="display: none;">{{$data->type}}</td>
            <td>{{$data->harga}}</td>
            <td style="display: none;">{{$data->stok}}</td>
            <td class="text-center">{{$data->updated_at}}</td>
            <td>
                <div class="text-center">
                    <button type="button" class="btn btn-warning btn-sm edit" data-toggle="modal"
                        data-target="#editModal" data-whatever="@edit" href="#"><i class="far fa-edit"></i>&nbsp;
                        Ubah</button>
                    <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal"
                        data-target="#deleteModal" data-whatever="@delete" href="#"><i
                            class="far fa-trash-alt"></i>&nbsp; Hapus</button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<!-- END SHOW TABEL -->


<!-- START MODAL FORM -->
@section('modalFormInsert')

<div class="form-group">
    <label for="message-text" class="col-form-label">Nama Barang :</label>
    <input type="text" class="form-control" name="nm_brg">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Merk :</label>
    <input type="text" class="form-control" name="merk">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Type :</label>
    <input type="text" class="form-control" name="type">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Harga :</label>
    <input type="text" name="harga" class="form-control">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Stok :</label>
    <input type="number" class="form-control" name="stok">
</div>

@endsection

@section('modalFormEdit')

<div class="form-group">
    <label for="message-text" class="col-form-label">Nama Barang :</label>
    <input type="text" class="form-control" name="nm_brg" id="modal-input-nama">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Merk :</label>
    <input type="text" class="form-control" name="merk" id="modal-input-merk">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Type :</label>
    <input type="text" class="form-control" name="type" id="modal-input-type">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Harga :</label>
    <input type="text" name="harga" class="form-control" id="modal-input-harga">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Stok :</label>
    <input type="number" class="form-control" name="stok" id="modal-input-stok">
</div>

@endsection
<!-- END MODAL FORM -->

<!-- START DATATABLES -->
@section('datatables')

<script type="text/javascript">

    $(document).ready(function () {
        var table = $('.myTable').DataTable();
        // EDIT DATA
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#modal-input-nama').val(data[1]);
            $('#modal-input-merk').val(data[2]);
            $('#modal-input-type').val(data[3]);
            $('#modal-input-harga').val(data[4]);
            $('#modal-input-stok').val(data[5]);


            $('#editForm').attr('action', '/product/' + data[0]);
            $('#editModal').modal('show');
        });

        // DELETE DATA
        table.on('click', '.delete', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#deleteForm').attr('action', '/product/' + data[0]);
            $('#deleteModal').modal('show');
        });


    });

</script>
@endsection
<!-- END DATATABLES -->
