@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pesanan Pakaian Adat</h1>
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
                        <th>Grand Totak</th>
                        <th>Denda</th>
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
                                {{$data->total_denda}}
                            </td>
                            <td>
                                {{$data->status}}
                            </td>
            
                            <td>
                                <a href="/admin/pesan-pakaian-adat/pesan-detail/{{$data->id}}" class="btn btn-success btn-sm">Detail</a>
                                @if ($data->status == 'disewa')
                                <a href="" data-id="{{ $data->id }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm pengembalian">Pengembalian</a>
                                @endif
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/admin/pesan-pakaian-adat/pengembalian-pakaian-adat" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pengembalian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @csrf
            <input type="hidden" name="id_pesanan" id="id_pesanan">
            <label for="">Tanggal Pengembalian</label>
            <input type="date" class="form-control" name="tanggal_pengembalian">
            <br>
            <label for="">Denda</label>
            <input type="number" class="form-control" name="denda">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
  @push('custom-script')
    <script>
      $(".pengembalian").click(function(e){
        var dataId = $(this).data('id')

        $("#id_pesanan").val(dataId)

      })
    </script>
  @endpush
@endsection