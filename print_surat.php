<title>Print Data of Activities</title>
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
$d = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
?>
<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>OPTiM, Co,Ltd<br> Finance Division</h3></td>
</tr> 
<tr>
    <td align="center"><p>Shiodome Building 21F
      1-2-20 Kaigan, Minato-ku, Tokyo,<br>105-0022 Japan</p></td>
</tr> 
</table>
<hr style='border:1px solid #000'>

<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>Letter of Warrant Assignment</h3></td>
</tr> 
<tr>
    <td align="center"><p>Number : <?php echo "$d[no_kegiatan]"; ?></p></td>
</tr> 
</table>

<table width='100%'>
<tr><td width='85px'>Based on :</td><td></td><td></td></tr>
<?php 
  $dasar = mysql_query("SELECT * FROm phpmu_dasar where id_kegiatan='$_GET[id]'");
  $no = 1;
  while ($d = mysql_fetch_array($dasar)){
      echo "<tr><td></td><td valign=top>$no.</td> <td>$d[keterangan]</td></tr>";
      $no++;
  }
?>
</table>
<br>
<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>Leader of Finance Division<br> Assign</h3></td>
</tr> 
</table>

To :
<table width='100%'>
<?php 
  $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                              JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan 
                                  where a.id_kegiatan='$_GET[id]'");
  $no = 1;
  while ($dp = mysql_fetch_array($pelaksana)){
      echo "<tr><td width='35px' valign=top>$no.</td><td width=110px>Name/Employeer Number</td> <td>: $dp[nama_karyawan] / $dp[nip_karyawan]</td></tr>
            <tr><td valign=top></td><td>Name of Positon/Position</td>  <td>: $dp[jabatan_karyawan] / $dp[golongan]<br></td></tr>";
      $no++;
  }
      $de = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
       $selisih = ((abs(strtotime ($de[tgl_mulai]) - strtotime ($de[tgl_akhir])))/(60*60*24));
      echo "<tr><td width='35px' valign=top><br></td><td width=110px><br>Activity</td> <td><br>: $de[nama_kegiatan]</td></tr>
            <tr><td width='35px' valign=top></td><td>Destination</td> <td>: $de[tempat_kegiatan] </td></tr>
            <tr><td width='35px' valign=top></td><td>Time</td> <td>: $selisih Days</td></tr>
            <tr><td width='35px' valign=top></td><td>Start</td> <td>: ".tgl_indo($de[tgl_mulai])." s.d ".tgl_indo($de[tgl_akhir])."</td></tr>
            <tr><td width='35px' valign=top></td><td>Cost</td> <td>: $de[biaya]</td></tr>";
?>
</table>

<p>You Should make any report after doing the assignment..<br>
 I hope This assignment can be given for Finance Division.</p>

      



<br>
<table width=100%>
  <tr>
    <td width="30%">
    </td>

    <td width="30%">

    </td>

    <td >
        <table>
            <tr><td width="130px">Place </td><td>: Tokyo</td></tr>
            <tr><td>Date </td><td>: <?php echo tgl_indo(date("Y-m-d")); ?></td></tr>
        </table><br>
        <center>
          Leader of Finance Division,<br>
          Finance Division,<br>
          Secretary<br><br><br><br>

          <u>FullName</u><br>
          Leader of Finance Division<br>
          NIP. 00000000 000000 0 000
        </center>
    </td>
  </tr>
</table> 
</body>