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

    <table class="table table-hover">
      @foreach($complaints as $complaint)
        <tr><td><strong>Nama </strong></td><td>:</td><td>{{ $complaint->user->name }}</td></tr>
        <tr><td><strong>I/C No </strong></td><td>:</td><td>&nbsp;</td></tr>
        <tr><td><strong>Contact</strong></td><td>:</td><td>{{ $complaint->user->phone}}</td></tr>
        <tr><td><strong>House No</strong></td><td>:</td><td>{{ $complaint->house->address }}</td></tr>
        <tr><td><strong>Date</strong></td><td>:</td><td>{{ $complaint->house->valuation_date }}</td></tr>
      @endforeach
    </table>


  </div>



@endsection