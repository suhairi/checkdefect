@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Rekod Pengguna</h3>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  @include('layouts._ifError')
  @include('layouts._ifSuccess')
  @include('layouts._ifFailed')

  <!-- Content Row -->
  <div class="row">


    {!! Form::open(['route' => 'postRegister', 'method' => 'POST']) !!}
    <table class="table table-bordered table-striped">
      <tr>
        <td>Nama</td>
        <td><input type="text" name="fullName" placeholder="Nama Penuh" class="form-control" required /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email" placeholder="Email" class="form-control" required /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" name="password" placeholder="Password" class="form-control" required /></td>
      </tr>
      <tr>
        <td>No Telefon</td>
        <td><input type="text" name="noPhone" placeholder="0123456789" class="form-control" required /></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><a href="#"><button class="btn btn-primary">Rekod Pengguna</button></a></td>
      </tr>
    </table>
    {!! Form::close() !!}


  </div>


@endsection