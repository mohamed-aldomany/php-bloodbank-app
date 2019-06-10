   <!--Navbar Code--------------------------------------------------------------------->
    <?php
        session_start();
    ?>
    <div class="section1" id="top">

        <nav>
            <h1 class="logo"><a href="home_admin.php"><span class="blood">Blood </span>Donation</a></h1>
            <ul class="nav-ul">
                <li><a href="home_admin.php">Home</a></li>
                <li><a href="admin.php">Manage</a></li>
                <li><a href="../donor/home_user.php">live</a></li>

                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'] ?><span class="caret"></span></a>
                      <ul class="dropdown-menu">

                        <li><a href="edit_profile.php"><i class="fa fa-pencil"></i>&nbsp;Edit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="edit_content.php?do=logout"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Log Out</a></li>
                      </ul>
                    </li>
            </ul>
            <div style="clear:both"></div>
        </nav>
        <div class="navbar-responsive">
            <h3 class="logo-responsive"><a href="#"><span class="blood">Blood </span>Donation</a></h3>
            <i class="fa fa-bars"></i>
            <div style="clear:both"></div>

        </div>
    </div>
    <!--End Navbar Code--------------------------------------------------------------------->
