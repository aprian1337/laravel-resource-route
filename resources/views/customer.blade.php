@extends('layouts.master')


@section('customer-active')
active
@endsection

@section('header-tabel')
Customer
@endsection


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
                                data-target="#editModal" data-whatever="@edit" href="#"><i
                                    class="far fa-edit"></i>&nbsp; Ubah</button>
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
