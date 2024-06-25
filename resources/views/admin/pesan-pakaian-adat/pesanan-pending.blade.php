@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pesanan Pakaian Adat Pending</h1>
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
            <a href="" class="btn btn-primary">+ Tambah Paket</a>
        </div> --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif          

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pendaftarn</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Lama Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesan_paket as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->kode_pendaftaran}}</td>
                            <td>
                                {{$data->nama}}
                            </td>
                            <td>{{$data->no_hp}}</td>
                            <td>
                                {{$data->alamat}}
                            </td>
                            <td>
                                {{$data->tanggal_pinjam}}
                            </td>
                            <td>
                                {{$data->lama_pinjam}} Hari
                            </td>
                            <td>
                                {{$data->tanggal_kembali}}
                            </td>
                            <td>
                                {{$data->grand_total}}
                            </td>
                            <td>
                                {{$data->status}}
                            </td>
            
                            <td>
                              <a href="/admin/pesan-pakaian-adat/confirm-data-pakaian-adat-pending/{{ $data->id }}" class="btn btn-primary btn-sm">Confirm</a>
                              <a href="/admin/pesan-pakaian-adat/pesan-detail/{{$data->id}}" class="btn btn-success btn-sm">Detail</a>                              
                              <a href="/admin/pesan-pakaian-adat/delete-data-pakaian-adat-pending/{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a>
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