@section('headscript')

<script src="{{ asset('startbootstrap/vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" class="init">
  
$(document).ready(function() {
// jQuery(document).ready(function($){
  $('#dataTable').DataTable( {
    "order": [[ 0, "desc" ]]
  } );
} );

</script>
@endsection

<div class="col-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Rekap Data</h6>
        <div class="dropdown no-arrow">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-plus"></i> Tambah Data
          </button>
          @include('entry.entry_form')
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-sm" id="dataTable" style="font-size: .8rem">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Kegiatan</th>
                <th scope="col">Nominal<sup>(Rp)</sup></th>
                <th scope="col">Jenis</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody style="width: max-content">
              @foreach ($entries as $index => $entry)
                  <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $entry->date }}</td>
                      <td>{{ $entry->faculty->name }}</td>
                      <td>{{ $entry->activity_type }}</td>
                      <td>{{ $entry->amount }}</td>
                      <td>
                        @if ($entry->budget_type === "blu")
                          <span class="badge badge-danger">BLU</span>
                        @else
                          <span class="badge badge-primary">RM</span>
                        @endif
                      </td>
                      <td style="width: 80px">
                        <a href="{{ route('entries.edit',$entry->id) }}" class="btn-block"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench"></i> Edit</button></a>
                      </td>
                      <td style="width: 90px">
                        {!!  Form::open(array('route'=>['entries.destroy',$entry->id],'method'=>'DELETE')) !!}
                            {!! Form::button('<i class="fa fa-ban"></i> Hapus',['class'=>'btn btn-danger btn-sm','type'=>'submit']) !!}
                        {!! Form::close() !!} 
                      </td>
                  </tr>
              @endforeach

              </tr>
            </tbody>
          </table>
         
        </div>
      </div>
  </div>
</div>