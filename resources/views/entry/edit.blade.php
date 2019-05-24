@extends('layouts.template')


@section('title')
<title>Edit Entry - Accounting</title>
@endsection

@section('page-content')

<div class="container-fluid">
	<div class="col-12">
	  <div class="card shadow mb-4">
	    <!-- Card Header - Dropdown -->
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
	    </div>
	    <!-- Card Body -->
	    <div class="card-body">

	    {!! Form::model($entry,array('route'=>['entries.update',$entry->id],'method'=> 'PUT')) !!}
			<div class="form-group">
			    <label class="sr-only" for="amount">Bidang</label>
			    <div class="input-group">
			      <div class="input-group-prepend">
			        <div class="input-group-text">Bidang</div>
			      </div>
			      <select name="faculty_id" id="faculty_id" class="form-control">
			        <option disabled selected>Pilih Satu</option>
			        @foreach ($faculties as $faculty)
    			      <option {{ $entry->faculty_id == $faculty->id ? "selected" : "" }} value="{{ $faculty->id }}">{{ $faculty->name }}</option>
    			    @endforeach
			      </select>
			    </div>
			</div>
	        <div class="form-row">
	        	<div class="form-group col-md-4">
	              <label for="account_id">ID Akun</label>
	              <input type="text" class="form-control" id="account_id" name="account_id" placeholder="DC, DA, DE, DG, ..." required="" value="{{ $entry->account_id }}">
	            </div>
	            <div class="form-group col-md-4">
	              <label for="account_number">Nomor Akun</label>
	              <input type="number" class="form-control" id="account_number" name="account_number" placeholder="525115, 524111, ..." required="" value="{{ $entry->account_number }}">
	            </div>
	            <div class="form-group col-md-4">
	              <label for="date">Tanggal</label>
	              <input type="date" class="form-control" id="date" name="date" required="" value="{{ $entry->date }}">
	            </div>
	        </div>
	        <div class="form-group">
	            <label for="activity_type">Nama Kegiatan</label>
	            <input type="text" class="form-control" id="activity_type" name="activity_type" placeholder="Perjalanan ..." required="" value="{{ $entry->activity_type }}">
	        </div>
	        <div class="form-group">
	            <label for="activity_desc">Jenis Kegiatan</label>
	            <input type="text" class="form-control" id="activity_desc" name="activity_desc" placeholder="Belanja perjalanan, ..." required="" value="{{ $entry->activity_desc }}">
	        </div>
	        <div class="form-row">
	            <div class="form-group col-md-6 mt-2">
	              <label class="mr-3">Jenis Anggaran : </label>
	              <div class="form-check form-check-inline">
	                <input class="form-check-input" type="radio" name="budget_type" id="inlineRadio1" value="blu" {{ $entry->budget_type == "blu" ? "checked" : ""}}>
	                <label class="form-check-label" for="inlineRadio1">BLU</label>
	              </div>
	              <div class="form-check form-check-inline">
	                <input class="form-check-input" type="radio" name="budget_type" id="inlineRadio2" value="rm" {{ $entry->budget_type == "rm" ? "checked" : ""}}>
	                <label class="form-check-label" for="inlineRadio2">RM</label>
	              </div>
	            </div>
	            <div class="form-group col-md-6">
	                <label class="sr-only" for="amount">Nominal</label>
	                <div class="input-group">
	                  <div class="input-group-prepend">
	                    <div class="input-group-text">Rp</div>
	                  </div>
	                  <input type="number" class="form-control" id="amount" name="amount" placeholder="Nominal"  required="" value="{{ $entry->amount }}">
	                </div>
	            </div>
	        </div>

	            {{-- </form> --}}

	              </div>
	              <div class="modal-footer">
	                <a href="{{ url()->previous() }}" class=""><button type="button" class="btn btn-danger">Batal</button></a>
	                <a href="{{ url('/table') }}" class=""><button type="submit" class="btn btn-primary">Simpan Perubahan</button></a>
	              </div>
      	{!! Form::close() !!}

	    </div>
	</div>
</div>


@endsection