@extends('user/template-user')
@section('konten')
<section id="hero" class="hero section">
      @php
        $foto = explode(',',$data_paket->foto);
      @endphp

      <img src="/user/assets/img/wedding/{{$foto[0]}}" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100" class="mb-3">{{$data_paket->nama_paket}}</h2>
            <div class="btn btn-primary d-inline fw-bold" data-aos="fade-up" data-aos-delay="200">
              Rp {{number_format($data_paket->harga,0,',','.')}}
            </div>
          </div>
        </div>
      </div>
</section><!-- /Testimonials Section -->
<!-- Pricing Section -->
<section id="pricing" class="pricing section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Deskripsi Paket</h2>
      <p>{{$data_paket->deskripsi}}</p>
      <div class="row justify-content-center mt-3">
        @foreach($foto as $item)
          <div class='col-lg-3'>
            <img src="/user/assets/img/wedding/{{$item}}" class="img-detail" alt="" data-aos="fade-in">
          </div>
        @endforeach
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif          
          <form action="/store-pesan-wedding" method="post">
            @csrf
            <input type="hidden" name="id_paket_wedding" value="{{ $data_paket->id }}">
            <input type="hidden" name="grand_total" value="{{ $data_paket->harga }}">
            <div class="card shadow border-0 mt-5">
              <div class="card-header bg-success py-3">
                <h5 class="my-0 fw-bold text-white">Form Pemesanan</h5>
              </div>
              <div class="card-body text-start">
                  <label for="">Nama Pemesan</label>
                  <input type="text" name="nama" class="form-control" required>
                  <br>
                  <label for="">No WA</label>
                  <input type="number" name="no_hp" class="form-control" required>
                  <br>
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" class="form-control" required>
                  <br>
                  <label for="">Tanggal Acara</label>
                  <input type="date" name="tanggal_acara" class="form-control" required>
                  <br>
                  <label for="">Tanggal Selesai</label>
                  <input type="date" name="tanggal_selesai" class="form-control" required>
                  <br>
                  <button class="btn btn-success">Pesan Sekarang</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!-- End Section Title -->
</section><!-- /Team Section -->
@endsection 