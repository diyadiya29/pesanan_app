@extends('user/template-user')
@section('konten')
<section id="hero" class="hero section">

<img src="/user/assets/img/banner.jpg" alt="" data-aos="fade-in">

<div class="container">
  <div class="row">
    <div class="col-lg-10">
      <h2 data-aos="fade-up" data-aos-delay="100">Keranjang Sewa</h2>
      <p data-aos="fade-up" data-aos-delay="200">Keranjang Sewa Pakaian Adat</p>
    </div>
  </div>
</div>

</section><!-- /Hero Section -->
<section>
    <div class="container">
        @foreach(request()->session()->get('id_pakaian_adat') as $key => $cart)
            <div class="row">
                <div class="col-md-2">
                    <img src="/user/assets/img/baju-adat/" class="img-fluid"    alt="">
                </div>
                <div class="col-md-8">

                </div>
                <div class="col-md-2">

                </div>
            </div>
            <hr>
        @endforeach
    </div>
</section>
@endsection 