        <h4 style='padding-top:15px'>All Data User </h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <a class='btn btn-primary' href='index.php?page=user&stat=<?php echo $_GET[stat]; ?>&aksi=tambah'><i class='fa fa-plus'></i> Add <?php echo $status; ?></a>
                    <?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th>No</th>
                        <th>FullName</th>
                        <th>Email Address</th>
                        <th>Telephone Number</th>
                        <th>Address</th>
                        <th>Division</th>
                        <th>Status</th>
                        <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $inbox = mysql_query("SELECT * FROM phpmu_user where level='$level' ORDER BY id_user DESC");
                        $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
                            if ($i[status] == 'Y'){ $stat = '<b style="color:green">Aktif</b>'; }else{ $stat = '<b style="color:red">Non Aktif</b>'; }
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nama_lengkap]</td>
                                    <td>$i[alamat_email]</td>
                                    <td>$i[no_telpon]</td>
                                    <td>$i[alamat_lengkap]</td>
                                    <td>$i[unit_kerja]</td>
                                    <td>$stat</td>";
                                        if ($_SESSION[level]=='user_admin'){ 
                                            echo "<td style='width:130px' class='text-right'><a class='btn' href='index.php?page=user&stat=$_GET[stat]&aksi=edit&id=$i[id_user]'><i class='fa fa-pencil-square-o'></i></a>
                                                  <a class='btn' href='index.php?page=user&stat=$_GET[stat]&aksi=hapus&id=$i[id_user]' title='Delete this data'><i class='fa fa-trash-o'></i></a>
                                                  <a class='btn' href='index.php?page=user&stat=$_GET[stat]&aksi=aktif&id=$i[id_user]&akt=$i[status]' title='Activate or non-Activatte the user'><i class='fa fa-user'></i></a>";
                                        }
                                    echo "</td>
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
}elseif ($_GET[aksi]=='hapus'){ 
    mysql_query("DELETE FROM phpmu_user where id_user='$_GET[id]'");
    echo "<script>window.alert('Data user has been deleted.');
                                window.location='index.php?page=user&stat=$_GET[stat]'</script>";

}elseif ($_GET[aksi]=='aktif'){ 
    if ($_GET[akt]=='N'){
        $status = 'Y';
        $aktiv = 'Activate';
    }else{
        $status = 'N';
        $aktiv = 'Non Activate';
    }
    mysql_query("UPDATE phpmu_user SET status='$status' where id_user='$_GET[id]'");
    echo "<script>window.alert('Data User is successfully $aktiv.');
                                window.location='index.php?page=user&stat=$_GET[stat]'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
        if ($_GET[stat]=='1'){
            $status = 'User Biasa';
            $level = 'user_biasa';
        }elseif ($_GET[stat]=='2'){
            $status = 'User Input';
            $level = 'user_input';
        }else{
            $status = 'User Admin';
            $level = 'user_admin';
        }
            if (isset($_POST[simpan])){
                $passw = md5($_POST[b]);
                mysql_query("INSERT INTO phpmu_user (username, password, nama_lengkap, alamat_email, no_telpon, alamat_lengkap, level, status, waktu_daftar, unit_kerja)           
                     VALUES('$_POST[a]','$passw','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$level','Y','$tanggaleks','$_POST[unit]')");
                echo "<script>window.alert('successfully Add Data $status.');
                                window.location='index.php?page=user&stat=$_GET[stat]'</script>";
            }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Add Data <?php echo $status; ?></strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-4">
                            <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-4">
                            <input type="password" name="b" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">FullName</label>
                            <div class="col-lg-6">
                            <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email Address</label>
                            <div class="col-lg-6">
                            <input type="email" name="d" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Telephone Number</label>
                            <div class="col-lg-3">
                            <input type="text" name="e" placeholder="" data-required="true" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Address</label>
                            <div class="col-lg-8">
                            <textarea placeholder="" name='f' rows="5" class="form-control" data-trigger="keyup" data-rangelength="[20,1200]"></textarea>
                            </div>
                        </div>

                        <?php if ($_SESSION[unit] == '0'){ ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Division Job</label>
                            <div class="col-lg-4">
                            <select name='unit' class="form-control">
                                <option value=''>- Choose Division Job -</option>
                                <option value='A'>Division Job A</option>
                                <option value='B'>Division Job B</option>
                                <option value='C'>Division Job C</option>
                                <option value='D'>Division Job D</option>
                                <option value='E'>Division Job E</option>
                                <option value='F'>Division Job F</option>
                                <option value='G'>Division Job G</option>
                            </select>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Division Job</label>
                            <div class="col-lg-4">
                            <select name='unit' class="form-control">
                                <option value='<?php echo $_SESSION[unit]; ?>'>Unit Kerja <?php echo $_SESSION[unit]; ?></option>
                            </select>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="form-group">
                            <div class="col-lg-9 pull-right">    
                            <button type="submit" name='simpan' class="btn btn-info">Save Data</button>                  
                            <button type="reset" class="btn btn-default">Reset</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>

<?php 
}elseif ($_GET[aksi]=='edit'){ 
    $e = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_user where id_user='$_GET[id]'"));
        if ($_GET[stat]=='1'){
            $status = 'User Biasa';
            $level = 'user_biasa';
        }elseif ($_GET[stat]=='2'){
            $status = 'User Input';
            $level = 'user_input';
        }else{
            $status = 'User Admin';
            $level = 'user_admin';
        }
            if (isset($_POST[update])){
                $passw = md5($_POST[b]);
                if ($_POST[b] == ''){
                    mysql_query("UPDATE phpmu_user SET username       = '$_POST[a]',
                                                       nama_lengkap   = '$_POST[c]',
                                                       alamat_email   = '$_POST[d]',
                                                       no_telpon      = '$_POST[e]',
                                                       alamat_lengkap = '$_POST[f]',
                                                       unit_kerja     = '$_POST[unit]' where id_user='$_GET[id]'");
                    echo "<script>window.alert('Sukses Update Data $status.');
                                    window.location='index.php?page=user&stat=$_GET[stat]'</script>";
                }else{
                    mysql_query("UPDATE phpmu_user SET username       = '$_POST[a]',
                                                       password       = '$passw',
                                                       nama_lengkap   = '$_POST[c]',
                                                       alamat_email   = '$_POST[d]',
                                                       no_telpon      = '$_POST[e]',
                                                       alamat_lengkap = '$_POST[f]',
                                                       unit_kerja     = '$_POST[unit]' where id_user='$_GET[id]'");
                    echo "<script>window.alert('Sukses Update Data $status.');
                                    window.location='index.php?page=user&stat=$_GET[stat]'</script>";
                }
            }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Edit Data <?php echo $status; ?></strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-4">
                            <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[username]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-4">
                            <input type="password" name="b" placeholder="" class="bg-focus form-control"> (<i>Ignore if it  is not Changed</i>)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">FullName</label>
                            <div class="col-lg-6">
                            <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[nama_lengkap]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email Address</label>
                            <div class="col-lg-6">
                            <input type="email" name="d" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[alamat_email]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Telephone Number</label>
                            <div class="col-lg-3">
                            <input type="text" name="e" placeholder="" data-required="true" class="form-control" value="<?php echo $e[no_telpon]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Address</label>
                            <div class="col-lg-8">
                            <textarea placeholder="" name='f' rows="5" class="form-control" data-trigger="keyup" data-rangelength="[20,1200]"><?php echo $e[alamat_lengkap]; ?></textarea>
                            </div>
                        </div>
                        <?php if ($_SESSION[unit] == '0'){ ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Division Job</label>
                            <div class="col-lg-4">
                            <select name='unit' class="form-control">
                                <option value='<?php echo $e[unit_kerja]; ?>'>Unit Kerja <?php echo $e[unit_kerja]; ?></option>
                                <option value='A'>Division Job A</option>
                                <option value='B'>Division Job B</option>
                                <option value='C'>Division Job C</option>
                                <option value='D'>Division Job D</option>
                                <option value='E'>Division Job E</option>
                                <option value='F'>Division Job F</option>
                                <option value='G'>Division Job G</option>
                            </select>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Division Job</label>
                            <div class="col-lg-4">
                            <select name='unit' class="form-control">
                                <option value='<?php echo $_SESSION[unit]; ?>'>Unit Kerja <?php echo $_SESSION[unit]; ?></option>
                            </select>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-lg-9 pull-right">    
                            <button type="submit" name='update' class="btn btn-info">Update Data</button>                  
                            <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            </div>
<?php } ?>
              <!-- Footer -->
             <footer id="footer"> 
                <div class="text-center clearfix">
                    <p><small><strong>&copy; Recruitment OPTiM 2016, Developed By Josua Antonius Naiborhu </strong></small>
                        <br /><br /> 
                        <a href="https://twitter.com/naiborhu_josua" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.facebook.com/Naiborhujosua" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/u/0/+josuanaiborhunaiborhu" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p>  
                </div> 
            </footer>