@extends('layouts.app2')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Merekod Kecacatan/Defect Rumah</h1>
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
            Rumah Rujukan
            {!! Form::select('house_id', $houses, Session::get('house_id'), ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Pilih', 'id' => 'house']) !!}
          </th>
        </tr>
        <tr>
          <th>
            Gambar Kerosakan (*Nota : Saiz minimum gambar 2MB. <font color="red">Sila ubah setting kamera anda terlebih dahulu.</font>)
            {{ Form::file('image', ['class' => 'form-control', 'required']) }}
            ( Sila lekatkan/catitkan pelekat mengikut nombor rujukan ini --> 
            <font color="red" id="sticker">@if (Session::has('noImage')){{ Session::get('noImage') }} @endif</font> ) <br />
            <strong> Contoh : </strong><a href="{{ url('img/contoh.jpeg') }}"><img src="{{ url('img/contoh.jpeg') }}" height="100" width="100"></a> <br /> <a href="{{ url('img/contoh2.jpeg') }}"><img src="{{ url('img/contoh2.jpeg') }}" height="100" width="100"></a> &nbsp;<a href="{{ url('img/contoh3.jpeg') }}"><img src="{{ url('img/contoh3.jpeg') }}" height="100" width="100"></a>
          </th>
        </tr>
<!--         <tr>
          <th>
            Deskripsi Kerosakan
            {{ Form::textarea('notes', old('notes'), ['class' => 'form-control', 'rows' => '1']) }}
          </th>          
        </tr> -->
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
            <select name="defect_id" class="form-control" id="defect_id"><option value="">Pilih Kerosakan</option></select>
          </th>                    
        </tr>     
        
        <tr>
          <td align="right"><a href="#"><button class="btn btn-primary">Rekod Aduan</button></a></td>
        </tr>
      </table>
      {!! Form::close() !!}      
    </div>
    <div class="col-sm-6 card" id="info" style="padding-top: 5px">&nbsp;</div>

  </div>


  <script type="text/javascript">

      $(document).ready(function() {

          $('#info').hide();

          $('#house').change(function() {

            var id = $(this).val();
            var _token = $("input[name='_token']").val();

            $.ajax({
                url:"{{ route('house.get_sticker_info') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data) {
                  // console.log(data);
                  $('#sticker').html(data);                  
                }
              })
          });

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
                  // console.log(data)
                  $('#area_detail').html(data);                  
                }
              });
            });

          $('#area_detail').change(function() {

            var id = $('#area_detail').val();
            // alert(id);
            var _token = $("input[name='_token']").val();

            $.ajax({
                url:"{{ route('house.get_defect') }}",
                method:"POST",
                data:{id:id, _token:_token},

                success:function(data) {
                  // console.log(data);
                  $('#defect_id').html(data);                  
                }
            });

          });
       

      });
  </script>

@endsection