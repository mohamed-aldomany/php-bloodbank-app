   <!--Navbar Code--------------------------------------------------------------------->

    <div class="section1" id="top">

        <nav>
            <h1 class="logo"><a href="home_user.php"><span class="blood">Blood </span>Donation</a></h1>
            <ul class="nav-ul">
                <li><a href="aboutus_inside.php">About Us</a></li>
                <li><a href="#" class="contact-linknav">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="edit_profile.php"><i class="fa fa-pencil"></i>&nbsp;Edit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="manage.php?do=logout"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                <!-- Button trigger modal refer to the modal-->
                  <button type="button" class="btn btn-primary btn-md donateNow" data-toggle="modal" data-target="#myModal1">Donate Now</button>
              </ul>
            </div><!-- /.navbar-collapse -->
            <div style="clear:both"></div>
        </nav>
        <div class="navbar-responsive">
            <h3 class="logo-responsive"><a href="#"><span class="blood">Blood </span>Donation</a></h3>
            <i class="fa fa-bars"></i>
            <div style="clear:both"></div>

        </div>
    </div>
    <!--End Navbar Code--------------------------------------------------------------------->

