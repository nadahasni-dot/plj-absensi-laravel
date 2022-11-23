@extends('layout.template')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi Pegawai {{ config('app.name') }}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Absensi Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                  <form method="post" action="{{ url('attendance/date') }}">
                    {{ csrf_field() }}
                    <tbody>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date" id="date" name="date"></td>
                            <td><button class="btn btn-secondary btn-sm"><i class="fas fa-filter"></i> Filter</button></td>
                        </tr>
                    </tbody>
                  </form>
                </table>
                <hr>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Absen Masuk</th>
                            <th>Absen Keluar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Absen Masuk</th>
                            <th>Absen Keluar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($attendance as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->nip }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->clock_in }}</td>
                                <td>{{ $a->clock_out }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
