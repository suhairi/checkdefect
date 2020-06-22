@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Senarai Kecacatan/Defect Rumah</h1>
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
  				<th>Rumah Rujukan</th>
  				<th>Status</th>
  			</tr>

  			@forelse($reports as $report)
				<tr>
					<td>{{ $loop->iteration }}</td>
          <td><a href="#">{{ $report->house->name }}</a></td>
          <td>
            @if($report->sent == 0)
              <font color="red">
                Belum submit <br />
                <a href="{{ route('sent', $report->id) }}">Hantar</a>
              </font>
            @else
              <font color="green">Sudah submit</font>
            @endif            
          </td>
				</tr>
  			@empty
  				<tr>
  					<td colspan="6">
  						<p class="text-danger">Tiada maklumat/rekod aduan</p>
  					</td>
  				</tr>  				
			  @endforelse
  		</table>

	</div>
</div>

@endsection