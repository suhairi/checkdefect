@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User's Profile</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-3">
  		<table class="table table-striped table-bordered table-hover">
  			<tr>
  				<td><strong>Nama : </strong><br />{{ Auth::user()->name }}</td>
  			</tr>
  			<tr>
  				<td><strong>Email/Username : </strong><br />{{ Auth::user()->email }}</td>
  			</tr>
  			<tr>
  				<td><strong>Address : </strong><br />{{ Auth::user()->address }}</td>
  			</tr>
  			<tr>
  				<td><strong>Telephone No. </strong><br />{{ Auth::user()->phone }}</td>
  			</tr>
  			<tr>
  				<td colspan="2" align="right">
  					<a href="{{ url('/users/edit', Auth::user()->id) }}"><button class="btn btn-primary">Kemaskini Profil</button></a>
  				</td>
  			</tr>		
  		</table>
  	</div>



  </div>
</div>


@endsection