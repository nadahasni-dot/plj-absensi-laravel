@extends('layout.template')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Jadwal {{config('app.name')}}</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
            </div>
            <div class="card-body">
              <form class="user" method="post" action="{{ url('schedule/update') }}/{{ $schedule->id }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                  <h4 class="small font-weight-bold">Latitude</h4>
                  <input type="text" name="lat" class="form-control form-control-user" id="InputLatitude" placeholder="Latitude" value="{{ $schedule->lat }}">
                  @if($errors->has('lat'))
                  <div class="text-danger">
                    {{ $errors->first('lat')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Longitude</h4>
                  <input type="text" name="lng" class="form-control form-control-user" id="InputLongitude" placeholder="Longitude" value="{{ $schedule->lng }}">
                  @if($errors->has('lng'))
                  <div class="text-danger">
                    {{ $errors->first('lng')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Radius</h4>
                  <input type="number" name="radius" class="form-control form-control-user" id="InputRadius" placeholder="Radius" value="{{ $schedule->radius }}">
                  @if($errors->has('radius'))
                  <div class="text-danger">
                    {{ $errors->first('radius')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Nama Kantor</h4>
                  <input type="text" name="office" class="form-control form-control-user" id="InputOffice" placeholder="Nama Kantor" value="{{ $schedule->office }}">
                  @if($errors->has('office'))
                  <div class="text-danger">
                    {{ $errors->first('office')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Jadwal Masuk</h4>
                  <input type="time" name="clock_in" class="form-control form-control-user" id="InputClockIn" placeholder="Jadwal Masuk" value="{{ $schedule->clock_in }}">
                  @if($errors->has('clock_in'))
                  <div class="text-danger">
                    {{ $errors->first('clock_in')}}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <h4 class="small font-weight-bold">Jadwal Pulang</h4>
                  <input type="time" name="clock_out" class="form-control form-control-user" id="InputClockOut" placeholder="Jadwal Pulang" value="{{ $schedule->clock_out }}">
                  @if($errors->has('clock_out'))
                  <div class="text-danger">
                    {{ $errors->first('clock_out')}}
                  </div>
                  @endif
                </div>
                <button type="sumbit" class="btn btn-primary btn-user btn-block">Edit</button>
                <hr>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection