<?php
session_start();
$pageName = 'edit-profile';
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
            <form class="edit-form-donor" action="manage.php?do=don_update" method="post">
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

   <!-- Modal  start-->
    <?php

        $id = $_SESSION['d_ID'];

        $stmt = $con->prepare("SELECT fullname,username,email,name,type
        FROM donor,blood,city
        WHERE donor.city_ID=city.city_ID
        AND   donor.blood_ID=blood.b_ID
        AND   donor.d_ID=:id");

        $stmt->execute(array(':id'=>$id));
        $row = $stmt->fetch();

     ?>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Check Your Data</h4>
          </div>
          <div class="modal-body"> <!--body of modal start-->

            <form  action="manage.php?do=donateNow" method="post"> <!--start of form--->
              <div class="form-group">
                <label for="exampleInputPassword1">First Name</label>
                <input type="text" class="form-control" name="fullname" placeholder="fullname" value="<?php echo $row['fullname'] ?>" disabled>
              </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $row['username'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email address" value="<?php echo $row['email'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <input type="text" class="form-control" name="address" placeholder="City" value="<?php echo $row['name'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Blood</label>
                <input type="text" class="form-control" name="blood" placeholder="BloodType" value="<?php echo $row['type'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control" name="descripe" placeholder="description" ></textarea>
              </div>

            <button type="submit" class="btn btn-primary" name="submit">Donate</button>
            <a href="edit_profile.php"><button type="button" class="btn btn-primary">change data</button></a>
            </form> <!--end of form -->

          </div><!--body of modal end-->
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  end-->




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
