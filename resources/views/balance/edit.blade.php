@extends('layouts.template')

@section('title')
<title>Edit Balance - Accounting</title>
@endsection

@section('page-content')

<div class="container-fluid">
<div class="row padding justify-content-center">
	<div class="col-md-6">
	  <div class="card shadow mb-4">
	    <!-- Card Header - Dropdown -->
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      <h6 class="m-0 font-weight-bold text-primary">Ubah Data Anggaran</h6>
	    </div>
	    <!-- Card Body -->
	    <div class="card-body">
	    	 {{-- {!! Form::open(array('route'=>'balances.store')) !!} --}}
	    	 {!! Form::model($balance,array('route'=>['balances.update',$balance->id],'method'=> 'PUT')) !!}
                  <div class="form-group">
                    <label for="blu">Anggaran BLU</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="blu" name="blu_balance" placeholder="Nominal BLU"  required="" value="{{ $balance->blu_balance }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="rm">Anggaran RM</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="rm" name="rm_balance" placeholder="Nominal RM"  required="" value="{{ $balance->rm_balance }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="date">Tahun Anggaran</label>
                    <input type="date" class="form-control" id="date" name="year" required="" value="{{ $balance->year }}" disabled="">
                  </div>

                  </div>
                  <div class="modal-footer">
	                <a href="{{ route('balances.index') }}" class=""><button type="button" class="btn btn-danger">Batal</button></a>
	                <a href="{{ route('balances.index') }}" class=""><button type="submit" class="btn btn-primary">Simpan</button></a>
                  </div>
                  {!! Form::close() !!}

	    </div>
	</div>
</div>
</div>


@endsection