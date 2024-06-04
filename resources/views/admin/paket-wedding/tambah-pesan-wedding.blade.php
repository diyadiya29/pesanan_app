@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pesan Wedding</h1>
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
                <a href="/admin/pesanana-paket-wedding" class="btn btn-primary">Lihat Data</a>
            </div>
            <form action="/admin/pesanan-paket-wedding/simpan-pasan-wedding" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Kode Pendaftaran</label>
                <input type="text" class="form-control" name='kode_pendaftaran' required>
                <br>
                <label for="">Nama</label>
                <input type="number" class="form-control" name='nama_pesan' required>
                <br>
                <label for="">No Hp</label>
                <input type="number" class="form-control" name='no_hp' required>
                <br>
                <label for="">Alamat</label>
                <input type="number" class="form-control" name='alamat_pesan' required>
                <br>
                <label for="">Grand Total</label>
                <input type="number" class="form-control" name='grand_total' required>
                <br>
                <label for="">Id Paket Wedding</label>
                <input type="number" class="form-control" name='id_paket_wedding' required>
                <br>
                <label for="">Tanggal Pesan</label>
                <input type="number" class="form-control" name='tanggal_pesan' required>
                <br>
                <label for="">Tanggal Acara</label>
                <input type="number" class="form-control" name='tanggal_acara' required>
                <br>
                <label for="">Tanggal Selesai</label>
                <input type="number" class="form-control" name='tanggal_selesai' required>
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