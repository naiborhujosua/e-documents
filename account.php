<?php 
/**
 * @var $e for update any data in profile based on data
 * in database by settting any atribut in table phpmu_user
 * there are two condition
 *  if(Empty)
 *      echo Successfully update yout profile
 *   else
 *       change any atribute in table 
 *       echo Successfully update yout profile
 *
 *  @var $ee for getting any data from 
 * in database by setting any atribut in table phpmu_user by selecting id_user
 */
if ($_GET[aksi]==''){ 
    $e = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_user where id_user='$_SESSION[login]'"));
            if (isset($_POST[update])){
                $passw = md5($_POST[b]);
                if ($_POST[b] == ''){
                    mysql_query("UPDATE phpmu_user SET username       = '$_POST[a]',
                                                       nama_lengkap   = '$_POST[c]',
                                                       alamat_email   = '$_POST[d]',
                                                       no_telpon      = '$_POST[e]',
                                                       alamat_lengkap = '$_POST[f]' where id_user='$_SESSION[login]'");
                    echo "<script>window.alert('Successfully update your profile.');
                                    window.location='account'</script>";
                }else{
                    mysql_query("UPDATE phpmu_user SET username       = '$_POST[a]',
                                                       password       = '$passw',
                                                       nama_lengkap   = '$_POST[c]',
                                                       alamat_email   = '$_POST[d]',
                                                       no_telpon      = '$_POST[e]',
                                                       alamat_lengkap = '$_POST[f]' where id_user='$_SESSION[login]'");
                    echo "<script>window.alert('Successfully update your profile.');
                                    window.location='account'</script>";
                }
            }
    $ee = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_user where id_user='$_SESSION[login]'"));
?>

                <h4 style='padding-top:15px'>Edit Your  Data Account </h4>
            <!-- Basic Data Tables Example  -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><br></div>
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
                            <input type="password" name="b" placeholder="" class="bg-focus form-control"> (<i>Ignore if it is not changed</i>)
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
                    <p><small><strong> &copy 2016 - Developed by Josua Antonius Naiborhu - OPTiM Recruitment</strong></small>
                        <br /><br /> 
                        <a href="https://twitter.com/naiborhu_josua" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.facebook.com/Naiborhujosua" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/u/0/+josuanaiborhunaiborhu" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>