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
      <div class="text-center"><a href="#" class="btn btn-success mt-4">Pesan Sekarang</a></div>
    </div><!-- End Section Title -->
</section><!-- /Team Section -->
@endsection 