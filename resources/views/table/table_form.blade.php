<!-- Modal -->
<div class="modal fade bd-example-modal-lg text-left" id="tableModalCenter" tabindex="-1" role="dialog" aria-labelledby="tableModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tableModalLongTitle">Cari Rekap Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="{{ route('table.search') }}">
      <div class="modal-body">
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
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-block btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
      </div>
        </form>
    </div>
  </div>
</div>
