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

      {!! Form::open(['route' => 'house.complaint.store', 'method' => 'POST']) !!}

  		<table class="table table-striped table-bordered">
        <tr>
  				<th>Rumah Aduan</th>
          <td>{!! Form::select('name', $houses, null, ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Pilih', 'id' => 'house']) !!}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>{!! Form::textarea('address', old('address'), ['id' => 'type', 'class' => 'form-control', 'required', 'placeholder' => 'Alamat Rumah Aduan', 'rows' => '4']) !!}</td>          
        </tr>
        <tr>
          <th>Jenis Rumah</th>
          <td>
              <select name="type" id="type" class="form-control">
                <option value=''>Pilih Jenis Rumah</option>
              </select> 
        </tr>
        <tr>
          <th>Detail Jenis Rumah</th>
          <td>
            <select name="type_detail" class="form-control dynamic" id="type_details">
              <option value=''>Pilih Detail Jenis Rumah</option>
            </select>
        </tr>
        <tr>
  				<th>Nama Pemaju</th>
          <td>{!! Form::text('dev_name', old('dev_name'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Pemaju']) !!}</td>
          
        </tr>
        <tr>
  				<th>Alamat Pemaju</th>
          <td>{!! Form::textarea('dev_address', old('dev_address'), ['class' => 'form-control', 'required', 'placeholder' => 'Alamat Pemaju', 'rows' => '4']) !!}</td>
        </tr>
        <tr>
  				<th>No Telefon Pemaju </th>
          <td>{!! Form::text('dev_phone', old('dev_phone'), ['class' => 'form-control', 'required', 'placeholder' => 'Contoh: 047728888']) !!}</td>
        </tr>
        <tr>
          <td colspan="2" align="right"><a href="#"><button class="btn btn-primary">Rekod Rumah</button></a></td>
        </tr>
        <tr>
  			</tr>
      </table>
      {!! Form::close() !!}
      
    </div>
    <div class="col-sm-6 card" id="info" style="padding-top: 5px">
      
    </div>
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
       

      });
  </script>

@endsection