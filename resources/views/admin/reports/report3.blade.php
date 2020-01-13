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
                  <td>{{ $complaint->defect->name }}</td>
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
<h2>Gambar Keroskan</h2>

<table>
  <tr>
    <td><img src="{{ public_path() }}" alt=""></td>
    <td></td>
  </tr>
</table>

</body>
</html>



