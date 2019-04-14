<!-- Modal -->
<div class="modal fade bd-example-modal-lg text-left" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      {{-- <form> --}}
        {!! Form::open(array('route'=>'entries.store')) !!}
            
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="account_id">ID Akun</label>
            <input type="text" class="form-control" id="account_id" name="account_id" placeholder="DC, DA, DE, DG, ..." required="">
          </div>
          <div class="form-group col-md-4">
            <label for="account_number">Nomor Akun</label>
            <input type="number" class="form-control" id="account_number" name="account_number" placeholder="525115, 524111, ..." required="">
          </div>
          <div class="form-group col-md-4">
            <label for="date">Tanggal</label>
            <input type="date" class="form-control" id="date" name="date" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="activity_type">Nama Kegiatan</label>
          <input type="text" class="form-control" id="activity_type" name="activity_type" placeholder="Perjalanan ..." required="">
        </div>
        <div class="form-group">
          <label for="activity_desc">Jenis Kegiatan</label>
          <input type="text" class="form-control" id="activity_desc" name="activity_desc" placeholder="Belanja perjalanan, ..." required="">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 mt-2">
            <label class="mr-3">Jenis Anggaran : </label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="budget_type" id="inlineRadio1" value="blu">
              <label class="form-check-label" for="inlineRadio1">BLU</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="budget_type" id="inlineRadio2" value="rm">
              <label class="form-check-label" for="inlineRadio2">RM</label>
            </div>
          </div>
          <div class="form-group col-md-6">
              <label class="sr-only" for="amount">Nominal</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Nominal"  required="">
              </div>
          </div>
        </div>

      {{-- </form> --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
