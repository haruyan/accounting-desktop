@extends('layouts.template')


@section('title')
<title>Bidang - Accounting</title>
@endsection

@section('page-content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan Bidang</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a> --}}
            <button type="button" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-toggle="modal" data-target="#BalanceModal">
              <i class="fa fa-plus"></i> Tambah Bidang
            </button>
          </div>

          <!-- Balance Modal -->
          <!-- Modal -->
          <div class="modal fade bd-example-modal-md text-left" id="BalanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Bidang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  {!! Form::open(array('route'=>'faculties.store')) !!}
                  {!! csrf_field() !!}
                  <div class="form-group col-md-12">
                    <label for="name">Nama Bagian</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="FST, FPK, ..." required="" autofocus>
                  </div>
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  {!! Form::close() !!}

              </div>
            </div>
          </div>


          <!-- Content Row -->

          <div class="row">

            <div class="col-12">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <table class="table table-hover table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($faculties as $index => $faculty)
                          <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $faculty->name }}</td>
                              <td style="width: 80px">
                                <a href="{{ route('faculties.edit',$faculty->id) }}" class="btn-block"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench"></i> Edit</button></a>
                              </td>
                              <td style="width: 90px">
                                {!!  Form::open(array('route'=>['faculties.destroy',$faculty->id],'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!}
                                  {!! Form::button('<i class="fa fa-ban"></i> Hapus',['class'=>'btn btn-danger btn-sm','type'=>'submit']) !!}
                                {!! Form::close() !!} 
                              </td>
                              
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection

@include('layouts.script')
