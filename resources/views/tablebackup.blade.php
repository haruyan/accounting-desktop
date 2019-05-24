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

              {{-- @include('entry.entry_form') --}}
              
            </div>
          </div>
           
          <!-- Content Row -->

          <div class="row">

            <div class="col-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> --}}
                  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                  </a>
                {{-- </div> --}}
                <!-- Card Body -->
                <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                  
                  <div class="table-responsive table-sm font-xs">
                    <table class="table table-bordered" style="width:max-content; font-size: .7rem">
                      <thead class="thead-light">
                        <tr>
                          <th rowspan="2">Bulan</th>
                          <th rowspan="2">Tanggal</th>
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
                          $this_year = date('Y');
                          $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                          $pengeluaran_bulanan = [];
                          $blu_this_year = 0; $rm_this_year = 0;
                          $blu_serapan = 0; $rm_serapan = 0;
                          $blu_sisa = 0; $rm_sisa = 0;
                          $blu_persen = 0; $rm_persen = 0;
                          $blu_bulanan = 0; $rm_bulanan = 0;
                          $analisis_size = 0; $analisis_trend = 0;
                        @endphp

                      <tbody>
                        @foreach ($balances as $index => $balance)
                        @if ( Carbon\Carbon::createFromFormat('Y-m-d', $balance->year)->format('Y') === $this_year)
                          <tr>
                            <td colspan="8">Saldo Tahun {{ Carbon\Carbon::createFromFormat('Y-m-d', $balance->year)->format('Y') }}</td>
                            <td align="right">{{ number_format(($blu_this_year += $balance->blu_balance),0,'.','.') }}</td>
                            {{-- <td>{{ $balance->year->format('Y.m.d') }}</td> --}}
                            <td align="right">{{ number_format(($rm_this_year += $balance->rm_balance),0,'.','.') }}</td>
                            <td colspan="4"></td>
                          </tr>
                        @endif
                        @endforeach

                        {{-- Entry Content --}}

                        @foreach ($months as $m => $month)
                        @foreach ($entries as $index => $entry)
                        @php
                          $date = date('M',strtotime($entry->date));
                          dd($date);
                        @endphp
                        @if ( Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('M') === $month &&
                              Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('Y') === $this_year)
                          <tr>
                            {{-- Bulan --}}
                            <td rowspan="2">{{ $month }}</td> 
                            {{-- Tangal --}}
                            <td rowspan="2">{{ Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('d') }}</td>
                            {{-- Akun --}}
                            <td>{{ $entry->account_id }}</td>
                            {{-- Kegiatan --}}
                            <td>{{ $entry->activity_type }}</td>
                            {{-- Penggunaan BLU --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'blu' ? 
                                  number_format( ($entry->amount) ,0,'.','.') : '-'  }}
                            </td>
                            {{-- Penggunaan RM --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'rm' ? 
                                  number_format( ($entry->amount) ,0,'.','.') : '-'  }}
                            </td>
                            {{-- Serapan BLU --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'blu' ? 
                                  number_format( ($blu_serapan += $entry->amount) ,0,'.','.') : '-'  }}
                            </td>
                            {{-- Serapan RM --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'rm' ? 
                                  number_format( ($rm_serapan += $entry->amount) ,0,'.','.') : '-'  }}
                            </td>
                            {{-- Sisa BLU --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'blu' ? 
                                  number_format( ($blu_sisa = $blu_this_year - $blu_serapan) ,0,'.','.') : '-'  }}
                            </td>
                            {{-- Sisa RM --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'rm' ? 
                                  number_format( ($rm_sisa = $rm_this_year - $rm_serapan) ,0,'.','.') : '-'  }}
                            </td>
                            {{-- Persentase BLU --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'blu' ? 
                                  number_format( ($blu_persen = ($blu_serapan * 100)/ $blu_this_year), 2) : '-'  }}
                            </td>
                            {{-- Persentase RM --}}
                            <td align="right" rowspan="2">
                              {{ $entry->budget_type === 'rm' ? 
                                  number_format( ($rm_persen = ($rm_serapan * 100)/ $rm_this_year), 2) : '-'  }}
                            </td>
                            {{-- Analisis Common Size --}}
                            <td rowspan="2"></td>
                            {{-- Analisis Trend --}}
                            <td rowspan="2"></td>
                          </tr>
                          <tr>
                            <td>{{ $entry->account_number }}</td>
                            <td>{{ $entry->activity_desc }}</td>
                          </tr>
                          {{-- Set Anggaran Bulanan --}}
                          @php
                          if ($entry->budget_type === 'blu')
                            $blu_bulanan += $entry->amount;
                          else
                            $rm_bulanan += $entry->amount;
                          @endphp

                        @endif
                        
                        @php
                          $pengeluaran_bulanan[$m] = ($blu_bulanan + $rm_bulanan);
                          // $pembagi = $pengeluaran_bulanan[$m];
                          (($m == 1) && ($pengeluaran_bulanan[$m] != 0)) ? $analisis_trend = (($pengeluaran_bulanan[$m]-$pengeluaran_bulanan[$m-1])*100 / $pengeluaran_bulanan[$m-1]) : 0;
                        @endphp

                        @endforeach
                        {{-- End foreach entry --}}
                        {{-- Row Total Bulanan --}}

                        <tr align="right">
                          <td colspan="4">Total {{ $month }}</td>
                          <td>{{ number_format( $blu_bulanan, 0,'.','.') }}</td>
                          <td>{{ number_format( $rm_bulanan, 0,'.','.') }}</td>
                          <td>{{ number_format( $blu_serapan, 0,'.','.') }}</td>
                          <td>{{ number_format( $rm_serapan, 0,'.','.') }}</td>
                          <td>{{ number_format( $blu_sisa, 0,'.','.') }}</td>
                          <td>{{ number_format( $rm_sisa, 0,'.','.') }}</td>
                          <td>{{ number_format( $blu_persen, 2) }}</td>
                          <td>{{ number_format( $rm_persen, 2) }}</td>
                          <td>{{ number_format( ( ($blu_serapan + $rm_serapan)*100) / ($blu_this_year+$rm_this_year), 2 ) }}</td>
                          <td>{{ number_format( $analisis_trend, 2) }}</td>
                        </tr>
                        {{-- Reset Anggaran Bulanan --}}
                        @php
                          unset($blu_bulanan);
                          $blu_bulanan = '0'; $rm_bulanan = '0';
                        @endphp
                        @endforeach
                        {{-- End foreach months --}}
                        
                      </tbody>
                    </table>
                  </div>
                  {{-- End Table --}}
                </div> {{-- End Card --}}
                </div> {{-- End Collapse --}}
            </div>

            @include('entry.all')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection