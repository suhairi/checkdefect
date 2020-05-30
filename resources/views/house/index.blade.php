@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Senarai Rumah Yang Dinilai Kerosakan</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  @include('layouts._ifError')
  @include('layouts._ifSuccess')
  @include('layouts._ifFailed')

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-12">

  		<table class="table table-striped table-bordered table-hover table-sm">
  			<tr>
  				<th>Bil</th>
  				<th>Alamat</th>
  				<th>Nama / Alamat Pemaju / No Telefon </th>
  				<th>Pilihan</th>
  			</tr>

  			@forelse($houses as $house)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><strong>{{ $house->name }}</strong> <br />{{ $house->address }}</td>
					<td><strong>{{ $house->dev_name }} </strong><br />{{ $house->dev_address }}<br /><br />{{ $house->dev_phone }}</td>
					<td align="center">
		                <div class="inline">
							<a href="{{ route('house.edit', $house->id) }}" class="btn btn-primary">Edit</a>
							<a href="{{ route('house.destroy', $house->id)}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><button class="btn btn-danger">Delete</button></a>
		                </div>
					</td>
				</tr>
  			@empty
  				<tr>
  					<td colspan="6">
  						<p class="text-danger">Tiada maklumat/rekod rumah aduan</p>
  					</td>
  				</tr>  				
			@endforelse
  		</table>
  		<p>Sila klik <a href="{{ route('complaint') }}">sini</a> untuk merekodkan 'kecacatan/defect rumah' </p>


	</div>	
</div>



@endsection