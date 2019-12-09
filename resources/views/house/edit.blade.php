@extends('layouts.admin')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Daftar/Rekod Rumah</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-6">

      @include('layouts._ifError')
      @include('layouts._ifSuccess')
      @include('layouts._ifFailed')

      {!! Form::open(['route' => 'house.store', 'method' => 'POST']) !!}

  		<table class="table table-striped table-bordered">
        <tr>
  				<th>Nama</th>
          <td>{!! Form::text('name', old('name'), ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Sila berikan nama kepada rumah ini']) !!}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>{!! Form::textarea('address', old('address'), ['id' => 'type', 'class' => 'form-control', 'required', 'placeholder' => 'Alamat Rumah Aduan', 'rows' => '4']) !!}</td>          
        </tr>
        <tr>
          <th>Jenis Rumah</th>
          <td>
              <select name="type_id" id="type" class="form-control" required="">
                <option value=''>Pilih Jenis Rumah</option>
                @foreach($types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select> 
        </tr>
        <tr>
          <th>Detail Jenis Rumah</th>
          <td>
            <select name="type_detail_id" class="form-control dynamic" id="type_details">
              <option value=''>Pilih Detail Jenis Rumah</option>
            </select>
        </tr>
        <tr>
          <th>Tarikh Penilaian</th>
          <td>{!! Form::date('valuation_date', old('valuation_date'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Pemaju']) !!}</td>
        </tr>
        <tr>
  				<th>Nama Pemaju</th>
          <td>{!! Form::text('dev_name', old('dev_name'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Pemaju']) !!}</td>
        </tr>
        <tr>
  				<th>Alamat Pemaju</th>
          <td>{!! Form::textarea('dev_address', old('dev_address'), ['class' => 'form-control', 'placeholder' => 'Alamat Pemaju', 'rows' => '4']) !!}</td>
        </tr>
        <tr>
  				<th>No Telefon Pemaju </th>
          <td>{!! Form::text('dev_phone', old('dev_phone'), ['class' => 'form-control', 'placeholder' => 'Contoh: 047728888']) !!}</td>
        </tr>
        <tr>
          <td colspan="2" align="right"><a href="#"><button class="btn btn-primary">Rekod Rumah</button></a></td>
        </tr>
        <tr>
  			</tr>
      </table>
      {!! Form::close() !!}
      
    </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {

          $("select[name='type_id'").change(function() {

            var value = $(this).val();
            var url = "{{ route('house.get_by_type', ':value') }}";
            url = url.replace(':value', value);
            var _token = $("input[name='_token']").val();

            if($(this).val() != '') {

              $.ajax({
                url:"{{ route('house.get_by_type') }}",
                method:"POST",
                data:{value:value, _token:_token},
                success:function(data) {
                  $('#type_details').html(data);
                }
              })
            }

          });
      });
  </script>

@endsection