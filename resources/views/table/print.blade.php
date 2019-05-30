<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
</head>
<body>
	<div class="col-12">
  <div class="card shadow mb-4">
    <h6 class="font-weight-bold text-primary">Rekapitulasi Tabel {{ $fil_faculties[0]->name }} - {{ $year }}</h6>
    <div class="collapse show" id="collapseCardExample">
    <div class="card-body">
      
      <div class="table-responsive table-sm font-xs" id="printTable">
        <table class="table table-bordered" border="1" cellspacing="0" style="width:max-content; font-size: .7rem">
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

          <tbody>
            <tr>
              <td colspan="8">Saldo Tahun {{ $fil_b[0]->year }}</td>
              <td align="right">{{ number_format(($fil_b[0]->blu_balance),0,'.','.') }}</td>
              {{-- <td>{{ $balance->year->format('Y.m.d') }}</td> --}}
              <td align="right">{{ number_format(($fil_b[0]->rm_balance),0,'.','.') }}</td>
              <td colspan="4"></td>
            </tr>
            
            {{-- Entry Content --}}

            @foreach ($table as $t => $tab)
              @foreach ($fil_entries as $e => $entry)
                  @if($months[$t] === date('M',strtotime($entry->date)))
                    <tr>
                      {{-- Bulan --}}
                      <td rowspan="2">{{ date('M',strtotime($entry->date)) }}</td> 
                      {{-- Tangal --}}
                      <td rowspan="2">{{ Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('d') }}</td>
                      {{-- Akun --}}
                      <td>{{ $entry->account_id }}</td>
                      {{-- Kegiatan --}}
                      <td>{{ $entry->activity_type }}</td>
                      {{-- Penggunaan BLU --}}
                      <td align="right" rowspan="2">
                        {{ $entry->budget_type === 'blu' ? number_format( $entry->spending_blu ,0,'.','.') : '-'  }}
                      </td>
                      {{-- Penggunaan RM --}}
                      <td align="right" rowspan="2">
                        {{ $entry->budget_type === 'rm' ? number_format( $entry->spending_rm ,0,'.','.') : '-'  }}
                      </td>
                      {{-- Serapan BLU --}}
                      <td align="right" rowspan="2">
                        {{ $entry->budget_type === 'blu' ? number_format( $entry->serapan_blu ,0,'.','.') : '-'  }}
                      </td>
                      {{-- Serapan RM --}}
                      <td align="right" rowspan="2">
                        {{ $entry->budget_type === 'rm' ? number_format( $entry->serapan_rm ,0,'.','.') : '-'  }}
                      </td>
                      {{-- Sisa BLU --}}
                      <td align="right" rowspan="2">
                      {{ $entry->budget_type === 'blu' ? number_format( $entry->remain_blu ,0,'.','.') : '-'  }}
                      </td>
                      {{-- Sisa RM --}}
                      <td align="right" rowspan="2">
                      {{ $entry->budget_type === 'rm' ? number_format( $entry->remain_rm ,0,'.','.') : '-'  }}
                      </td>
                      {{-- Persentase BLU --}}
                      <td align="right" rowspan="2">
                        {{ number_format($entry->percent_blu, 2) }}
                      </td>
                      {{-- Persentase RM --}}
                      <td align="right" rowspan="2">
                        {{ number_format($entry->percent_rm, 2) }}
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
                  @endif
              @endforeach
              {{-- end entry --}}
              <tr align="right">
                <td colspan="4">Total {{ date('M',strtotime($table[$t][0]->date)) }}</td>

                <td>{{ number_format( ($table[$t]['total_spending_blu']), 0,'.','.') }}</td>
                <td>{{ number_format( ($table[$t]['total_spending_rm']), 0,'.','.') }}</td>
                <td>{{ number_format( ($table[$t]['total_serapan_blu']), 0,'.','.') }}</td>
                <td>{{ number_format( ($table[$t]['total_serapan_rm']), 0,'.','.') }}</td>
                <td>{{ number_format( ($table[$t]['total_remain_blu']), 0,'.','.') }}</td>
                <td>{{ number_format( ($table[$t]['total_remain_rm']), 0,'.','.') }}</td>
                <td>{{ number_format( ($table[$t]['total_percent_blu']), 2) }}</td>
                <td>{{ number_format( ($table[$t]['total_percent_rm']), 2) }}</td>
                <td>{{ number_format( ($table[$t]['common_size']), 2 ) }}</td>
                <td>{{ number_format( ($table[$t]['trend']), 2) }}</td>
              </tr>
            @endforeach
            {{-- End foreach month --}}
          </tbody>
            
        </table>
      </div>

      {{-- End Table --}}
    </div> {{-- End Card --}}
    </div> {{-- End Collapse --}}
</div>
</body>
</html>