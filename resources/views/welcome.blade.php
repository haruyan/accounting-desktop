@extends('layouts.template')

@section('page-content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Penggunaan Anggaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><sup>Rp</sup>40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fw fa-shopping-cart fa-2x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Serapan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><sup>Rp</sup>215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fw fa-arrow-down fa-2x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sisa Anggaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><sup>Rp</sup>615,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tag fa-2x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tanggal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= date("M d"); ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-globe fa-2x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->



          <div class="row">

            @include('layouts.recap')

            <div class="col-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  @include('layouts.table')
                </div>
            </div>

            @include('entry.all')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection