<html>
<style>
  body {
    padding: 20px;
  }
</style>
<body>

<table align="center" width="100%" height="100%" border="1">
  <tr>
    <td>
      <table width="100%">
        <tr>
          <td colspan="3"><h3>ADUAN KEROSKAN / KECACATAN RUMAH</h3></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
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

</body>
</html>



