@extends('layouts.admin')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Merekod Aduan Rumah</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-6">

      @include('layouts._ifError')
      @include('layouts._ifSuccess')
      @include('layouts._ifFailed')

      {!! Form::open(['route' => 'complaint.store', 'method' => 'POST']) !!}

  		<table class="table table-striped table-bordered">
        <tr>
  				<th>Rumah Aduan</th>
          <td>{!! Form::select('name', $houses, null, ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Pilih', 'id' => 'house']) !!}</td>
        </tr>
        <tr>
    			<th>Ruang</th>
          <td>{!! Form::select('area_id', $areas, old('area'),['class' => 'form-control', 'required', 'placeholder' => 'Ruang', 'id' => 'area']) !!}</td>          
        </tr>
        <tr>
          <th>Detail Ruang</th>
          <td>
            <select name="area_detail_id" class="form-control" id="area_detail"><option value="">Pilih Detail Ruang</option></select>
          </td>          
        </tr>
        <tr>
          <th>Kerosakan (Ringkas) </th>
          <td>{{ Form::text('defect', old('defect'), ['class' => 'form-control', 'placeholder' => 'Contoh: Rosak, Condong, Tiada Cat, Merekah']) }}</td>          
        </tr>
        <tr>
          <th>Deskripsi / Nota Tambahan</th>
          <td>{{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '4']) }}</td>
        </tr>
        
        <tr>
          <td colspan="2" align="right"><a href="#"><button class="btn btn-primary">Rekod Aduan</button></a></td>
        </tr>
        <tr>
  			</tr>
      </table>
      {!! Form::close() !!}
      
    </div>
    <div class="col-sm-6 card" id="info" style="padding-top: 5px">here</div>
    <div class="col-sm-6 card" style="padding-top: 5px">here</div>


  </div>


  <script type="text/javascript">

      $(document).ready(function() {

          $('#info').hide();

          $('#house').change(function() {

            var id = $(this).val();
            var _token = $("input[name='_token']").val();

            $.ajax({
                url:"{{ route('house.get_house_info') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data) {
                  console.log(data);
                  $('#info').html(data);                  
                }
              })

            $('#info').show();
          });

          $('#area').change(function() {

            var id = $(this).val();
            var _token = $("input[name='_token']").val();

            $.ajax({
                url:"{{ route('house.get_area_detail') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data) {
                  console.log(data);
                  $('#area_detail').html(data);                  
                }
              })
          });
       

      });
  </script>

@endsection