<html>
<style>

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
    border: 0px;
    table-layout: fixed;
    height: 95%;
    width: 95%;
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

<table border="1" class="table-main" align="center">
  <tr>
    <td colspan="3" valign="top" align="center" width="100%">
      <table border="1">
        <tr>
          <td colspan="3" align="center"><strong>ADUAN KEROSAKAN / KECACATAN RUMAH</strong></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="80">Nama</td>
          <td width="2">:</td>
          <td width="110%">{{ $user->name }}</td>          
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

<footer><span class="pagenum"></span></footer>
<div class="page-break"></div>
<?php $count = 0; ?>
<h2>Gambar Kerosakan</h2>



<!-- ############################################## -->
<!-- ############### END PAGE 2 ################### -->
<!-- ############################################## -->

</body>
</html>



