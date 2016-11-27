<!-- /calling for loading print method --> 
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><strong><p style='margin-bottom:-9px'>Tokyo Government </p> <p style='margin-bottom:-9px'>Information and Technology Division </p> <p style='margin-bottom:9px'>PRIVATE TRAINING WEB DEVELOPMENT Tokyo</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Shinjuku Street 32, Tokyo <br> Telp. (0752) 76458, Kode Pos. 26451</p></td>
  </tr>   
</table>
<br><br>
<?php	
//getting any data from databse for phpmu_inbox by any requirement of id_inbox that consist of id
$in = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_inbox where id_inbox='$_GET[id]'"));
  echo "<table>
            <tr>
                <td width='170'>Pengirim</td>
                <td width=20px> : </td>
                <td>$in[asal_surat]</td>
            </tr>

            <tr>
                <td>Tanggal Surat</td>
                <td width=20px> : </td>
                <td>".tgl_indo($in[tanggal_surat])."</td>
            </tr>

            <tr>
                <td>Tanggal Masuk Agenda</td>
                <td width=20px> : </td>
                <td>".tgl_indo($in[tanggal_masuk_agenda])."</td>
            </tr>

            <tr>
                <td>No Surat</td>
                <td width=20px> : </td>
                <td>$in[no_surat]</td>
            </tr>

            <tr>
                <td>Perihal </td>
                <td width=20px> : </td>
                <td>$in[id_perihal]</td>
            </tr>
                
            <tr>
                <td valign=top>Disposisi </td>
                <td width=20px valign=top> : </td>
                <td>$in[disposisi]</td>
            </tr>

            <tr>
                <td valign=top>Isi Disposisi </td>
                <td width=20px valign=top> : </td>
                <td>$in[isi_disposisi]</td>
            </tr>

            <tr>
                <td valign=top>Lokasi Arsip </td>
                <td width=20px valign=top> : </td>
                <td>$in[lokasi_arsip]</td>
            </tr>
        </table><br><br>";
?>

<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Known by <br> Director of OPTiM</td>
    <td width="530"></td>
    <td align="center">Known by <br> Manager of Finance</td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>