@extends('layouts.master')


<!-- START PREPARATION -->
@section('type')
Customer
@endsection

@section('customer-active')
active
@endsection

@section('url')
/customer
@endsection
<!-- END PREPARATION -->


<!-- START SHOW TABLE -->
@section('tabel')

<table class="table table-striped table-bordered myTable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Pembeli</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kota</th>
            <th scope="col" class="text-center">Terakhir update</th>
            <th scope="col" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembeli as $data)
        <tr>
            <td>{{$data->kd_pembeli}}</td>
            <td>{{$data->nm_pembeli}}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->kota}}</td>
            <td class="text-center">{{$data->created_at}}</td>
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
<!-- END SHOW TABLE  -->


<!-- START MODAL FORM -->

<!-- START INSERT FORM -->
@section('modalFormInsert')
<div class="form-group">
    <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
    <input type="text" class="form-control" name="nm_pembeli">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Jenis Kelamin :</label>
    <select name="jenis_kelamin" class="form-control">
        <option selected>Pilih..</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
    </select>
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Alamat :</label>
    <textarea type="text" name="alamat" class="form-control" rows="2"></textarea>
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Kota :</label>
    <input type="text" name="kota" class="form-control">
</div>
@endsection
<!-- END INSERT FORM -->

<!-- START EDIT FORM -->
@section('modalFormEdit')
<div class="form-group">
    <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
    <input type="text" class="form-control" name="nm_pembeli" id="modal-input-nama">
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Jenis Kelamin :</label>
    <select name="jenis_kelamin" class="form-control" id="modal-input-gender">
        <option selected>Pilih..</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
    </select>
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Alamat :</label>
    <textarea type="text" name="alamat" class="form-control" rows="2" id="modal-input-alamat"></textarea>
</div>
<div class="form-group">
    <label for="message-text" class="col-form-label">Kota :</label>
    <input type="text" name="kota" class="form-control" id="modal-input-kota">
</div>
@endsection
<!-- END INSERT FORM -->

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
            $('#modal-input-gender').val(data[2]);
            $('#modal-input-alamat').val(data[3]);
            $('#modal-input-kota').val(data[4]);
            $('#editForm').attr('action', '/customer/' + data[0]);
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
            $('#deleteForm').attr('action', '/customer/' + data[0]);
            $('#deleteModal').modal('show');
        });
    });
</script>

@endsection
<!-- END DATATABLES -->
