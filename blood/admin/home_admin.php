<?php
$pageName = 'home-admin';
include 'init.php';
if(isset($_SESSION['username'])){

?>

<!--start statistic-->
    <section class="statistics text-center exp">
        <div class="data">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay=".5s">
                            <i class="fa fa-envelope  fa-5x"></i>
                            <p><?php echo countItem('ID','message'); ?></p>
                            <span>Total Messages</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay="1.0s">
                            <i class="fa fa-users  fa-5x"></i>
                            <p><?php echo countItem('d_ID','donor'); ?></p>
                            <span>Total Donors</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay="1.5s">
                            <i class="fa fa-h-square      fa-5x"></i>
                            <p><?php echo countItem('m_ID','medical_institution'); ?></p>
                            <span>Total Institution</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats wow pulse" data-wow-duration="1.5s" data-wow-delay="2.0s">
                            <i class="fa fa-pause  fa-5x"></i>
                            <p><?php echo countItem_cond('d_ID','donor','reg_Type',0); ?></p>
                            <span>Total donor Pending</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div style="clear:both"></div>
    <!--end statistic-->


    <!-- statistics2------------------------>

    <div class="statistics2">
        <div class="parent10">
            <div class="div1-stat">
                <h3 class="stat2-h"><i class="fa fa-user" aria-hidden="true"></i>  Lastest 3 Rigister Donors</h3>
                <?php
                $row = latest('username','donor','d_ID',3);
                foreach ($row as $rows) {
                ?>
                <div class="stat-content">
                    <p class="stat-p"><i class="fa fa-chevron-right"></i>
                        <?php echo $rows['username'];?>
                    </p>
                </div>
                <?php } ?>
            </div>
            <div class="div2-stat">
                <h3 class="stat2-h"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Lastest 3 Register Institutions</h3>
                <?php
                $row = latest('account_name','medical_institution','m_ID',3);
                foreach ($row as $rows) {
                ?>
                <div class="stat-content">
                    <p class="stat-p"><i class="fa fa-chevron-right"></i>
                        <?php echo $rows['account_name'];?>
                    </p>
                </div>
                <?php } ?>
            </div>
            <div class="div3-stat">
                <h3 class="stat2-h"><i class="fa fa-envelope" aria-hidden="true"></i>  Lastest 3 Comments By</h3>
                <?php
                $row = latest('name','message','ID',3);
                foreach ($row as $rows) {
                ?>
                <div class="stat-content">
                    <p class="stat-p"><i class="fa fa-chevron-right"></i>
                        <?php echo $rows['name'];?>
                    </p>
                </div>
                <?php } ?>

            </div>
            <div style="clear:both"></div>
        </div>

    </div>

    <!-- statistics2------------------------>



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
    }
else{
    header('Location:../index.php');
}

?>
