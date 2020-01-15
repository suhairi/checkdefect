<html>
<style>

  body {
    font-size: 15px;
    padding-left: 40px;
  }
</style>
<body>
<br /><br />
<table>
    <tr><td><strong>Nama </strong></td><td>:</td><td>{{ $complaint->user->name }}</td></tr>
    <tr><td><strong>I/C No </strong></td><td>:</td><td>&nbsp;</td></tr>
    <tr><td><strong>Contact</strong></td><td>:</td><td>{{ $complaint->user->phone}}</td></tr>
    <tr><td><strong>House No</strong></td><td>:</td><td>{{ ucwords($complaint->house->address) }}</td></tr>
    <tr><td><strong>Date</strong></td><td>:</td><td>{{ $tarikh }}</td></tr>
</table>
<br /><br />

<p>Kindly, attend to the above house due to the following defect(s) / complaint(s) :-</p>

<p>1. <strong>Please refer to the attached lists (Total no of page {{ $pages }}/{{ $pages }})</strong></p>

<br><br><br>
<p>Please check the house and arrange for the necessary repair(s) / replacement(s) as soon as possible.</p>

<p>Thank you.</p>

<p>Sincerely,</p>

<br /><br />
<p>..........................................</p>
Name : {{ $complaint->user->name }}<br />
I/C No : <br />
Date : <br />

<br /><br />
<hr />

<br /><br /><br />

<table>
  <tr>
    <td width="43%" valign="top">I / We hereby confirmed that all the above mentioned defects have been repairs and all of them are in good condtions.</td>
    <td>&nbsp;</td>
    <td width="43%" valign="top">I hereby concede that I have received the balance of key.</td>
  </tr>
  <tr>
    <td>
      <br /><br />
      ...........................................<br />
      Name :<br />
      I/C No. :<br />
      Date :<br />
    </td>
    <td>&nbsp;</td>
    <td>
      <br /><br />
      ...........................................<br />
      Name :<br />
      I/C No. :<br />
      Date :<br />
    </td>
    
  </tr>
</table>

</body>
</html>



