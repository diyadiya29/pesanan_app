@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pesanan Paket Wedding</h1>
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
        {{-- <div class="mb-3">
            <a href="/admin/pesanan-paket-wedding/tambah-pasan-wedding" class="btn btn-primary">+ Tambah Pesanan</a>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pendaftaran</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Grand Total</th>
                        <th>Id Paket Wedding</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Acara</th>
                        <th>Tanggal selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesan_paket as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->kode_pendaftaran}}
                            </td>
                            
                            <td>{{$data->nama}}</td>
                            
                            <td>{{$data->no_hp}}</td>
                           
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->grand_total}}</td>
                            <td>{{$data->id_paket_Wedding}}
                            </td>
                            <td>{{$data->tanggal_pesan}}
                            </td>
                            <td>{{$data->tanggal_acara}}
                            </td>
                            <td>{{$data->tanggal_selesai}}
                            </td>
                            
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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