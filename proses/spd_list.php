        <h4 style='padding-top:15px'>List of Bussiness Trip Documents</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <br>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Activity Number </th>
                        <th>Name of Activity</th>
                        <th><center>Action</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        /**
                         * $kegiatan for saving data from query given from phpmu_kegiatan
                         * @var [integer] [<phpmu_kegiatan>]
                         * $no for declaration of while looping
                         * catch any data from$keiatan and make a table
                         */
                        
                        $kegiatan = mysql_query("SELECT * FROM phpmu_kegiatan ORDER BY id_kegiatan DESC");
                        $no = 1;
                        while ($i = mysql_fetch_array($kegiatan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_kegiatan]</td>
                                    <td>$i[nama_kegiatan]</td>
                                    <td style='width:220px'><center>
                                     <a target='_BLANK' style='margin-right:10px' href='print_surat.php?id=$i[id_kegiatan]' title='Print Letter of travel documents' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Print Letter</a>
                                     <a target='_BLANK' style='margin-right:10px' href='print_biaya.php?id=$i[id_kegiatan]' title='Print Cost of travel' class='btn btn-success btn-sm'><i class='fa fa-book'></i> Print Cost</a>
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
    /**
     * Check if there is variable delete
     * do query for deleting the data in phpmu_kegiatan 
     * locate to kegiatana.mu
     */
    if (isset($_GET[delete])){
        mysql_query("DELETE FROM phpmu_kegiatan where id_kegiatan='$_GET[delete]'");
        echo "<script>document.location='kegiatan.mu';</script>";
    }
?>
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