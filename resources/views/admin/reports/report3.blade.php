<html>
<style>

  <link href="{{{ URL::asset('https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css') }}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  @page {
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 10px;
    margin-left: 10px;
  }

  body {
    font-family: arial;
  }

  .page-break {
    page-break-after: always;
  }

  .table-main {
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 10px;
    border: 1px solid black;
    table-layout: fixed;
    height: calc(100%-2px);
    width: 95%;
  }

  footer {
    position: fixed; 
    bottom: -60px; 
    left: 0px; 
    right: 70px;
    height: 100px; 

    /** Extra personal styles **/
    background-color: #FFFFFF;
    color: black;
    text-align: right;
    line-height: 35px;
  }

  .pagenum:before {
    content: counter(page);
  }


</style>

<body>

<!-- ############################################## -->
<!-- ################   Page 1   ################## -->
<!-- ############################################## -->


      <table border="0">
        <tr>
          <td colspan="3" align="center"><strong>ADUAN KEROSAKAN / KECACATAN RUMAH</strong></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="100">Nama</td>
          <td width="2">:</td>
          <td width="auto">{{ $user->name }}</td>          
        </tr>
        <tr>
          <td>No Telefon</td>
          <td>:</td>
          <td>{{ $user->phone }}</td>
        </tr>
        <tr>
          <td valign="top">Alamat</td>
          <td valign="top">:</td>
          <td valign="top">{{ $user->address }} sdgs grgfsd  rg sgfverg  ertgfdbe</td>
        </tr>
        <tr>
          <td>Tarikh</td>
          <td>:</td>
          <td>{{ $tarikh }}</td>
        </tr>
        <tr>
          <td>Aduan Kali Ke</td>
          <td>:</td>
          <td>{{ $times++ }}</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
      </table>

      @foreach($complaints as $complaint)

        @if($loop->iteration == 1)
          <table width="100%" style="border: 1px solid black" border="1">
            <tr>
              <th width="5%">Bil</th>
              <th width="35%">Ruang</th>
              <th width="25%">Perkara</th>
              <th>Aduan Kecacatan</th>
            </tr>
        @elseif($loop->iteration % 4 == 1)
          </table>

          <footer><span class="pagenum"></span></footer>
          <div class="page-break"></div>

          <table width="100%" border="1">
        @endif
        
        <tr>
          <td align="center" width="5%">{{ $loop->iteration }}</td>
          <td align="center" width="35%">{{ $complaint->area->name }}</td>
          <td align="center" width="25%">{{ $complaint->area_detail->name }}</td>

          <?php $defect = '-nil-'; ?>
          @if($complaint->defect_id != 0)
            <?php $defect = $complaint->defect->name; ?>
          @endif
         
          <td align="center">{{ $defect }}</td>
        </tr>
      @endforeach
    </table>




<!-- ############################################## -->
<!-- ###############  Page 2  ##################### -->
<!-- ############################################## -->

<footer><span class="pagenum"></span></footer>
<div class="page-break"></div>

<h2>Gambar Kerosakan</h2>

<table width="100%" border="0" align="center">
  @foreach($complaints as $complaint)

    
    @if($loop->iteration == 1)
      <tr>
        <td valign="top" align="center">
            {{ $complaint->area_detail->name }} - {{ $complaint->defect->name }}<br />
            <img src="{{ url('/images') }}/{{ $complaint->image }}" alt="{{ url('/images') }}/{{ $complaint->image }}" height="150" width="250">
        </td>

    @elseif($loop->iteration % 2 == 0)
        <td valign="top" align="center">
            {{ $complaint->area_detail->name }} - {{ $complaint->defect->name }}<br />
            <img src="{{ url('/images') }}/{{ $complaint->image }}" alt="{{ url('/images') }}/{{ $complaint->image }}" height="150" width="250">
        </td>
      </tr>
    @else
      <tr>
        <td valign="top" align="center">
            {{ $complaint->area_detail->name }} - {{ $complaint->defect->name }}<br />
            <img src="{{ url('/images') }}/{{ $complaint->image }}" alt="{{ url('/images') }}/{{ $complaint->image }}" height="150" width="250">
        </td>
    @endif


    <!-- If page so long -->
    @if($loop->iteration % 6 == 0 && $loop->iteration != $loop->last)
      </tr>

      <footer><span class="pagenum"></span></footer>
      <div class="page-break"></div>
    @endif

  @endforeach
</table>



<!-- ############################################## -->
<!-- ############### END PAGE 2 ################### -->
<!-- ############################################## -->

</body>
</html>



