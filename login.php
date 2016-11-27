<!DOCTYPE html>
<html>
<head>
  <title>Login - Administrator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- theme -->
    <link rel="stylesheet" type="text/css" href="css/theme/default.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/elements/signin.css" />
 
    <!-- open sans font -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,700italic,400,700" rel="stylesheet" type="text/css">

</head>
 <!-- call css of onepage -->
<body class="onepage">

    <?php 
        //check variable login which consist of username and password
        if (isset($_POST[login])){
            /**
             * [$user create username and save it on $user]
             * @var [string] 
             * [$pass create password by md5 encryption and save it on $pass]
             * @var [string]
             * [$login create any similarities of data in database and password an username entered]
             * @var [string]    
             *  [$cocok make any arangement of $login that consist of username and password]
             * @var [string] 
             * * [$r call any data that caught in $login]
             * @var [string] 
             *      if(right)
             *      Run Session for each $r
             *      else(wrong)
             *      "Sorry You do not have access"
             */
            $user = $_POST['user'];
            $pass = md5($_POST['pass']);
            $login=mysql_query("SELECT * FROM phpmu_user
                WHERE username='$user' AND password='$pass' AND status='Y'");
            $cocok=mysql_num_rows($login);
            $r=mysql_fetch_array($login);
            
            if ($cocok > 0){
                $_SESSION[login]        = $r[id_user];
                $_SESSION[username]     = $r[username];
                $_SESSION[namalengkap]  = $r[nama_lengkap];
                $_SESSION[password]     = $r[password];
                $_SESSION[level]        = $r[level];
                $_SESSION[unit]        = $r[unit_kerja];

                header('location:index.php');
            }else{
                echo "<script>window.alert('Sorry, You do not have acess');
                        window.location=('index.php')</script>";
            }
        }
        //check variable aksidaftar which consist of waktu and password
        if (isset($_POST[aksidaftar])){
                /**
                 * [$waktu form of time that convert by using documentation of PHP]
                 * @var [date]
                 * [$pass password encryption by using md5]
                 * @var [password]
                 * update Administrator by updating database in  table phpmu_user
                 * Run udate of user 
                 */
        		$waktu = date("Y-m-d H:i:s");
        		$pass = md5($_POST[b]);
        		mysql_query("INSERT INTO phpmu_user (username, password, nama_lengkap, alamat_email, no_telpon, alamat_lengkap, level, status, waktu_daftar, unit_kerja)
        									 VALUES ('$_POST[a]','$pass','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','user_biasa','N','$waktu','$_POST[unit]')");
                header('location:index.php?daftar=success');

        }
?>      
     <!-- Bootstrap implementation-->
     <div class="col-md-4 col-md-offset-4 text-center">
        <h3 class='logo'>E-Documents</h3>
        <div>
            <br>
            <p>Your Assistance for Managing Bussiness Trip Documents Easily
            <p>Fill Your Login Form Here.</p>

            
            
            <form class="m-t" role="form" action="" method='POST'>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name='user'>
                    <input type="password" class="form-control" placeholder="Password" required="" name='pass'>
                </div>
                
                <button name='login' type="submit" class="btn btn-primary block full-width signin-btn">Enter</button>
            </form>
            <p class="m-t"> <small><strong>&copy; Recruitment OPTiM 2016, Developed By Josua Antonius Naiborhu </strong></small> </p>
        </div>
    </div>




    <!-- scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/theme.js"></script>


</body>

<!-- Mirrored from istran.net/myxdashboard/signin.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 03 October 2016 04:33:17 GMT -->
</html>