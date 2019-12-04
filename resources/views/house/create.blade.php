@extends('layouts.admin')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar/Rekod Rumah</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-6">

      @include('layouts._ifError')
      @include('layouts._ifSuccess')

      <form method="POST" action="{{ route('house.store') }}">
      @csrf
  		<table class="table table-striped table-bordered">
        <tr>
  				<th>Nama</th>
          <td><input name="name" value="{{ old('name') }}" class="form-control" required="" autofocus="" placeholder="Sila berikan nama kepada rumah ini" /></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><textarea name="address" class="form-control" required="" placeholder="Alamat Rumah">{{ old('address') }}</textarea></td>
        </tr>
        <tr>
  				<th>Nama Pemaju</th>
          <td><input name="dev_name" value="{{ old('dev_name') }}" class="form-control" required type="text" placeholder="Nama Pemaju" /></td>
        </tr>
        <tr>
  				<th>Alamat Pemaju</th>
          <td><textarea name="dev_address" class="form-control" required placeholder="Alamat Pemaju">{{ old('dev_address') }}</textarea></td>
        </tr>
        <tr>
  				<th>No Telefon Pemaju </th>
          <td><input name="dev_phone" value="{{ old('dev_phone') }}" class="form-control" required type="text" placeholder="Contoh: 047728888" /></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><a href="#"><button class="btn btn-primary">Rekod Rumah</button></a></td>
        </tr>
        <tr>
  			</tr>
      </table>
      </form>
      
    </div>
  </div>

@endsection