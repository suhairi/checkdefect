<html>
<body>

<table>
  @foreach($complaints as $complaint)
    <tr><td><strong>Nama </strong></td><td>:</td><td>{{ $complaint->user->name }}</td></tr>
    <tr><td><strong>No Telefon</strong></td><td>:</td><td>{{ $complaint->user->phone}}</td></tr>
    <tr><td><strong>Alamat</strong></td><td>:</td><td>{{ $complaint->house->address }}</td></tr>
    <tr><td><strong>Tarikh</strong></td><td>:</td><td>{{ $complaint->house->valuation_date }}</td></tr>
    <tr><td><strong>Aduan Kali Ke</strong></td><td>:</td><td>{{ $complaint->house->valuation_date }}</td></tr>
  @endforeach
</table>
<br /><br />

<table>
  <tr>
    <th>Bil</th>
    <th>Ruang</th>
    <th>Perkara</th>
    <th>Aduan Kecacatan</th>
  </tr>
  
</table>

</body>
</html>



