@extends('layouts.template')


@section('title')
<title>Rekap Tabel - Accounting</title>
@endsection

@section('page-content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rekapitulasi Tabel</h1>
            <div class="dropdown no-arrow">
              <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Tambah Data
              </button>

              @include('entry.entry_form')
              
            </div>
          </div>
           
          <!-- Content Row -->

          <div class="row">

            @include('entry.all')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection