@extends('layouts.admin')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kemaskini Profil</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-5">
  		<table class="table table-striped table-bordered table-hover">
  			<tr>
  				<th>Nama</th>
  				<td>{{ Auth::user()->name }}</td>
  			</tr>
  			<tr>
  				<th>Email/Username</th>
  				<td>{{ Auth::user()->email }}</td>
  			</tr>
  			<tr>
  				<th>Alamat Surat Menyurat</th>
  				<td><textarea name="address" class="form-control"></textarea></td>
  			</tr>
  			<tr>
  				<th>Telefon Bimbit</th>
  				<td><input type="text" name="phone" class="form-control" /></td>
  			</tr>
  			<tr>
  				<td colspan="2" align="right">
  					<a href="{{ url('/users/edit', Auth::user()->id) }}"><button class="btn btn-primary">Kemaskini Profil</button></a>
  				</td>
  			</tr>		
  		</table>
  	</div>




@endsection