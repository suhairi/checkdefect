@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Senarai Aduan</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-12">
  		<table class="table table-bordered table-striped">
  			<tr>
  				<th>Bil</th>
  				<th>Name / Phone</th>
  				<th>Status</th>
  				<th>Tindakan</th>
  			</tr>
  			@forelse($complaints as $complaint)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $complaint->user->name }} <br /> <strong>No Tel : </strong>{{ $complaint->user->phone }}</td>
					<td>
						@if($complaint->status == 0)
							<font color="red"><strong>Belum Selesai</strong></font>
						@else
							<font color="green"><strong>Selesai</strong></font>
						@endif
					</td>
					<td><a href="#">hantar report</a></td>
				</tr>
  			@empty
  				<tr><td colspan="4"><font color="red">Tiada Aduan.</font></td></tr>
  			@endforelse
  		</table>
  		
  	</div>
  </div>

</div>


@endsection