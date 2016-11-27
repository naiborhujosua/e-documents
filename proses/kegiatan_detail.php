<?php
    /**
     * [$e catch any data from query created from phpmu_kegiatan]
     * @var [integer]
     * Check note of letter
     * if updated
     *   change based on item provided in query
     *   echo Successfully Update entering letter data
     */
    $e = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));

    if (isset($_POST[update])){
                        mysql_query("UPDATE phpmu_inbox SET asal_surat       = '$_POST[a]',
                                                            tanggal_surat    = '$_POST[b]',
                                                            tanggal_masuk_agenda    = '$_POST[c]',
                                                            no_surat         = '$_POST[d]',
                                                            id_perihal       = '$_POST[e]',
                                                            disposisi        = '$_POST[f]',
                                                            isi_disposisi    = '$_POST[g]',
                                                            lokasi_arsip     = '$_POST[i]' where id_inbox='$_GET[id]'");
                                       
                        echo "<script>window.alert('Successfully Update Entering letter data.');
                                window.location='inbox'</script>";
    }
?>

            <h4 style='padding-top:15px'>Detail Activity</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <strong></strong> 
                <a target='_BLANK' href='print_surat.php?id=<?php echo $_GET[id]; ?>' style='margin-top:-9px' class="pull-right btn btn-success">Print Letter</a> 
                <a target='_BLANK' href='print_biaya.php?id=<?php echo $_GET[id]; ?>' style='margin-top:-9px; margin-right:5px' class="pull-right btn btn-info">Print Detail Cost</a><br> 
            </div>
                <div class="panel-body">
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#datakegiatan" id="datakegiatan-tab" role="tab" data-toggle="tab" aria-controls="datakegiatan" aria-expanded="true">Data of Activity</a></li>
                      <li role="presentation" class=""><a href="#datadasar" role="tab" id="datadasar-tab" data-toggle="tab" aria-controls="datadasar" aria-expanded="false">Basic Data</a></li>
                      <li role="presentation" class=""><a href="#datapelaksana" role="tab" id="datapelaksana-tab" data-toggle="tab" aria-controls="datapelaksana" aria-expanded="false">Implementing Data</a></li>
                      <li role="presentation" class=""><a href="#datapengikutpelaksana" role="tab" id="datapengikutpelaksana-tab" data-toggle="tab" aria-controls="datapengikutpelaksana" aria-expanded="false">Implementing Data Followers</a></li>
                      <li role="presentation" class=""><a href="#databiaya" role="tab" id="databiaya-tab" data-toggle="tab" aria-controls="databiaya" aria-expanded="false">Cost Data</a></li>
                    </ul><br>

                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="datakegiatan" aria-labelledby="datakegiatan-tab">
                        <table class="table table-condensed table-hover">
                          <thead>
                            <tr><th width='190px' scope="row">Activity Number </th>    <th class='text-danger'><?php echo $record['no_kegiatan']; ?></th></tr>
                          </thead>
                          <tbody>
                            <tr><th scope="row">Kind of Activity</th>     <td><?php if ($e['mata_anggaran']==''){ echo "<i class='text-danger'>Data still empty</i>"; }else{ echo $e['mata_anggaran']; } ?></td></tr>
                            <tr><th scope="row">Proof Number </th>          <td><?php if ($e['no_bukti']==''){ echo "<i class='text-danger'>Data still empty</i>"; }else{ echo $e['no_bukti']; } ?></td></tr>
                            <tr><th scope="row">Fiscal Year</th>    <td><?php if ($e['tahun_anggaran']==''){ echo "<i class='text-danger'>Data still empty</i>"; }else{ echo $e['tahun_anggaran']; } ?> Year</td></tr>
                            <tr><th scope="row">Name of Activity</th>     <td><?php echo $e['nama_kegiatan']; ?></td></tr>
                            <tr><th scope="row">Start</th>     <td><?php echo tgl_indo($e[tgl_mulai]); ?></td></tr>
                            <tr><th scope="row">End</th>     <td><?php echo tgl_indo($e[tgl_akhir]); ?></td></tr>
                            <tr><th scope="row">Place</th>   <td><?php if ($e['tempat_kegiatan']==''){ echo "<i class='text-danger'>Data still empty</i>"; }else{ echo $e['tempat_kegiatan']; } ?></td></tr>
                            <tr><th scope="row">Cost</th>     <td><?php echo $e['biaya']; ?></td></tr>
                          </tbody>
                        </table>
                       </div>

                      <div role="tabpanel" class="tab-pane fade" id="datadasar" aria-labelledby="datadasar-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Note</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php
                              /**
                               * [$dasar save data from data in database of table phpmu_dasar order by id_dasar]
                               * @var [integer]
                               * [$no declare variable for while looping]
                               * @var [integer]
                               * [$d catch data from $dasar]
                               *  @var [integer]
                               *  
                               */
                                $dasar = mysql_query("SELECT * FROM phpmu_dasar where id_kegiatan='$_GET[id]' ORDER BY id_dasar");
                                $no = 1;
                                while ($d = mysql_fetch_array($dasar)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$d[keterangan]</td><td align=center><a href='index.php?view=kegiatan&act=edit&deletedasar=$d[id_dasar]&id=$_GET[id]'>Delete</a></td>
                                          </tr>";
                                      $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="datapelaksana" aria-labelledby="datapelaksana-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Employeer Number</th>
                                    <th>Fullname</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Note</th>
                                </tr>
                              </thead>
                              <tbody>

                            <?php 
                            /**
                             * [$pelaksana save data from query from SQL and join some table]
                             * @var [integer]
                             * [$no declares variable]
                             * @var [integer]
                             * [$sp catch data from $pelaksana]
                             * do looping
                             */
                                $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                                                        JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                                            JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan  
                                                                where a.id_kegiatan='$_GET[id]'");
                                $no = 1;
                                while ($p = mysql_fetch_array($pelaksana)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[jabatan_karyawan]</td>
                                            <td>$p[golongan] - $p[nama_golongan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                          </tr>";
                                    $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                                     <div role="tabpanel" class="tab-pane fade" id="datapengikutpelaksana" aria-labelledby="datapengikutpelaksana-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th width='180px'>Number Of Employeer</th>
                                    <th>Fullname</th>
                                    <th>Note</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                            /**
                             * [$pelaksana save data from query from SQL and join some table]
                             * @var [integer]
                             * [$no declares variable]
                             * @var [integer]
                             * [$sp catch data from $pelaksana]
                             * [$pengikut save data from query from SQL for follower of $pelaksana]
                             *  @var [integer]
                             *  do looping
                             */
                                $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                                                        JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                                            JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan  
                                                                where a.id_kegiatan='$_GET[id]'");
                                //declare $no for while looping
                                $no = 1;
                                while ($p = mysql_fetch_array($pelaksana)){
                                    echo "<tr class='alert alert-warning'>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                          </tr>";
                                          $pengikut = mysql_query("SELECT a.id_pengikut, a.id_karyawan as idk, b.id_karyawan, b.nip_karyawan, b.nama_karyawan, a.nama_pengikut, a.keterangan FROM phpmu_pengikut a 
                                                                    LEFT JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan 
                                                                        where a.id_pelaksana='$p[id_pelaksana]'");
                                          while ($pp = mysql_fetch_array($pengikut)){
                                            if ($pp[idk]=='0'){
                                                $nip  = '-';
                                                $nama = $pp[nama_pengikut];
                                            }elseif($pp[idk]!='0'){
                                                $nip  = $pp[nip_karyawan];
                                                $nama = $pp[nama_karyawan];
                                            }
                                                echo "<tr>
                                                          <td></td>
                                                          <td>$nip</td>
                                                          <td>$nama</td>
                                                          <td>$pp[keterangan]</td>
                                                      </tr>";
                                          }
                                    $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="databiaya" aria-labelledby="databiaya-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Detail Cost</th>
                                    <th>Ammount</th>
                                    <th>Note</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                            /**
                             * [$biaya counting of any detail cost of bussiness trip]
                             * @var [integer]
                             */
                                $biaya = mysql_query("SELECT * FROM phpmu_biaya where id_kegiatan='$_GET[id]' ORDER BY id_biaya");
                                $no = 1;
                                while ($b = mysql_fetch_array($biaya)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$b[rincian_biaya]</td>
                                            <td>$b[jumlah]</td>
                                            <td>$b[keterangan]</td>
                                          </tr>";
                                      $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                    </div>

                    <br><br>
                </div>
            </div>
            </div>
        <!-- footer -->
        <footer id="footer"> 
                <div class="text-center clearfix">
                      <p><small>&copy 2016 - Developed by Josua Antonius Naiborhu - OPTiM Recruitment</small>
                        <br /><br /> 
                        <a href="https://twitter.com/naiborhu_josua" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.facebook.com/Naiborhujosua" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/u/0/+josuanaiborhunaiborhu" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
        </footer>
        <!-- /footer --> 