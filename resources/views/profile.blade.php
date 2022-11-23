@extends('layout.template')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Profile</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
              <form class="user" method="post" action="{{ url('profile/update/') }}/{{Session::get('id')}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-user" id="InputName" placeholder="Name" value="{{ $admin->name }}">
                  @if($errors->has('name'))
                  <div class="text-danger">
                    {{ $errors->first('name')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="number" name="nip" class="form-control form-control-user" id="InputNIP" placeholder="NIP" value="{{ $admin->nip }}">
                  @if($errors->has('nip'))
                  <div class="text-danger">
                    {{ $errors->first('nip')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user" id="InputUsername" placeholder="Username" value="{{ $admin->username }}">
                  @if($errors->has('username'))
                  <div class="text-danger">
                    {{ $errors->first('username')}}
                  </div>
                  @endif
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="InputPassword" placeholder="Password">
                    @if($errors->has('password'))
                    <div class="text-danger">
                      {{ $errors->first('password')}}
                    </div>
                    @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repeat_password" class="form-control form-control-user" id="RepeatPassword" placeholder="Repeat Password">
                    @if($errors->has('repeat_password'))
                    <div class="text-danger">
                      {{ $errors->first('repeat_password')}}
                    </div>
                    @endif
                  </div>
                </div>
                <button type="sumbit" class="btn btn-primary btn-user btn-block">Edit</button>
                <hr>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection