@extends('layouts.template')


@section('title')
<title>Rekap Tabel - Accounting</title>
@endsection

@section('page-content')
        <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekapitulasi Tabel {{ $fil_faculties[0]->name }}</h1>
        <div class="dropdown no-arrow">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#tableModalCenter">
            <i class="fa fa-eye"></i> Cari
          </button>
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fa fa-print"></i> Cetak
          </button>
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-plus"></i> Tambah Data
          </button>
          @include('entry.entry_form')
          @include('table.table_form')

        </div>
      </div>
       
      <!-- Content Row -->

      <div class="row">
        @if($fil_entries->count())
          @include('entry.show')
        @else
        <div class="col-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Rekap </h6>
              </div>
              <!-- Card Body -->
              <div class="card-body justify-content-center">
                <div class="col-12" align="center">
                  {{-- Data Tidak Ditemukan --}}
                  <div class="alert alert-danger">Belum ada data</div>
                </div>
              </div>
          </div>
        </div>
        @endif
      </div>

      @include('entry.all')

    </div>
@endsection