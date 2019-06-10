<?php
$pageName ='edit-profile';
include 'init.php';

if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];

    $my_prof_sel = $con->prepare("SELECT * FROM donor WHERE username =:username");
    $my_prof_sel->execute(array(':username'=>$username));
    $row = $my_prof_sel->fetch();
?>


    <!-- Edit Profile Form-->
    <div class="edit-profile">
        <div class="edit-profile-form">
            <form class="edit-form-donor" action="edit_content.php?do=don_update" method="post">
                <h3 class="edit-type">Edit Profile</h3>

                <input type="hidden" name="id" value="<?php echo $row['d_ID'] ?>">

                <input type="text" class="edit-profile-input" placeholder="UserName" name="username" value="<?php echo $row['username'] ?>">

                <input type="text" class="edit-profile-input" placeholder= "Full Name" name="fullname" value="<?php echo $row['fullname'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Email" name="email" value="<?php echo $row['email'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Password" name="password" value="<?php echo $row['password'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Gender" name="gender" value="<?php echo $row['gender'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Age" name="age" value="<?php echo $row['age'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Phone" name="phone" value="<?php echo $row['phone'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Tel-Phone" name="telephone" value="<?php echo $row['telephone'] ?>">

                <input type="text" class="edit-profile-input" placeholder="Address" name="address" value="<?php echo $row['address'] ?>">

                <select class="edit-profile-input" name="city">
                            <option>City</option>
                            <?php
                            $select = $con->prepare("SELECT city_ID,name FROM city");
                            $select->execute();
                            while($cit = $select->fetch()){?>
                            <option value="<?php echo $cit['city_ID'] ?>" <?php if($row['city_ID']==$cit['city_ID']) echo "selected"?>  ><?php echo $cit['name'];?></option>
                        <?php } ?>
                </select>


                <select class="edit-profile-input" name="blood">
                            <option>Blood Type...</option>-input
                            <?php
                            $select = $con->prepare("SELECT b_ID,type FROM blood");
                            $select->execute();
                            while($bld = $select->fetch()){?>
                            <option value="<?php echo $bld['b_ID'] ?>" <?php if($row['blood_ID']==$bld['b_ID']) echo "selected"?>  ><?php echo $bld['type'];?></option>
                        <?php } ?>
               </select>
                <br style="clear: both">
                <button type="submit" name="submit" class="edit-profile-save">Save Changes</button>

            </form>
        </div>
    </div>

    <!-- Edit Profile Form-->



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
