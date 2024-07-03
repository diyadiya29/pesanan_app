@extends('admin/template-admin')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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
      <!-- Row for boxes -->
      <div class="row">
        <!-- Wedding Booking Box -->
        <div class="col-lg-6 col-6">
          <div class="small-box bg-info">
            <div class="inner" style="background-color: #698474">
              <h3>Pemesanan Wedding</h3>
              <p>Pesan paket wedding</p>
            </div>
            <div class="icon">
              <i class="ion ion-heart"></i>
            </div>
            <a href="/admin/pesanana-paket-wedding" class="small-box-footer" style="background-color: #6B8A7A">
              Data Pemesanan <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- Traditional Clothing Booking Box -->
        <div class="col-lg-6 col-6">
          <div class="small-box bg-success">
            <div class="inner" style="background-color: #627254">
              <h3>Pemesanan Pakaian Adat</h3>
              <p>Pesan pakaian adat</p>
            </div>
            <div class="icon">
              <i class="ion ion-shirt"></i>
            </div>
            <a href="/admin/pesan-pakaian-adat/data-pakaian-adat" class="small-box-footer" style="background-color: #76885B">
              Data Pemesanan <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      
      <!-- Row for statistics -->
      <div class="row">
        <!-- Wedding Statistics Box -->
        <div class="col-lg-6 col-6" style="background-color: #698474">
          <div class="info-box bg-info" style="background-color: #698474">
            <span class="info-box-icon" style="background-color: #698474"><i class="fas fa-ring" style="background-color: #698474"></i></span>
            <div class="info-box-content"style="background-color: #698474">
              <span class="info-box-text">Total Pemesanan Wedding</span>
              <span class="info-box-number">150</span>
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description" >
                70% Increase in 30 Days
              </span>
            </div>
          </div>
        </div>
        <!-- Traditional Clothing Statistics Box -->
        <div class="col-lg-6 col-6" style="background-color: #627254">
          <div class="info-box bg-success" style="background-color: #627254">
            <span class="info-box-icon"style="background-color: #627254"><i class="fas fa-tshirt" style="background-color: #627254"></i></span >
            <div class="info-box-content"style="background-color: #627254">
              <span class="info-box-text"style="background-color: #627254">Total Pemesanan Pakaian Adat</span>
              <span class="info-box-number">120</span>
              <div class="progress">
                <div class="progress-bar" style="width: 60%"></div>
              </div>
              <span class="progress-description">
                60% Increase in 30 Days
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
