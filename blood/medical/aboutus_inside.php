<?php
 session_start();
$pageName = 'about-us';

 if(isset($_SESSION['accountname'])){
 include 'init.php';

?>

    <!--start type-->
    <!--
    <div class="typed_span">
        <p class="typed"></p>
    </div>
-->
    <!--end type-->
    <!--start about us-->
    <section class="our-team">
        <div class="team">
            <div class="container">
                <div class="person wow pulse" data-wow-duration="2s" data-wow-offset="400" data-wow-delay="3.5s">
                    <img class="img-circle" src="<?php echo $img ?>boss.png" width="200" height="200">
                    <h3>Name</h3>
                    <p>This Is Pla Pla Pla</p>
                    <i class="fa fa-google-plus fa-lg"></i>
                    <i class="fa fa-facebook fa-lg"></i>
                    <i class="fa fa-twitter fa-lg"></i>
                </div>
                <div class="person wow pulse" data-wow-duration="2s" data-wow-offset="400" data-wow-delay="4s">
                    <img class="img-circle" src="<?php echo $img ?>boss.png" width="200" height="200">
                    <h3>Name</h3>
                    <p>This Is Pla Pla Pla</p>
                    <i class="fa fa-google-plus fa-lg"></i>
                    <i class="fa fa-facebook fa-lg"></i>
                    <i class="fa fa-twitter fa-lg"></i>
                </div>
                <div class="person wow pulse" data-wow-duration="2s" data-wow-offset="400" data-wow-delay="4.5s">
                    <img class="img-circle" src="<?php echo $img ?>boss.png" width="200" height="200">
                    <h3>Name</h3>
                    <p>This Is Pla Pla Pla</p>
                    <i class="fa fa-google-plus fa-lg"></i>
                    <i class="fa fa-facebook fa-lg"></i>
                    <i class="fa fa-twitter fa-lg"></i>
                </div>
                <div class="person wow pulse" data-wow-duration="2s" data-wow-offset="400" data-wow-delay="5s">
                    <img class="img-circle" src="<?php echo $img ?>boss.png" width="200" height="200">
                    <h3>Name</h3>
                    <p>This Is Pla Pla Pla</p>
                    <i class="fa fa-google-plus fa-lg"></i>
                    <i class="fa fa-facebook fa-lg"></i>
                    <i class="fa fa-twitter fa-lg"></i>
                </div>
                <div class="person wow pulse" data-wow-duration="2s" data-wow-offset="400" data-wow-delay="5.5s">
                    <img class="img-circle" src="<?php echo $img ?>boss.png" width="200" height="200">
                    <h3>Name</h3>
                    <p>This Is Pla Pla Pla</p>
                    <i class="fa fa-google-plus fa-lg"></i>
                    <i class="fa fa-facebook fa-lg"></i>
                    <i class="fa fa-twitter fa-lg"></i>
                </div>
            </div>
        </div>
    </section>
    <!--end about us-->
    <!--start keep in touch-->
    <section class="subscribe text-center">
        <div class="container  wow fadeInUp" data-wow-duration="2s">
            <h2 class="h1">Keep In Touch</h2>
            <p class="lead">Sign Up For Newsletter , Don't Worry About Span</p>
            <form class="form-inline">
                <input class="form-control input-lg" type="text" placeholder="Enter Your Email">
                <button class="btn btn-danger btn-lg">
                        <i class="fa fa-edit fa-lg"></i>
                        Subscribe</button>
            </form>
        </div>
    </section>
    <!--end keep in touch-->
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
 }else{
     header('Location:../index.php');
     }
?>
