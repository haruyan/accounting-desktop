@extends('layouts.template')

@section('page-content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anggaran Tahunan</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a> --}}
            <button type="button" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-toggle="modal" data-target="#BalanceModal">
              <i class="fa fa-plus"></i> Tambah Data
            </button>
          </div>

          <!-- Balance Modal -->
          <!-- Modal -->
          <div class="modal fade bd-example-modal-md text-left" id="BalanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Anggaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  {!! Form::open(array('route'=>'balances.store')) !!}
                  <div class="form-group">
                    <label for="blu">Anggaran BLU</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="blu" name="blu_balance" placeholder="Nominal BLU"  required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="rm">Anggaran RM</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="rm" name="rm_balance" placeholder="Nominal RM"  required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="date">Tahun Anggaran</label>
                    <input type="date" class="form-control" id="date" name="year" required="">
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
                        <th scope="col">Tahun</th>
                        <th scope="col">Anggaran BLU</th>
                        <th scope="col">Anggaran RM<sup>(Rp)</sup></th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($balances as $index => $balance)
                          <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $balance->year }}</td>
                              <td>{{ $balance->blu_balance }}</td>
                              <td>{{ $balance->rm_balance }}</td>
                              <td style="width: 80px">
                                <a href="{{ route('balances.edit',$balance->id) }}" class="btn-block"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench"></i> Edit</button></a>
                              </td>
                              <td style="width: 90px">
                                {!!  Form::open(array('route'=>['balances.destroy',$balance->id],'method'=>'DELETE')) !!}
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