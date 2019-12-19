@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Kemaskini Profil</h3>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-5">

  		@include('layouts._ifError')
      @include('layouts._ifSuccess')

      <form class="user" method="post" action="{{ route('update') }}">
  		@csrf
  		<table class="table table-striped table-bordered table-hover">
  			<tr>
  				<td><strong>Nama</strong> <br />{{ Auth::user()->name }}</td>  			
        </tr>
  			<tr>
  				<td><strong>Email/Username</strong> <br />{{ Auth::user()->email }}</td>
  			</tr>
  			<tr>
  				<td><strong>Alamat Surat Menyurat</strong> <br /><textarea name="address" class="form-control">{{ $profile->address }}</textarea></td>
  			</tr>
  			<tr>
  				<td><strong>Telefon Bimbit</strong> <br /><input type="text" name="phone" class="form-control" value="{{ $profile->phone }}" /></td>
  			</tr>
  			<tr>
  				<td align="right">
  					<a href="{{ url('/users/edit', Auth::user()->id) }}"><button class="btn btn-primary">Kemaskini Profil</button></a>
  				</td>
  			</tr>		
  		</table>
  		</form>

  	</div>




@endsection