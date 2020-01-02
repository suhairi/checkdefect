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

    <table class="table">
      @foreach($reports as $report)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><a href="{{ route('report2', $report->user->id) }}">{{ $report->user->name }}</a> (click for saving pdf in the server archive.)</td>
        </tr>
      @endforeach
    </table>


  </div>






@endsection