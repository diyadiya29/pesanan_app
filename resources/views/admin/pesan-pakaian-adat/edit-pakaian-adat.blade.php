@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Pakaian Adat 1</h1>
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
                <a href="/admin/pakaian-adat/master-pakaian-adat" class="btn btn-primary">Lihat Data</a>
            </div>
            <form action="/admin/pakaian-adat/update-pakaian-adat/{{$pakaian_adat->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="">Nama Produk</label>
                <input type="text" class="form-control" name='nama_produk' value="{{$pakaian_adat->nama_produk}}" required>
                <br>
                <label for="">Harga Produk</label>
                <input type="number" class="form-control" name='harga_produk' value="{{$pakaian_adat->harga}}" required>
                <br>
                <label for="">Stok</label>
                <input type="number" value="{{$pakaian_adat->stok}}" class="form-control" name='stok_produk' required>
                <br>
                <label for="">Foto Produk</label>
                <input type="file" class="form-control" name='foto_produk'>
                <br>
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" class="form-control" required>{{$pakaian_adat->deskripsi}}</textarea>
                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <br>
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection