        <h4 style='padding-top:15px'>All Data of Level Cost</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahtingkatbiaya"><i class='fa fa-plus'></i> Add  Your New Data</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Level of Cost</th>
                        <th>Daily Cost</th>
                        <th>Cost of Lodgment</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- /getting any data from database and and order based on id to get any data--> 
                    <!-- /and do looping--> 
                    <?php 
                        $biaya = mysql_query("SELECT * FROM phpmu_tingkat_biaya ORDER BY id_tingkat_biaya ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($biaya)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[tingkat_biaya]</td>
                                    <td>".rupiah($i[biaya_harian])."</td>
                                    <td>".rupiah($i[biaya_inap])."</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_tingkat_biaya]' data-id1='$i[tingkat_biaya]' data-id2='$i[biaya_harian]' data-id3='$i[biaya_inap]' style='margin-right:10px' data-toggle='modal' href='#' data-target='#edittingkatbiaya' title='Edit this data'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?view=tingkatbiaya&delete=$i[id_tingkat_biaya]' title='Delete this data' onclick=\"return confirm('Are you sure for deleting this data?')\" ><i class='fa fa-trash-o'></i></a>
                                    </center></td>
                                 </tr>";
                            $no++;
                        }
                    ?>

                    </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- /Basic Data Tables Example --> 

<?php 
    //check for variable simpan and update and also delete for getting any data using Post method 
    //and locate it to tingkat-biaya.mu
    if (isset($_POST[simpan])){
        mysql_query("INSERT INTO phpmu_tingkat_biaya VALUES('','$_POST[a]','$_POST[b]','$_POST[c]')");
            echo "<script>document.location='tingkat-biaya.mu';</script>";
    }

    if (isset($_POST[update])){
        mysql_query("UPDATE phpmu_tingkat_biaya SET tingkat_biaya   = '$_POST[a]',
                                                    biaya_harian    = '$_POST[b]',
                                                    biaya_inap      = '$_POST[c]' where id_tingkat_biaya='$_POST[id]'");
            echo "<script>document.location='tingkat-biaya.mu';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM phpmu_tingkat_biaya where id_tingkat_biaya='$_GET[delete]'");
        echo "<script>document.location='tingkat-biaya.mu';</script>";
    }
?>
<!-- /implementation of Modal in bootstrap -->
<div class="modal fade" id="tambahtingkatbiaya" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Level of Cost</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="tingkat-biaya.mu" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Level of Cost</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Daily Cost</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="b" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Cost of Lodgment</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="c" required>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpan' class="btn btn-info btn-sm">Add</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="edittingkatbiaya" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Level of Cost</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="tingkat-biaya.mu" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Level of Cost</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Daily Cost</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Cost of Lodgment</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="c" id='bookId3' required>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='update' class="btn btn-info btn-sm">Update</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Close</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

             <footer id="footer"> 
                <div class="text-center clearfix">
                     <p><small><strong>&copy; Recruitment OPTiM 2016, Developed By Josua Antonius Naiborhu </strong></small>
                        <br /><br /> 
                        <a href="https://twitter.com/naiborhu_josua" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.facebook.com/Naiborhujosua" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/u/0/+josuanaiborhunaiborhu" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p>                 </div> 
            </footer>