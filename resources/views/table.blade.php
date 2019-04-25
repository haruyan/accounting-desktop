@extends('layouts.template')

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
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <div class="table-responsive table-sm font-xs">
                    <table class="table table-bordered" style="width:max-content; font-size: .7rem">
                      <thead class="thead-light">
                        <tr>
                          <th rowspan="2">Serapan Bulan</th>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Akun</th>
                          <th rowspan="2" style="width: 250px">Kegiatan</th>
                          <th colspan="2">Penggunaan Anggaran</th>
                          <th colspan="2">Saldo Serapan</th>
                          <th colspan="2">Sisa Anggaran</th>
                          <th colspan="2">Persentase Serapan</th>
                          <th colspan="2">Analisis</th>
                        </tr>
                        <tr>
                          <th>BLU</th>
                          <th>RM</th>
                          <th>BLU</th>
                          <th>RM</th>
                          <th>BLU</th>
                          <th>RM</th>
                          <th>BLU</th>
                          <th>RM</th>
                          <th>Common Size</th>
                          <th>Trend</th>
                        </tr>
                      </thead>

                      {{-- Data Start --}}
                        @php
                          $tahun = '2019';
                        @endphp

                      <tbody>
                        @foreach ($balances as $index => $balance)
                        @if ( Carbon\Carbon::createFromFormat('Y-m-d', $balance->year)->format('Y') === $tahun)
                          <tr>
                            <td colspan="8">Saldo Tahun {{ Carbon\Carbon::createFromFormat('Y-m-d', $balance->year)->format('Y') }}</td>
                            <td>{{ $balance->blu_balance }}</td>
                            {{-- <td>{{ $balance->year->format('Y.m.d') }}</td> --}}
                            <td>{{ $balance->rm_balance }}</td>
                            <td colspan="4"></td>
                          </tr>
                        @endif
                        @endforeach

                        {{-- Entry Content --}}

                        @foreach ($entries as $index => $entry)
                        @if ( Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('Y') === '2019' )
                          <tr>
                            <td rowspan="">Januari</td>
                          </tr>
                        @endif
                        @endforeach
                        <tr>
                          <td rowspan="4">Januari</td>
                          <td rowspan="2">1</td>
                          <td>DC</td>
                          <td>Perjalanan pada FDK bagaimana jika table ini teru panjang</td>
                          <td rowspan="2">2,533,411</td>
                          <td rowspan="2"></td>
                          <td rowspan="2">2,533,411</td>
                          <td rowspan="2"></td>
                          <td rowspan="2">1,342,345,000</td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                        </tr>
                        <tr>
                          <td>424115</td>
                          <td>Pendelegasian, Pendampingan, SMF, BEM pada FDK</td>
                        </tr>
                        <tr>
                          <td rowspan="2">2</td>
                          <td>DA</td>
                          <td>Perjalanan PPL MInor Jurusan</td>
                          <td rowspan="2"></td>
                          <td rowspan="2">4,243,411</td>
                          <td rowspan="2"></td>
                          <td rowspan="2">4,243,411</td>
                          <td rowspan="2"></td>
                          <td rowspan="2">3,48,0,867,000</td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                          <td rowspan="2"></td>
                        </tr>
                        <tr>
                          <td>424111</td>
                          <td>Belanja Perjalanan Biasa</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
            </div>

            @include('entry.all')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection