<?php
session_start();

$pageName = 'home-medical';

if(isset($_SESSION['accountname'])){
    include 'init.php';
    $id = $_SESSION['ID'];
    $stmt=$con->prepare("SELECT reg_Type FROM medical_institution WHERE m_ID=:id");
    $stmt->execute(array(':id'=>$id));
    $row=$stmt->fetch();
    if($row['reg_Type']==0){
        $themsg = "you are in the waiting list ";
        getMessage($themsg,$secounds=5);
    }else{

          /*start contact message*/

          if(isset($_POST['submit_message'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];

            $stmt_message = $con->prepare("INSERT INTO message(`name`,`email`,`phone`,`message`,creation)VALUES(:name,:email,:phone,:message,NOW())");
            $stmt_message->execute(array(':name'=>$name,
                         ':email'=>$email,
                         ':phone'=>$phone,
                         ':message'=>$message));

          }

          /*end contact message*/



?>

<!-- Carousel Code -------------------------------------------------------------------->
    <div class="section2">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!--start bxslider-->
            <ul class="bxslider">
                <li><img class="slider" src="<?php echo $img ?>slide1.jpg" />
                    <div class="carousel-caption">
                        <h1>Donate Blood Save Life !</h1>
                        <p class="slide-caption type"></p>
                    </div>
                </li>
                <li><img class="slider" src="<?php echo $img ?>slide2.jpg" />
                    <div class="carousel-caption">
                        <h1>Donate Blood Save Life !</h1>
                        <p class="slide-caption type"></p>
                    </div>
                </li>
                <li><img class="slider" src="<?php echo $img ?>slide3.jpg" />
                    <div class="carousel-caption">
                        <h1>Donate Blood Save Life !</h1>
                        <p class="slide-caption type"></p>
                    </div>
                </li>
            </ul>
            <!--end bxslider-->

        </div>
    </div>
    <div style="clear:both"></div>
    <!--End Carousel Code -------------------------------------------------------------------->
    <!-- Donation Process -------------------------------------------------------------------->
    <div id="section3">
        <div class="parent3">
            <div class="container">
                <div class="process-header wow fadeIn">
                    <h1 class="sec-title">Donation Process</h1>
                    <h3 class="sec-caption">The donation process from the time you arrive center until the time you leave</h3>
                </div>
                <div class="process-container">
                    <div class="main1 wow fadeInRight" data-wow-delay=".5s">
                        <img class="process-img" src="<?php echo $img ?>process1.jpg">
                        <h3 class="process-name">1.Registration</h3>
                        <p class="process-description">You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process. </p>
                    </div>
                    <div class="main2 wow fadeInRight" data-wow-delay="1s">
                        <img class="process-img" src="<?php echo $img ?>process2.jpg">
                        <h3 class="process-name">2.Screening</h3>
                        <p class="process-description">A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process.</p>
                    </div>
                    <div class="main3 wow fadeInRight" data-wow-delay="1.5s">
                        <img class="process-img" src="<?php echo $img ?>process3.jpg">
                        <h3 class="process-name">3.Donation</h3>
                        <p class="process-description">After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes. </p>
                    </div>
                    <div class="main4 wow fadeInRight" data-wow-delay="2s">
                        <img class="process-img" src="<?php echo $img ?>process4.jpg">
                        <h3 class="process-name">4.Refreshment</h3>
                        <p class="process-description">You can also stay in sitting room until you feel strong enough to leave our center. You will receive awesome drink from us in donation zone. </p>
                    </div>
                    <br style="clear: both">
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
    <!--End Donation Process -------------------------------------------------------------------->
    <!--start statistic-->
    <section class="statistics text-center exp">
        <div class="data">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay=".5s">
                            <i class="fa fa-heartbeat fa-5x"></i>
                            <p>2.758</p>
                            <span>SUCCESS SMILE</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay="1.0s">
                            <i class="fa fa-stethoscope fa-5x"></i>
                            <p>3.255</p>
                            <span>Happy Donors</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay="1.5s">
                            <i class="fa fa-users fa-5x"></i>
                            <p>3.685</p>
                            <span>Happy Recipient</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay="2.0s">
                            <i class="fa fa-building fa-5x"></i>
                            <p>1.385</p>
                            <span>Total Awards</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="clear:both"></div>
    <!--end statistic-->

    <!-- Contact ------------------------------------------------------------------------------->
    <section class="contact-us text-center" id="section5">
        <div class="fields">
            <div class="container">
                <div class="row">
                    <i class="fa fa-tint fa-5x color" style="color: #D83841"></i>
                    <h2 class="h1 color">You Want To We'd love To Hear About Your Feedback</h2>
                    <!-- Start Contact Form -->
                    <form role="form">
                        <div class="col-md-6 wow bounceInLeft" data-wow-duration="1s" data-wow-offset="300">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Cell Phone">
                            </div>
                        </div>
                        <div class="col-md-6 wow bounceInRight" data-wow-duration="1s" data-wow-offset="300">
                            <div class="form-group">
                                <textarea class="form-control input-lg" placeholder="Your Message"></textarea>
                            </div>
                            <button type="button" class="btn btn-danger btn-lg btn-block">Contact Us</button>
                        </div>
                    </form>
                    <!-- End Contact Form -->
                </div>
            </div>
        </div>
    </section>
    <div style="clear:both"></div>
    <!-- End Contact -------------------------------------------------------------------------->
    <!--start footer-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 copy_right">
                    &nbsp;&nbsp;&nbsp; Copyright © 2018
                </div>
                <div class="col-lg-4">
                    <ul class="list-unstyled social-list">
                        <li>
                            <a href="https://www.facebook.com" target="_blank"> <img class="wow zoomIn" src="<?php echo $image ?>social-bookmarks/facebook.png" width="48" height="48" data-wow-duration="2s" data-wow-delay="0.5s" ></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/discover" target="_blank"><img class="wow zoomIn"  src="<?php echo $image ?>social-bookmarks/gplus.png" width="48" height="48" data-wow-duration="2s" data-wow-delay="0.5s"></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank"><img class="wow zoomIn"  src="<?php echo $image ?>social-bookmarks/twitter.png" width="48" height="48" data-wow-duration="2s" data-wow-delay="0.5s"></a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank"><img class="wow zoomIn"  src="<?php echo $image ?>social-bookmarks/pinterest.png" width="48" height="48" data-wow-duration="2s" data-wow-delay="0.5s"></a>
                        </li>
                        <li>
                            <a href="https://www.rss.com" target="_blank"><img class="wow zoomIn"  src="<?php echo $image ?>social-bookmarks/rss.png" width="48" height="48" data-wow-duration="2s" data-wow-delay="0.5s"></a>
                        </li>
                        <li>
                            <a href="https://www.google.com/gmail/about/#" target="_blank"><img class="wow zoomIn"  src="<?php echo $image ?>social-bookmarks/email.png" width="48" height="48" data-wow-duration="2s" data-wow-delay="0.5s"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div style="clear:both"></div>
    <!--end footer-->
    <!--start scroll to top-->
    <a id="scroll-top" href="#top">
        <i class="fa fa-chevron-up fa-2x"></i>
    </a>
    <!--end scroll to top-->
    <!--start loading-->
    <div class="loading-overlay">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!--end loading-->




<?php

        include $temp_path.'footer.php';

}}else{
    header('Location:../index.php');
}

?>
