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

      <div class='card'>
        <div class='card-header'><h4>Maklumat Rumah Aduan Ke {{ $times }}</h4></div>
          <table class='table table-bordered'>
            <tr><th>Alamat Rumah</th><td>{{ $house->address }}</td></tr>
            <tr><th>Jenis/Detail Rumah</th><td>{{ $house->type->name }}<br /> </td></tr>
            <tr><th>Maklumat Pemaju</th><td>{{ $house->dev_name }} <br />{{ $house->dev_address }}<br />{{ $house->dev_phone }}</td></tr>
          </table>
        </div>
        <div class='card'>
        <div class='card-header'><h4>Maklumat Aduan</h4></div>
          <table class='table table-bordered'>
            <tr><th>Area</th><th>Area Detail</th><th>Kerosakan</th></tr>
            @forelse($complaints as $complaint)

              <?php $defect = ''; ?>
              @if($complaint->defect_id != 0)
                <?php $defect = $complaint->defect->name; ?>
              @endif
              <tr>
                <td>{{ $complaint->area->name }}</td>
                <td>{{ $complaint->area_detail->name }}</td>
                <td>{{ strtoupper($defect) }}</td>
              </tr>
            @empty
              <tr><td colspan='3'><font color='red'>Belum ada rekod terkini defect/kecacatan bagi rumah ini.</td></tr>
            @endforelse

            @if($report->sent == 0)
              <tr><td colspan="3" align="right"><a href="{{ route('sent', $report->id) }}" class="btn btn-primary">Hantar </a></td></tr>
            @endif
          </table>
        </div>


    </div>
  </div>

@endsection