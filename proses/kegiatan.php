        <h4 style='padding-top:15px'>Input Activities</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='index.php?view=kegiatan&act=tambah'><i class='fa fa-plus'></i> Add Your New Data</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Activity Number </th>
                        <th>Year</th>
                        <th>Name of Activity</th>
                        <th>Place</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                        /**
                         * [$kegiatan save any data from database by ordering 
                         * it based on id_kegiatan and make it descending]
                         * @var [integer]
                         * Do looping  and make table
                         *  
                         */
                        $kegiatan = mysql_query("SELECT * FROM phpmu_kegiatan ORDER BY id_kegiatan DESC");
                        $no = 1;
                        while ($i = mysql_fetch_array($kegiatan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_kegiatan]</td>
                                    <td align=center>$i[tahun_anggaran]</td>
                                    <td>$i[nama_kegiatan]</td>
                                    <td>$i[tempat_kegiatan]</td>
                                    <td style='width:90px'><center>
                                     <a style='margin-right:10px' href='index.php?view=kegiatan&act=detail&id=$i[id_kegiatan]' title='Look at detail data'><i class='fa fa-search'></i></a>
                                     <a style='margin-right:10px' href='index.php?view=kegiatan&act=edit&id=$i[id_kegiatan]' title='Edit the data'><i class='fa fa-pencil-square-o'></i></a>
                                     <a href='index.php?view=kegiatan&delete=$i[id_kegiatan]' title='Delete this data' onclick=\"return confirm('Are you sure you want to delete?')\" ><i class='fa fa-trash-o'></i></a>
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
    //check variable for deleting
    if (isset($_GET[delete])){
        /**
         * Delete data from database
         * locate to kegiatana.mu
         */
        mysql_query("DELETE FROM phpmu_kegiatan where id_kegiatan='$_GET[delete]'");
        echo "<script>document.location='kegiatan.mu';</script>";
    }
?>
             <!--footer--> 
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
