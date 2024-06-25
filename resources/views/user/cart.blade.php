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
      <div class="row justify-content-center">
        <div class="col-md-11">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif          
            @if (session()->get('cart'))
            <form action="/checkout-pakaian-adat" method="post">
              @csrf
              <div class="card border-0 p-3 shadow mb-3">
                @foreach(session()->get('cart') as $key => $cart)
                      <div class="row align-items-center row-cart" data-cart="{{ $key }}" data-qty="{{ $cart['stok'] }}" data-price="{{ $cart['harga'] }}">
                          <div class="col-md-2">
                              <img src="/user/assets/img/baju-adat/{{ $cart['foto'] }}" class="img-fluid"    alt="">
                          </div>
                          <div class="col-md-6">
                            <h5 class="fw-bold">{{ $cart['nama'] }}</h5>
                            <h6 class="fw-bold">Kuantitas : {{ $cart['stok'] }}</h6>
                            <h6 class="fw-bold">Harga Satuan : {{ number_format($cart['harga'],0,',','.') }}</h6>
                          </div>
                          <div class="col-md-2">
                            <div class="text-end">
                              <div class="alert alert-info">
                                <b class="text-success subtotal" data-subtotal="{{ $cart['stok'] * $cart['harga'] }}">Rp{{ number_format($cart['stok'] * $cart['harga'],0,',','.') }}</b>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 text-end">
                            <a href="/remove-cart/{{ $cart['id_pakaian_adat'] }}" class="btn btn-danger">Hapus</a>
                          </div>
                      </div>
                      <hr>
                  @endforeach
                </div>
                <div class="card shadow border-0 mt-5">
                  <div class="card-header bg-success py-3">
                    <h5 class="my-0 fw-bold text-white">Form Pemesanan</h5>
                  </div>
                  <div class="card-body">
                      <label for="">Nama Pemesan</label>
                      <input type="text" name="nama" class="form-control" required>
                      <br>
                      <label for="">No WA</label>
                      <input type="number" name="no_hp" class="form-control" required>
                      <br>
                      <label for="">Alamat</label>
                      <input type="text" name="alamat" class="form-control" required>
                      <input type="hidden" name="grand_total" id="grand_total">
                      <br>
                      <label for="">Lama Pinjam</label>
                      <select name="hari" id="" class="form-control change-day">
                        @for ($i = 1; $i <= 7; $i++)
                          <option value="{{ $i }}">{{ $i }} Hari</option>
                        @endfor
                      </select>
                      <br>
                      <label for="">Tanggal Pinjam</label>
                      <input type="date" name="tanggal_pinjam" id="" class="form-control">
                      <br>
                      <button class="btn btn-success">Pesan Sekarang</button>
                  </div>
                  <div class="card-footer py-3 text-center">
                    <h5 class="fw-bold">Grand Total : <span class="text-success" id="grand-total">Rp100.000</span></h5>
                  </div>
                </div>
            </form>
            @endif
        </div>
      </div>
    </div>
</section>
@push('custom-script')
  <script>
    $(".change-day").change(function(){
      // var day = parseInt($(this).val())
      // var qty = parseInt($(this).closest('.row-cart').data('qty'))
      // var price = parseInt($(this).closest('.row-cart').data('price'))

      // var subtotal = day * qty * price
      // $(this).closest('.row-cart').find('.subtotal').html("Rp"+formatRupiah(subtotal));
      // $(this).closest('.row-cart').find('.subtotal').attr("data-subtotal",subtotal);
      grandTotal()
    })
    grandTotal()
    function grandTotal(){
      var grandtotal = 0
      $(".subtotal").each(function(){
        var subtotal = parseInt($(this).attr('data-subtotal'))
        grandtotal += subtotal
      })
      var day = parseInt($(".change-day").val())
      grandtotal = grandtotal * day

      $("#grand-total").html("Rp"+formatRupiah(grandtotal))
      $("#grand_total").val(grandtotal)

    }
		function formatRupiah(angka, prefix){
      angka = angka.toString()
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}    
  </script>
@endpush
@endsection 