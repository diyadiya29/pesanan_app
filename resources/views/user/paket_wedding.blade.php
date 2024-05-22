@extends('user/template-user')
@section('konten')
<section id="hero" class="hero section">

      <img src="/user/assets/img/banner.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di Lians Salon</h2>
            <p data-aos="fade-up" data-aos-delay="200">Wujudkan moment kebahagian pernikahan anda bersama kami Lians Salon</p>
          </div>
        </div>
      </div>
</section><!-- /Testimonials Section -->
<!-- Pricing Section -->
<section id="pricing" class="pricing section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
    <h2>Wedding Organizer</h2>
    <p>Paket Pernikahan Spesial dari Lians Salon</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="zoom-in" data-aos-delay="100">

    <div class="row g-4">
        @foreach($wedding as $data)
        <div class="col-lg-4">
        <div class="pricing-item">
            <h3>{{$data->nama_paket}}</h3>
            <img src="/user/assets/img/wedding/{{$data->foto}}" width="100%" alt="" srcset="">
            <h5 class="mt-3 text-center fw-bold">{{$data->harga}}<span></span></h5>
            <p class="text-center">
            {{$data->deskripsi}}
            </p>
            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
        </div>
        </div><!-- End Pricing Item -->
        @endforeach
    </div>

    </div>
</section><!-- /Team Section -->
@endsection