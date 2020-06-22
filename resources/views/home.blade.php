@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  @include('layouts._ifError')
  @include('layouts._ifSuccess')
  @include('layouts._ifFailed')

  <!-- Content Row -->
  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            @if(!empty($profile) && !empty($house))
              Shortcuts
            @else
              Makluman !!
            @endif
          </h6>
          <div class="dropdown no-arrow">
          </div>
        </div>

        
        <div class="card-body">
          <div class="chart-area">

            <!-- if profile incomplete -->
            @if(empty($profile))
              <div class="text-danger font-weight-bold">Sila kemaskini data 'profil' anda.</div>
              <div class="text-secondary">Kemaskini Profil di <a href="{{ route('edit', Auth::user()->id) }}">sini</a></div>
              <br />
            @endif
            
            <!-- if complaint house incomplete -->
            @if(empty($house))
              <div class="text-danger font-weight-bold">Tiada maklumat 'Rumah Aduan'.</div>
              <div class="text-secondary">Daftar/Rekod 'Rumah Aduan' di <a href="{{ route('house.create') }}">sini</a></div>
            @endif

            @if(!empty($profile) && !empty($house))
              <div class="text-secondary">                
                <ol>
                  <li>Kemaskini Profil. <a href="{{ route('edit', Auth::user()->id) }}">Klik sini.</a></li>
                  <!-- <li>Daftar Rumah Baru. <a href="{{ route('house.create') }}">Klik sini.</a></li> -->
                  <li>Kemaskini Maklumat Rumah. <a href="{{ route('house') }}">Klik sini.</a></li>
                </ol>
              </div>
              <br />
            @endif
          </div>
        </div>

      </div>
    </div>

</div>

@endsection