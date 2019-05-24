@extends('layouts.template')


@section('title')
<title>Edit Bidang - Accounting</title>
@endsection

@section('page-content')

<div class="container-fluid ">
	<div class="row justify-content-center">
	<div class="col-8">
	  <div class="card shadow mb-4">
	    <!-- Card Header - Dropdown -->
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      <h6 class="m-0 font-weight-bold text-primary">Ubah Data Bidang</h6>
	    </div>
	    <!-- Card Body -->
	    <div class="card-body">

	    {!! Form::model($faculty,array('route'=>['faculties.update',$faculty->id],'method'=> 'PUT')) !!}
	      <div class="form-group col-md-12">
	        <label for="name">Nama Bidang</label>
	        <input type="text" class="form-control" id="name" name="name" placeholder="FDK, FSH.." required="" value="{{ $faculty->name }}">
	      </div>

	    {{-- </form> --}}

	      </div>
	      <div class="modal-footer">
	        <a href="{{ route('faculties.index') }}" class=""><button type="button" class="btn btn-danger">Batal</button></a>
	        <a href="{{ route('faculties.index') }}" class=""><button type="submit" class="btn btn-primary">Simpan Perubahan</button></a>
	      </div>
      	{!! Form::close() !!}

	    </div>
	</div>
	</div>
</div>


@endsection