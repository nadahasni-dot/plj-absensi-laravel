@extends('layout.template')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pegawai {{config('app.name')}}</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pegawai</h6>
            </div>
            <div class="card-body">
              <form class="user" method="post" action="{{ url('pegawai/add') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <h4 class="small font-weight-bold">Name</h4>
                  <input type="text" name="name" class="form-control form-control-user" id="InputName" placeholder="Name">
                  @if($errors->has('name'))
                  <div class="text-danger">
                    {{ $errors->first('name')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">NIP</h4>
                  <input type="number" name="nip" class="form-control form-control-user" id="InputNIP" placeholder="NIP">
                  @if($errors->has('nip'))
                  <div class="text-danger">
                    {{ $errors->first('nip')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Email</h4>
                  <input type="email" name="email" class="form-control form-control-user" id="InputEmail" placeholder="Email">
                  @if($errors->has('username'))
                  <div class="text-danger">
                    {{ $errors->first('username')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Password</h4>
                  <input type="password" name="password" class="form-control form-control-user" id="InputPassword" placeholder="Password">
                  @if($errors->has('password'))
                  <div class="text-danger">
                    {{ $errors->first('password')}}
                  </div>
                  @endif
                </div>
                <button type="sumbit" class="btn btn-primary btn-user btn-block">Tambah</button>
                <hr>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection