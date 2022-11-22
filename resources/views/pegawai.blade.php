@extends('layout.template')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pegawai {{config('app.name')}}</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Pegawai</h6>
              <a href="{{ url('pegawai/tambah/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-fw fa-plus"></i>
                  Tambah Pegawai
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nip</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nip</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($pegawai as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nip }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>
                            <a href="{{ url('pegawai/edit') }}/{{ $p->id }}">
                                <button class="btn btn-info btn-sm btn-circle"><i class="fas fa-fw fa-edit"></i></button>
                            </a>
                            |
                            <a href="#" data-toggle="modal" data-target="#deleteModal-{{ $p->id }}">
                                <button class="btn btn-danger btn-sm btn-circle"><i class="fas fa-fw fa-trash"></i></button>
                            </a>
                            <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                            </a> -->
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @foreach($pegawai as $peg)
                <!-- Delete Modal-->
                    <div class="modal fade" id="deleteModal-{{ $peg->id }}" aria-labelledby="exampleModalLabel{{ $peg->id }}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $peg->id }}">Hapus pegawai?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <tr>
                              <td>NIP</td>
                              <td>:</td>
                              <td>{{ $peg->nip }}</td>
                            </tr>
                            <br>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td>{{ $peg->name }}</td>
                            </tr>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger" href="{{ url('pegawai/delete') }}/{{ $peg->id }}">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection