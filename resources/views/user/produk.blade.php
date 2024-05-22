@extends('user/template-user')
@section("konten")
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
  
<section id="team" class="team section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Pakaian Adat</h2>
    <p>Sewa Pakaian Adat di Lians Salon!</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-5">
    
        @foreach($pakaian_adat as $data)            
            <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                <img src="/user/assets/img/baju-adat/{{$data->foto}}" class="img-fluid" alt="">
                </div>
                <div class="member-info text-center">
                <h4>{{$data->nama_produk}}</h4>
                <span>{{$data->harga}}</span>
                <p>{{$data->deskripsi}}</p>
                </div>
            </div>
        @endforeach

    </div>

  </div>
</section><!-- /Team Section -->
@endsection