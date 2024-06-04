@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pakaian Adat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-body">
        <div class="mb-3">
            <a href="/admin/pakaian-adat/tambah-pakaian-adat" class="btn btn-primary">+ Tambah Pakaian Adat</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>stok</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_paket as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_produk}}</td>
                            <td>
                                {{$data->stok}}
                            </td>
                            <td>
                                {{$data->harga}}
                            </td>
                            <td>{{$data->deskripsi}}</td>
                            <td>
                            <img src="/user/assets/img/baju-adat/{{$data->foto}}" width="100" alt="" srcset="">
                            </td>
                            <td>
                                <a href="/admin/pakaian-adat/edit-pakaian-adat/{{$data->id}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/admin/pakaian-adat/delete-pakaian-adat/{{$data->id}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection