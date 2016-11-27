<?php
     /**
     * [$sid insert any data from query created for phpmu_kegiatan]
     * @var [integer]
     * locate to document.location
     * 
     */
    if (isset($_POST[tambah])){
            mysql_query("INSERT INTO phpmu_kegiatan VALUES('','$_POST[a]','$_POST[b]','$_POST[c]',
                                '$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]')");
        $id = mysql_insert_id();                             
                        echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$id."';</script>";
    }
?>
<form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>
            <h4 style='padding-top:15px'>Add Your Activity</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong></strong> 
                    <br>
                </div>
                <div class="panel-body">   
                            <div class="form-group">
                            <label class="col-lg-2 control-label">Activity Number</label>
                                <div class="col-lg-3">
                                <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Kind of Activity</label>
                                <div class="col-lg-3">
                                <input type="text" name="b" placeholder="" class="bg-focus form-control" data-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Proof Number</label>
                                <div class="col-lg-3">
                                <input type="text" name="c" placeholder="" class="bg-focus form-control">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Fiscal Year  </label>
                                <div class="col-lg-2">
                                <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name of Activity</label>
                                <div class="col-lg-8">
                                <textarea placeholder="" name='e' rows="3"  data-required="true" class="form-control" data-trigger="keyup"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Start</label>
                                <div class="col-lg-8">
                                <input type="text"  data-required="true" class="combodate form-control" data-format="YYYY-MM-DD" data-template="D  MMM  YYYY" name="f" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">End</label>
                                <div class="col-lg-8">
                                <input type="text"  data-required="true" class="combodate form-control" data-format="YYYY-MM-DD" data-template="D  MMM  YYYY" name="g" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Place </label>
                                <div class="col-lg-6">
                                <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Cost</label>
                                <div class="col-lg-9">
                                <input type="text" name="i" placeholder="" data-required="true" class="bg-focus form-control">
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-lg-10 pull-right">    
                            <button type="submit" name='tambah' class="btn btn-info">Save Data</button>                  
                            <button type="reset" class="btn btn-default">Reset</button>

                            </div>
                        </div>
                </div>
                    <br><br>
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
            //insert data
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
                    <textarea rows='10' class="form-control" name="a" required></textarea>
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
                  <label class="col-sm-3 control-label">Implementer</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <select class="form-control" name="a">
                        <option value='0'>- Pilih -</option>
                        <?php 
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
                    <textarea rows='10' class="form-control" name="b" required></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpanpelaksana' class="btn btn-info btn-sm">Add</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="tambahbiaya" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Data Cost</h4>
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
                    <textarea rows='5' class="form-control" name="c" required></textarea>
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
            <h4 class="modal-title" id="myModalLabel">Add Implementing Data Follower</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">From Employeer</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <input type='hidden' id='bookId' name='a'>
                    <select class="form-control" name="b">
                        <option value='0'>- Choose -</option>
                        <?php 
                            /**
                             * [$pelaksana save any data from query given from phpmu_karyawan]
                             * @var [integer]
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
                    <input type="text" class="form-control" name="c" placeholder='Write your Follower name, if it is not employeer..'>
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