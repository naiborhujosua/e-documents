        <h4 style='padding-top:15px'>All Data of Leader</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahpejabat"><i class='fa fa-plus'></i> Add your New Data</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Number of Employeer</th>
                        <th>Fullname</th>
                        <th>Leader</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- /getting any data from database and and order based on id to get any four data--> 
                    <!-- /and do looping--> 
                    <?php 
                        $pejabat = mysql_query("SELECT * FROM phpmu_pejabat ORDER BY id ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($pejabat)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nip]</td>
                                    <td>$i[nama]</td>
                                    <td>$i[jabatan]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id]' data-id1='$i[nip]' data-id2='$i[nama]' data-id3='$i[jabatan]' style='margin-right:10px' data-toggle='modal' href='#' data-target='#editpejabat' title='Edit this data'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?view=pejabat&delete=$i[id]' title='Delete this data' onclick=\"return confirm('Are you sure for deleting this data?')\" ><i class='fa fa-trash-o'></i></a>
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
    //and locate it to pejabat.mu
    if (isset($_POST[simpan])){
        mysql_query("INSERT INTO phpmu_pejabat VALUES('','$_POST[c]','$_POST[b]','$_POST[a]')");
            echo "<script>document.location='pejabat.mu';</script>";
    }

    if (isset($_POST[update])){
        mysql_query("UPDATE phpmu_pejabat SET jabatan   = '$_POST[c]',
                                                    nama    = '$_POST[b]',
                                                    nip      = '$_POST[a]' where id='$_POST[id]'");
            echo "<script>document.location='pejabat.mu';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM phpmu_pejabat where id='$_GET[delete]'");
        echo "<script>document.location='pejabat.mu';</script>";
    }
?>
<!-- /implementation of Modal in bootstrap -->
<div class="modal fade" id="tambahpejabat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Leader</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="pejabat.mu" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">No Of Employeer</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Department</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" required>
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

<div class="modal fade" id="editpejabat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="pejabat.mu" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Number Of Employeer</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Department</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" id='bookId3' required>
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
                    <p><small><strong>&copy; Recruitment OPTiM 2016, Developed By Josua Antonius Naiborhu </strong></small><br /><br/> 
                        <a href="https://twitter.com/naiborhu_josua" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.facebook.com/Naiborhujosua" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/u/0/+josuanaiborhunaiborhu" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>