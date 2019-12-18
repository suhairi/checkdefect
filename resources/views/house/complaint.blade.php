@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Merekod Aduan Rumah</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-12">

      @include('layouts._ifError')
      @include('layouts._ifSuccess')
      @include('layouts._ifFailed')

      {!! Form::open(['route' => 'complaint.store', 'method' => 'POST', "enctype" => "multipart/form-data"]) !!}

  		<table class="table table-striped table-bordered">
        <tr>
  				<th>
            Rumah Aduan
            {!! Form::select('name', $houses, null, ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Pilih', 'id' => 'house']) !!}
          </th>
        </tr>
        <tr>
          <th>
            Gambar Kerosakan
            {{ Form::file('image', ['class' => 'form-control']) }}
          </th>
        </tr>
        <tr>
    			<th>
            Ruang
            {!! Form::select('area_id', $areas, old('area'),['class' => 'form-control', 'required', 'placeholder' => 'Ruang', 'id' => 'area']) !!}
          </th>                    
        </tr>
        <tr>
          <th>
            Detail Ruang
            <select name="area_detail_id" class="form-control" id="area_detail"><option value="">Pilih Detail Ruang</option></select>
          </th>         
        </tr>
        <tr>
          <th>
            Kerosakan (Ringkas) 
            {{ Form::text('defect', old('defect'), ['class' => 'form-control', 'placeholder' => 'Contoh: Rosak, Condong, Tiada Cat, Merekah']) }}
          </th>                    
        </tr>
        <tr>
          <th>
            Deskripsi / Nota Tambahan
            {{ Form::textarea('notes', old('notes'), ['class' => 'form-control', 'rows' => '4']) }}
          </th>          
        </tr>      
        
        <tr>
          <td align="right"><a href="#"><button class="btn btn-primary">Rekod Aduan</button></a></td>
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
                  // console.log(data);
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