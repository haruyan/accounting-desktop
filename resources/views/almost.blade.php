@foreach ($months as $m => $month)
@foreach ($entries as $index => $entry)
@if ( Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('M') === $month &&
      Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('Y') === $this_year)
  <tr>
    {{-- Bulan --}}
    <td rowspan="2">{{ $month }}</td> 
    {{-- Tangal --}}
    <td rowspan="2">{{ Carbon\Carbon::createFromFormat('Y-m-d', $entry->date)->format('d') }}</td>
    {{-- Akun --}}
    <td>{{ $entry['account_id'] }}</td>
    {{-- Kegiatan --}}
    <td>{{ $entry->activity_type }}</td>
    {{-- Penggunaan BLU --}}
    <td align="right" rowspan="2">
      {{ $entry->blu_amount }}
      {{-- @if ($entry->budget_type === 'blu')
        {{ $entry->amount }}
      @else
        -
      @endif --}}
    </td>
    {{-- Penggunaan RM --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'rm')
        {{ $entry->amount }}
      @else
        -
      @endif
    </td>
    {{-- Serapan BLU --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'blu')
        {{ $blu_serapan += $entry->amount }}
      @else
        -
      @endif
    </td>
    {{-- Serapan RM --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'rm')
        {{ $rm_serapan += $entry->amount }}
      @else
        -
      @endif
    </td>
    {{-- Sisa BLU --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'blu')
        {{ $blu_sisa = $blu_this_year - $blu_serapan }}
      @else
        -
      @endif
    </td>
    {{-- Sisa RM --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'rm')
        {{ $rm_sisa = $rm_this_year - $rm_serapan }}
      @else
        -
      @endif
    </td>
    {{-- Persentase BLU --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'blu')
        {{ number_format(($blu_persen = ($blu_serapan * 100)/ $blu_this_year), 2) }}
      @else
        -
      @endif
    </td>
    {{-- Persentase RM --}}
    <td align="right" rowspan="2">
      @if ($entry->budget_type === 'rm')
        {{ number_format(($rm_persen = ($rm_serapan * 100)/ $rm_this_year), 2) }}
      @else
        -
      @endif
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
@endforeach
{{-- Row Total Bulanan --}}
@php
  $pengeluaran_bulanan[$m] = ($blu_bulanan + $rm_bulanan);
  $m == 0 ? $analisis_trend = 0 : $analisis_trend = $analisis_trend[$m] - $analisis_trend[$m-1];

@endphp

<tr align="right">
  <td colspan="4">Total {{ $month }}</td>
  <td>{{ $blu_bulanan }}</td>
  <td>{{ $rm_bulanan }}</td>
  <td>{{ $blu_serapan }}</td>
  <td>{{ $rm_serapan }}</td>
  <td>{{ $blu_sisa }}</td>
  <td>{{ $rm_sisa }}</td>
  <td>{{ number_format($blu_persen, 2) }}</td>
  <td>{{ number_format($rm_persen, 2) }}</td>
  <td>{{ number_format( (($blu_serapan + $rm_serapan)*100)/($blu_this_year+$rm_this_year), 2 ) }}</td>
  <td>{{ number_format($analisis_trend, 2) }}</td>
</tr>
{{-- Reset Anggaran Bulanan --}}
@php
  unset($blu_bulanan);
  $blu_bulanan = '0'; $rm_bulanan = '0';
@endphp
@endforeach