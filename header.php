    <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style='color:#8a8a8a; padding-top:15px' class="navbar-brand" href="index.php"><i style='color:#000' class="fa fa-paste"></i> &nbsp; E-Documents</a>
        </div>

        <ul class="nav navbar-nav pull-right hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown"> 
                <img class="img-circle" src="images/user_2.jpg" alt="avatar"> Welcome ! <b style='color:red'><?php echo $_SESSION[namalengkap]; ?> </b><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a style='width:260px' href="account.mu">Setting Account</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Sign Out</a></li>
                    </ul>
            </li>
        </ul>