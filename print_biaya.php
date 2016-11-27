<title>Print Detail Cost</title>
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
$d = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
?>
<table border="0">
  <tr><td width="160px">Fiscal Year</td>   <td>: <?php echo "$d[tahun_anggaran]"; ?></td></tr>
  <tr><td>Proof Number </td>                    <td>: <?php echo "$d[no_bukti]"; ?></td></tr>   
  <tr><td>Kind of Activity</td>                  <td>: <?php echo "$d[mata_anggaran]"; ?></td></tr> 
</table>

<h2 align=center>Detail Cost Of Managing Bussiness Trip Documents</h2>

<table border="0">
  <tr><td width="160px">Proof of Bussiness Trip Documents</td>   <td>: <?php echo "$d[no_kegiatan]"; ?></td></tr>
  <tr><td>Date</td>                            <td>: <?php echo tgl_indo($d[tgl_mulai]); ?></td></tr>   
</table>

                        <table width='100%' border=1>
                                <tr bgcolor='green' class="alert alert-success">
                                    <th style='color:#fff' width='50px' scope="row">No</th>
                                    <th style='color:#fff'>Detail Cost</th>
                                    <th style='color:#fff'>Ammount</th>
                                    <th style='color:#fff'>Note</th>
                                </tr>
                            <?php 
                                $biaya = mysql_query("SELECT * FROM phpmu_biaya where id_kegiatan='$_GET[id]' ORDER BY id_biaya");
                                $no = 1;
                                while ($b = mysql_fetch_array($biaya)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$b[rincian_biaya]</td>
                                            <td>".rupiah($b[jumlah])."</td>
                                            <td>$b[keterangan]</td>
                                          </tr>";
                                      $no++;
                                }
                                $j = mysql_fetch_array(mysql_query("SELECT sum(jumlah) as total FROM phpmu_biaya where id_kegiatan='$_GET[id]'"));
                                    echo "<tr bgcolor=lightblue>
                                            <td></td>
                                            <td><b>Ammount</b></td>
                                            <td><b>".rupiah($j[total])."</b></td>
                                            <td></td>
                                          </tr>";
                            ?>
                        </table>
<br><br>
<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <br><br><br>
    <td width="38%">Has been paid as much as :<br>
    <?php echo rupiah($j[total]); ?> <br>
    Accounting Division <br>
    Secretary OPTiM, Co,Ltd
    </td>

    <td width="30%">
        Payment <br>
        Accounting
    </td>

    <td >
        <br><br>
        Tokyo, <?php tgl_indo(date("Y-m-d")); ?><br>
        Has received money as much as: <br>
        <?php echo rupiah($j[total]); ?> <br>
        Receiver <br>
    </td>

  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>