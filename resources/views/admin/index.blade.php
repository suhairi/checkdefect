@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Senarai Aduan</h3>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  @include('layouts._ifError')
  @include('layouts._ifSuccess')
  @include('layouts._ifFailed')

  <!-- Content Row -->
  <div class="row">

    <table class="table table-striped">
      <tr>
        <th>Bil</th>
        <th>Nama</th>
        <th>Status <br />
          <small>
            *submit bila bayaran telah dibuat <br />
            *jika client tidak menerima email, minta client pastikan alamat email betul
          </small>
        </th>
      </tr>
      @foreach($reports as $report)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><strong>{{ strtoupper($report->user->name) }}</strong> <br /> {{ strtoupper($report->user->email) }} <br /> {{ $report->user->phone }}</td>
          <td>
            <a href="{{ route('submitPdf', $report->id) }}" class="btn btn-primary">Submit PDF</a><br />
            @if($report->status == 1)
              <font color="green"><strong><small><sup>*</sup></small> Sudah Submit</strong></font>
            @else
              <font color="red"><strong><strong><small><sup>*</sup></small> Belum Submit</strong></font>
            @endif

          </td>
        </tr>
      @endforeach
    </table>


  </div>


@endsection