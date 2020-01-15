<html>
<style>
  .page-break {
    page-break-after: always;
  }

  body {
    padding: 20px;
  }
</style>
<body height="100%">

<!-- Page 1 -->
<table align="center" width="100%" height="100%" border="1">
  <tr>
    <td>
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
<h2>Gambar Kerosakan</h2>

<table  width="100%" height="100%" border="1">
  <tr>
    <td>
      <table>
        @foreach($complaints as $complaint)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ url('/images') }}/{{ $complaint->image }}" alt="" height="300" width="300"></td>
          @if($loop->iteration % 2 == 0)
            </tr>
            <tr>
            @if($loop->iteration % 6 == 0)
              <div class="page-break"></div>
            @endif
          @endif

        @endforeach
      </table>
    </td>
  </tr>
</table>

</body>
</html>



