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
          </div>
           
          <!-- Content Row -->

        <div class="row">
          <div class="col-12">
            <div class="card shadow mb-4 border-bottom-primary">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center">
              <h6 class="m-0 font-weight-bold text-primary">Cari Rekap</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">

                <form method="post" action="{{ route('table.search') }}">
                  {{ csrf_field() }}
                  <div class="form-row py-4 justify-content-center">
                    <div class="form-group col-md-8">
                      <label for="faculty">Bidang</label>
                      <select name="faculty" id="faculty" class="form-control">
                        <option disabled selected>Pilih Satu</option>
                        @foreach ($faculties as $faculty)
                          <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="year">Tahun</label>
                      <select name="year" id="year" class="form-control">
                        <option disabled selected>Pilih Satu</option>
                        @foreach ($years as $year)
                          <option {{ $year == date('Y') ? "selected" : "" }} value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                      <button type="submit" class="btn btn-block btn-primary">Cari</button>
                    </div>
                  </div>
                </form>
              </div>
            </div> {{-- end card --}}
          </div> {{-- end column --}}
        </div> {{-- end row --}}

        <div class="row">
          @include('entry.all')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection