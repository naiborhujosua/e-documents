<?php
    /**
     * [$e catch any data from query created from phpmu_kegiatan]
     * @var [integer]
     * Check note of letter
     * if updated
     *   change based on item provided in query
     *   echo updated
     */

    $e = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
    if (isset($_POST[update])){
                        mysql_query("UPDATE phpmu_kegiatan SET no_kegiatan      = '$_POST[a]',
                                                            mata_anggaran       = '$_POST[b]',
                                                            no_bukti            = '$_POST[c]',
                                                            tahun_anggaran      = '$_POST[d]',
                                                            nama_kegiatan       = '$_POST[e]',
                                                            tgl_mulai           = '$_POST[f]',
                                                            tgl_akhir           = '$_POST[g]',
                                                            tempat_kegiatan     = '$_POST[h]',
                                                            biaya               = '$_POST[i]' where id_kegiatan='$_POST[id]'");
                                       
                        echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
    }
?>
<form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>
            <h4 style='padding-top:15px'>Edit Data Activity</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Data of Managing Bussiness Trip Documents :</strong> 
                <button style='margin-top:-9px' type="submit" name='update' class="pull-right btn btn-info">Update Data</button>  
            </div>
                <div class="panel-body">
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#datakegiatan" id="datakegiatan-tab" role="tab" data-toggle="tab" aria-controls="datakegiatan" aria-expanded="true">Data Activity</a></li>
                      <li role="presentation" class=""><a href="#datadasar" role="tab" id="datadasar-tab" data-toggle="tab" aria-controls="datadasar" aria-expanded="false">Basic</a></li>
                      <li role="presentation" class=""><a href="#datapelaksana" role="tab" id="datapelaksana-tab" data-toggle="tab" aria-controls="datapelaksana" aria-expanded="false">Implementing Data</a></li>
                      <li role="presentation" class=""><a href="#datapengikutpelaksana" role="tab" id="datapengikutpelaksana-tab" data-toggle="tab" aria-controls="datapengikutpelaksana" aria-expanded="false">Implementing Data Follower</a></li>
                      <li role="presentation" class=""><a href="#databiaya" role="tab" id="databiaya-tab" data-toggle="tab" aria-controls="databiaya" aria-expanded="false">Data Cost</a></li>
                    </ul><br>

                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="datakegiatan" aria-labelledby="datakegiatan-tab">
                              
                            <div class="form-group">
                            <label class="col-lg-2 control-label">Activity Number</label>
                                <div class="col-lg-3">
                                <input type="hidden" name='id' value='<?php echo $_GET[id]; ?>'>
                                <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[no_kegiatan]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Mata Anggaran</label>
                                <div class="col-lg-3">
                                <input type="text" name="b" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[mata_anggaran]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label"> Proof Number</label>
                                <div class="col-lg-3">
                                <input type="text" name="c" placeholder="" class="bg-focus form-control" value="<?php echo $e[no_bukti]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Fiscal Year</label>
                                <div class="col-lg-2">
                                <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[tahun_anggaran]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name of Activity</label>
                                <div class="col-lg-8">
                                <textarea placeholder="" name='e' rows="3" class="form-control" data-trigger="keyup"><?php echo $e[nama_kegiatan]; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Start</label>
                                <div class="col-lg-8">
                                <input type="text" class="combodate form-control" data-format="YYYY-MM-DD" data-template="D  MMM  YYYY" name="f" value="<?php echo $e[tgl_mulai]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">End</label>
                                <div class="col-lg-8">
                                <input type="text" class="combodate form-control" data-format="YYYY-MM-DD" data-template="D  MMM  YYYY" name="g" value="<?php echo $e[tgl_akhir]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Place</label>
                                <div class="col-lg-6">
                                <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tempat_kegiatan]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Cost</label>
                                <div class="col-lg-9">
                                <input type="text" name="i" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[biaya]; ?>">
                                </div>
                            </div>
                       </div>

                      <div role="tabpanel" class="tab-pane fade" id="datadasar" aria-labelledby="datadasar-tab">
                            <a style='margin-bottom:3px' class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahdasar"><i class='fa fa-plus'></i> Add Basic Data</a>
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Note</th>
                                    <th width='80px'>Action</th>
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
                                            <td>$d[keterangan]</td>
                                            <td align=center><a href='index.php?view=kegiatan&act=edit&deletedasar=$d[id_dasar]&id=$_GET[id]'>Delete</a></td>
                                          </tr>";
                                      $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="datapelaksana" aria-labelledby="datapelaksana-tab">
                            <a style='margin-bottom:3px' class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahpelaksana"><i class='fa fa-plus'></i> Add Implementing Data</a>
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Employeer Number </th>
                                    <th>Fullname</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Note</th>
                                    <th width='80px'>Action</th>
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
                                //initiate variable and do while looping for getting any data from database
                                $no = 1;
                                while ($p = mysql_fetch_array($pelaksana)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[jabatan_karyawan]</td>
                                            <td>$p[golongan] - $p[nama_golongan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                            <td align=center><a href='index.php?view=kegiatan&act=edit&deletepelaksana=$p[id_pelaksana]&id=$_GET[id]'>Delete</a></td>
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
                                    <th width='180px'>Employeer Number</th>
                                    <th>Fullname</th>
                                    <th>Note</th>
                                    <th width='100px'></th>
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
                                //initiate variable and do looping for getting any data from database
                                $no = 1;
                                while ($p = mysql_fetch_array($pelaksana)){
                                    echo "<tr class='alert alert-warning'>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                            <td><a style='margin-bottom:3px; width:130px' class='open-AddBookDialog btn btn-info btn-sm' data-id='$p[id_pelaksana]' href='#' data-toggle='modal' data-target='#tambahpengikut'><i class='fa fa-plus'></i> Add Follower</a></td>
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
                                                          <td><a style='width:130px' class='btn btn-danger btn-sm' href='index.php?view=kegiatan&act=edit&deletepengikut=$pp[id_pengikut]&id=$_GET[id]'><i class='fa fa-trash-o'></i> Delete Follower</a></td>
                                                      </tr>";
                                          }
                                    $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="databiaya" aria-labelledby="databiaya-tab">
                            <a style='margin-bottom:3px' class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahbiaya"><i class='fa fa-plus'></i> Add Data Cost</a>
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Detail Cost</th>
                                    <th>Ammount</th>
                                    <th>Note</th>
                                    <th width='80px'>Action</th>
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
                                            <td align=center><a href='index.php?view=kegiatan&act=edit&deletebiaya=$d[id_biaya]&id=$_GET[id]'>Delete</a></td>
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
</form>

    <?php 
        /**
         * Check any variable for insert data to database
         * @simpandasar 
         * @var [integer] [<phpmu_dasar>]
         * @deletedasar
         * @var [integer] [<phpmu_pelaksana>]
         * @simpanpelaksana
         * @var [integer] [<phpmu_pelaksana>]
         * @deletepelaksana
         * @var [integer] [<phpmu_pelaksana>]
         * @simpanbiaya
         * @var [integer] [<phpmu_biaya>]
         * @simpanpengikut
         * @var [integer] [<phpmu_pengikut>]
         * @deletepengikut 
         * @var [integer] [<phpmu_pengikut>]
         */
        if (isset($_POST[simpandasar])){
            //insert data
            mysql_query("INSERT INTO phpmu_dasar VALUES('','$_POST[id]','$_POST[a]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletedasar])){
            //delete data
            mysql_query("DELETE FROM phpmu_dasar where id_dasar='$_GET[deletedasar]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }

        if (isset($_POST[simpanpelaksana])){
            //delete data
            mysql_query("INSERT INTO phpmu_pelaksana VALUES('','$_POST[a]','$_POST[id]','$_POST[b]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletepelaksana])){
            //delete data
            mysql_query("DELETE FROM phpmu_pelaksana where id_pelaksana='$_GET[deletepelaksana]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }

        if (isset($_POST[simpanbiaya])){
            //insert data
            mysql_query("INSERT INTO phpmu_biaya VALUES('','$_POST[id]','$_POST[a]','$_POST[b]','$_POST[c]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletebiaya])){
            //delete data
            mysql_query("DELETE FROM phpmu_biaya where id_biaya='$_GET[deletebiaya]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }

        if (isset($_POST[simpanpengikut])){
            //insert data
            mysql_query("INSERT INTO phpmu_pengikut VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletepengikut])){
            //delete data
            mysql_query("DELETE FROM phpmu_pengikut where id_pengikut='$_GET[deletepengikut]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }
    ?>
<!-- /implementation of Modal in bootstrap --> 
<div class="modal fade" id="tambahdasar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Basic Data</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Note</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <textarea rows='10' class="form-control" name="a"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpandasar' class="btn btn-info btn-sm">Add</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="tambahpelaksana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Implementing Data</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Implementor</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <select class="form-control" name="a">
                        <option value='0'>-Choose-</option>
                        <?php 
                            /**
                             * [$pelaksana getting data from phpmu_karyawan order by nama_karyawan]
                             * @var [string]
                             * [$p while loop declaration for getting data from $pelaksana]
                             * 
                             */
                            $pelaksana = mysql_query("SELECT * FROM phpmu_karyawan ORDER BY nama_karyawan");
                            while ($p = mysql_fetch_array($pelaksana)){
                                echo "<option value='$p[id_karyawan]'> $p[nip_karyawan] - $p[nama_karyawan]</option>";
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Note</label>
                  <div class="col-sm-8">
                    <textarea rows='10' class="form-control" name="b"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">Add</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>
<!-- /implementation of Modal in bootstrap --> 
<div class="modal fade" id="tambahbiaya" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Cost Data</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Detail Cost</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <input type="text" class="form-control" name="a">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ammount</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="b">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Note</label>
                  <div class="col-sm-8">
                    <textarea rows='5' class="form-control" name="c"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpanbiaya' class="btn btn-info btn-sm">Add</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>


<div class="modal fade" id="tambahpengikut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Implementing Data</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">From EMployeer</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <input type='hidden' id='bookId' name='a'>
                    <select class="form-control" name="b">
                        <option value='0'>- Choose -</option>
                        <?php 
                             /**
                             * [$pelaksana getting data from phpmu_karyawan order by nama_karyawan]
                             * @var [string]
                             * [$p while loop declaration for getting data from $pelaksana]
                             * 
                             */ 
                            $pelaksana = mysql_query("SELECT * FROM phpmu_karyawan ORDER BY nama_karyawan");
                            while ($p = mysql_fetch_array($pelaksana)){
                                echo "<option value='$p[id_karyawan]'> $p[nip_karyawan] - $p[nama_karyawan]</option>";
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Follower</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" placeholder='Write your follower, if it is not employeer..'>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Note</label>
                  <div class="col-sm-8">
                    <textarea rows='5' class="form-control" name="d"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpanpengikut' class="btn btn-info btn-sm">Add</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>