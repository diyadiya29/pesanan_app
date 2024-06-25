@extends('user/template-user')
@section('konten')
<section id="hero" class="hero section">
      @php
        $foto = explode(',',$data_paket->foto);
      @endphp

      <img src="/user/assets/img/baju-adat/{{$foto[0]}}" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100" class="mb-3">{{$data_paket->nama_produk}}</h2>
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
            <img src="/user/assets/img/baju-adat/{{$item}}" class="img-detail" alt="" data-aos="fade-in">
          </div>
        @endforeach
      </div>
    </div><!-- End Section Title -->
    <div class="container">
        <form action="/simpan-cart-pakaian-adat" method="post">
            @csrf
            @php
              $cart = Session::get('cart');
              $isLimit = false;

              $minStok = 0;
              if($cart && count($cart) != 0){
                $id = $data_paket->id;
                $filtered_pakaian_adat = array_filter($cart, function($item) use($id) {
                    return $item['id_pakaian_adat'] == $id;
                });
                if(count($filtered_pakaian_adat) == 1){
                  $key = array_keys($filtered_pakaian_adat)[0];
                  $minStok = $cart[$key]['stok'];
                }
              }


              if($data_paket->stok > 3){
                  $limitPaket = 3;
                  $limit = 3;
              }
              else{
                  $limitPaket = $data_paket->stok;
                  $limit = $data_paket->stok;
              }
              $limitPaket -= $minStok;

              if($cart && count($cart) != 0){
                $id = $data_paket->id;
                $filtered_pakaian_adat = array_filter($cart, function($item) use($id) {
                    return $item['id_pakaian_adat'] == $id;
                });
                if(count($filtered_pakaian_adat) == 1){
                  $key = array_keys($filtered_pakaian_adat)[0];
                  if($cart[$key]['stok'] == $limit){
                    $isLimit = true;
                  }
                }
              }
          @endphp
          @if ($isLimit)
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="alert alert-danger fw-bold text-center">Maaf Sudah Melebihi Batas Pesan</div>
                </div>
              </div>
          @else
            <div class="row align-items-end justify-content-center">
                <div class="col-lg-3">
                    <label for=""><b>Pilih Stok</b></label>
                    <input type="hidden" name="id_pakaian_adat" value="{{$data_paket->id}}">
                    <input type="hidden" name="harga" value="{{$data_paket->harga}}">
                    <input type="hidden" name="foto" value="{{$foto[0]}}">
                    <input type="hidden" name="nama" value="{{$data_paket->nama_produk}}">
                    <select name="stok" id="" class="form-control">
                        @for($i=1;$i<=$limitPaket;$i++)
                            <option>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                </div>
            </div>
          @endif
        </form>
</section><!-- /Team Section -->
@endsection 