<html>
<style>
  .page-break {
    page-break-after: always;
  }

  body {
    padding: 20px;
    font-family: arial;
  }

  table {
    padding-top: 10px;
    padding-bottom: 10px;
    border: 0px;
  }

  .table-main {
    height: 100%;
    table-layout: fixed;
  }

  @page {
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 10px;
    margin-left: 10px;
  }

  footer {
    position: fixed; 
    bottom: -60px; 
    left: 0px; 
    right: 70px;
    height: 50px; 

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

<table width="90%" valign="top" align="center" border="2" class="table-main">
  <tr>
    <td colspan="3" valign="top" align="center"> here
      <table border="1" width="90%">
        <tr>
          <td colspan="3" align="center"><strong>ADUAN KEROSAKAN / KECACATAN RUMAH</strong></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="10%">Nama</td>
          <td width="4">:</td>
          <td>{{ $user->name }}</td>          
        </tr>
        <tr>
          <td>No Telefon</td>
          <td>:</td>
          <td>{{ $user->phone }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>{{ $user->address }}</td>
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
        <tr>
          <td colspan="3" align="center">
          
            @foreach($complaints as $complaint)

              @if($loop->iteration == 1)
                <table width="100%" border="1">
                  <tr>
                    <th>Bil</th>
                    <th>Ruang</th>
                    <th>Perkara</th>
                    <th>Aduan Kecacatan</th>
                  </tr>
              @elseif($loop->iteration % 4 == 1)
                    </table>
                  </td>
                </tr>
                    </table>
                  </td>
                </tr>
                
                </table>
                <footer><span class="pagenum"></span></footer>
                <div class="page-break"></div>
                <table width="90%" align="center" border="2" class="table-main">
                <tr>
                  <td colspan="3" valign="top" align="center">
                <table border="0" width="90%">
                  <tr>
                    <td>
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

          </td>
        </tr>
      </table>
    </td>
   </tr>
</table>


<!-- ############################################## -->
<!-- ############### END PAGE 1 ################### -->
<!-- ############################################## -->

<!-- ############################################## -->
<!-- ###############  Page 2  ##################### -->
<!-- ############################################## -->

<div class="page-break"></div>
<?php $count = 0; ?>
<h2>Gambar Kerosakan</h2>

<table width="90%" align="center" border="2" height="100%">
  <tr>
    <td valign="top" >

      <table width="90%" border="1" align="center">
      @foreach($complaints as $complaint)
        <tr>
          <td valign="top">
              <img src="{{ url('/images') }}/{{ $complaint->image }}" alt="" height="150" width="250"> <br />
              {{ $complaint->area_detail->name }} - {{ $complaint->defect->name }}
          </td>
        </tr>
        @if($loop->iteration % 3 == 0)
          <div class="page-break"></div>
          <?php $count = 0; ?>
        @endif

      @endforeach
      </table>
      
    </td>
  </tr>
  
</table>


<!-- ############################################## -->
<!-- ############### END PAGE 2 ################### -->
<!-- ############################################## -->

</body>
</html>



