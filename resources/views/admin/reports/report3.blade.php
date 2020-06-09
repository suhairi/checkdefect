<html>
<style>
  .page-break {
    page-break-after: always;
  }

  body {
    padding: 20px;
  }
</style>
<body>

<!-- Page 1 -->
<table width="90%" align="center" border="2" height="100%">
  <tr>
    <td colspan="2" valign="top" align="center">
      <table border="1" width="90%">
        <tr>
          <td colspan="2" align="center"><strong>ADUAN KEROSAKAN / KECACATAN RUMAH</strong></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="10%">Nama</td>
          <td>{{ $user->name }}</td>          
        </tr>
        <tr>
          <td>No Telefon</td>
          <td>{{ $user->phone }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>{{ $user->address }}</td>
        </tr>
        <tr>
          <td>Tarikh</td>
          <td>{{ $tarikh }}</td>
        </tr>
        <tr>
          <td>Aduan Kali Ke</td>
          <td>{{ $times++ }}</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
          <table width="100%" border="1">
            <tr>
              <th>Bil</th>
              <th>Ruang</th>
              <th>Perkara</th>
              <th>Aduan Kecacatan</th>
            </tr>
            @foreach($complaints as $complaint)
              <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $complaint->area->name }}</td>
                <td align="center">{{ $complaint->area_detail->name }}</td>

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
<div class="page-break"></div>


<!-- ############### END PAGE 1 ################### -->

<table width="100%" border="2" height="100%">
  <tr>
    <td valign="top">
      <table width="100%" border="0">
        <tr>
          <td colspan="3"><h3>ADUAN KEROSKAN / KECACATAN RUMAH</h3></td>
        </tr>
        <tr>
          <td width="18%">Nama</td>
          <td>:</td>
          <td width="81%">{{ $user->name }}</td>
        </tr>
        <tr>
          <td>No Telefon</td>
          <td>:</td>
          <td>{{ $user->phone }}</td>
        </tr>
        <tr>
          <td valign="top">Alamat</td>
          <td valign="top">:</td>
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
          <td>{{ $times }}</td>
        </tr>
        <tr>
          <td colspan="3">
            <table border=1 width="100%">
              <tr>
                <th>Bil</th>
                <th>Ruang</th>
                <th>Perkara</th>
                <th>Aduan Kecacatan</th>
              </tr>
              @foreach($complaints as $complaint)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $complaint->area->name }}</td>
                  <td>{{ $complaint->area_detail->name }}</td>

                  <?php $defect = '-nil-'; ?>
                  @if($complaint->defect_id != 0)
                    <?php $defect = $complaint->defect->name; ?>
                  @endif
                 
                  <td>{{ $defect }}</td>

                </tr>
              @endforeach
            </table>
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>

<!-- Page 2 -->
<div class="page-break"></div>
<?php $count = 0; ?>
<h2>Gambar Kerosakan</h2>


<table border = "1">
  @foreach($complaints as $complaint)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <img src="{{ url('/images') }}/{{ $complaint->image }}" alt="" height="150" width="150"> <br />
            {{ $complaint->area_detail->name }} - {{ $complaint->defect->name }}
        </td>
      </tr>
      @if($loop->iteration % 3 == 0)
        <div class="page-break"></div>
        <?php $count = 0; ?>
      @endif

  @endforeach
</table>


</body>
</html>



