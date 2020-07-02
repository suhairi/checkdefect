@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Daftar/Rekod Rumah</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">
  	<div class="col-sm-12">

      @include('layouts._ifError')
      @include('layouts._ifSuccess')
      @include('layouts._ifFailed')

      {!! Form::open(['route' => 'house.store', 'method' => 'POST']) !!}

  		<table class="table table-striped table-bordered">
        <tr>
  				<th>
            Nama Rujukan Rumah <br />
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Contoh : Rumah Ali Taman Pelangi']) !!}
          </th>
        <tr>
          <th>
            Alamat <br />
            {!! Form::textarea('address', old('address'), ['id' => 'type', 'class' => 'form-control', 'required', 'placeholder' => 'Alamat Rumah Rujukan', 'rows' => '4']) !!}
          </th>         
        </tr>
        <tr>
          <th>
            Jenis Rumah
            <select name="type_id" id="type" class="form-control" required="">
              <option value=''>Pilih Jenis Rumah</option>
              @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select> 
          </th>              
        </tr>
        <tr>
          <th>
            Detail Jenis Rumah
            <select name="type_detail_id" class="form-control dynamic" id="type_details">
              <option value=''>Pilih Detail Jenis Rumah</option>
            </select>
          </th>            
        </tr>
        <tr>
          <th>
            Tarikh Penilaian
            {!! Form::date('valuation_date', old('valuation_date'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Pemaju']) !!}
          </th>
        </tr>
        <tr>
  				<th>
            Nama Pemaju
            {!! Form::text('dev_name', old('dev_name'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Pemaju']) !!}
          </th>
        </tr>
        <tr>
  				<th>
            Alamat Pemaju
            {!! Form::textarea('dev_address', old('dev_address'), ['class' => 'form-control', 'placeholder' => 'Alamat Pemaju', 'rows' => '4']) !!}
          </th>
        </tr>
        <tr>
  				<th>
            No Telefon Pemaju 
            {!! Form::text('dev_phone', old('dev_phone'), ['class' => 'form-control', 'placeholder' => 'Contoh: 047728888']) !!}
          </th>
        </tr>
        <tr>
          <td align="right"><a href="#"><button class="btn btn-primary">Rekod Rumah</button></a></td>
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