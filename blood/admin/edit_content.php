<?php
include 'init.php';

if(isset($_SESSION['username'])){

    $do = '';
    if(isset($_GET['do'])){
        $do = $_GET['do'];
    }




/********************************** start message managment *************************************/


    /* start message edit page */
    if($do=='mes_edit'){
        if(isset($_GET['mes_ID'])){
        $id = $_GET['mes_ID'];
        $mes_stmt = $con->prepare("SELECT * FROM message WHERE ID=:id");
        $mes_stmt->execute(array(':id'=>$id));
        $row = $mes_stmt->fetch();
        ?>
            <div class="message-form">
                <form class="edit-form-message" action="edit_content.php?do=mes_update" method="post">
                    <h3 class="edit-type">Message Edit Form</h3>
                    <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                    <input type="text" name="name" class="message-input-edit" value="<?php echo $row['name']; ?>">
                    <input type="email" name="email" class="message-input-edit" value="<?php echo $row['email']; ?>">
                    <input type="text" name="phone" class="message-input-edit" value="<?php echo $row['phone']; ?>">
                    <textarea name="message" class="message-input-edit"><?php echo $row['message']; ?></textarea>
                    <br style="clear: both">
                    <button type="submit" class="message-button-save">Update</button>
                </form>
            </div>';
<?php
    }else{
            header('Location:../index.php');
        }} /* end message edit page */

    /* start message update */
    elseif($do=='mes_update'){
        if(isset($_POST['id'])){

            $id      = $_POST['id'];
            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $phone   = $_POST['phone'];
            $message = $_POST['message'];

            $msg_update = $con->prepare("UPDATE `message` SET `name`=:name,`email`=:email,`phone`=:phone,`message`=:message,`creation`=NOW() WHERE ID=:id");
            $msg_update->execute(array(':id'=>$id,
                                     ':name'=>$name,
                                     ':email'=>$email,
                                     ':phone'=>$phone,
                                     ':message'=>$message
                                    ));
            $themsg = "successfully updated......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }else{
            header('Location:../index.php');
        }
    }
    /* end message update */

    /* start delete message */
    elseif($do=='mes_delete'){
        if(isset($_GET['mes_ID'])){

            $id = $_GET['mes_ID'];

            $msg_del = $con->prepare("DELETE FROM `message` WHERE ID=:id");
            $msg_del->execute(array(':id'=>$id));
            $themsg = "successfully deleted......after ";
            getMessage($themsg,'bsck',$secounds=5);
        }else{
            header('Location:../index.php');
        }
    } /* end delete message */

/********************************** end message managment *************************************/



/********************************** start donor managment *************************************/


/* start donor edit */
    elseif($do =='don_edit'){

        if(isset($_GET['don_ID'])){

            $id = $_GET['don_ID'];
            $don_stmt = $con->prepare("SELECT * FROM donor WHERE d_ID=:id");
            $don_stmt->execute(array(':id'=>$id));
            $row = $don_stmt->fetch();
        ?>
            <div class="donor-form">
                <form class="edit-form-donor" action="edit_content.php?do=don_update" method="post">
                    <h3 class="edit-type">Donor Edit Form</h3>

                    <input type="hidden" name="id" value="<?php echo $row['d_ID'] ?>">

                    <input type="text" class="donor-input-edit" name="username" placeholder="username" value="<?php echo $row['username'] ?>">

                    <input type="text" class="donor-input-edit" name="fullname" placeholder="fullname" value="<?php echo $row['fullname'] ?>">

                    <input type="email" class="donor-input-edit" name="email" placeholder="email" value="<?php echo $row['email'] ?>">

                    <input type="password" class="donor-input-edit" name="password" placeholder="password" value="<?php echo $row['password'] ?>">

                    <input type="text" class="donor-input-edit" name="gender" placeholder="gender" value="<?php echo $row['gender'] ?>">

                    <input type="text" class="donor-input-edit" name="age" placeholder="age" value="<?php echo $row['age'] ?>">

                    <input type="text" class="donor-input-edit" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>">

                    <input type="text" class="donor-input-edit" name="telephone" placeholder="telephone" value="<?php echo $row['telephone'] ?>">

                    <input type="text" class="donor-input-edit" name="address" placeholder="address" value="<?php echo $row['address'] ?>">

                    <select class="donor-input-edit" name="city">
                        <option>city...</option>
                        <?php
                            $select = $con->prepare("SELECT city_ID,name FROM city");
                            $select->execute();
                            while($cit = $select->fetch()){?>
                            <option value="<?php echo $cit['city_ID'] ?>" <?php if($row['city_ID']==$cit['city_ID']) echo "selected"?> >
                                <?php echo $cit['name'];?>
                            </option>
                        <?php } ?>
                    </select>

                    <select class="donor-input-edit" name="blood">
                        <option>bloodType...</option>
                        <?php
                            $select = $con->prepare("SELECT b_ID,type FROM blood");
                            $select->execute();
                            while($bld = $select->fetch()){?>
                            <option value="<?php echo $bld['b_ID'] ?>"  <?php if($row['blood_ID']==$bld['b_ID']) echo "selected"?> >
                                <?php echo $bld['type'];?>
                           </option>
                        <?php } ?>
                    </select>

                    <br style="clear: both">
                    <button type="submit" name="submit" class="donor-button-save">Save</button>
                </form>
            </div>';
<?php }else{
            header('Location:../index.php');
        } }
    /* end donor edit */

    /* start donor update */

    elseif($do=='don_update'){
        if(isset($_POST['submit'])){

            $id = $_POST['id'];
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $telephone = $_POST['telephone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $blood = $_POST['blood'];

            $don_check = $con->prepare("SELECT username FROM donor WHERE username=:username AND d_ID!=:id");
            $don_check->execute(array(':id'=>$id,':username'=>$username));
            $count = $don_check->rowCount();
            if($count>0){
                echo 'you cant update ';
            }else{
                $don_update = $con->prepare("UPDATE `donor` SET `username`=:username,`password`=:password,`fullname`=:fullname,`email`=:email,`creation`=NOW(),`gender`=:gender,`age`=:age,`phone`=:phone,`telephone`=:telephone,`address`=:address,`city_ID`=:city,`blood_ID`=:blood WHERE `d_ID`=:id");
                $don_update->execute(array(':username'=>$username,
                                           ':password'=>$password,
                                           ':fullname'=>$fullname,
                                           ':email'=>$email,
                                           ':gender'=>$gender,
                                           ':age'=>$age,
                                           ':phone'=>$phone,
                                           ':telephone'=>$telephone,
                                           ':address'=>$address,
                                           ':city'=>$city,
                                           ':blood'=>$blood,
                                           ':id'=>$id));
                $themsg = "successfully updated......after ";
                getMessage($themsg,'bsck',$secounds=5);
            }

        }else{
            header('Location:../index.php');
        }


    }


    /* end donor update */

    /* start donor delete */
    elseif($do=='don_del'){

        if(isset($_GET['don_ID'])){

            $id = $_GET['don_ID'];
            $don_del = $con->prepare("DELETE FROM donor WHERE d_ID = :id");
            $don_del->execute(array(':id'=>$id));

            $themsg = "successfully deleted......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }else{
            header('Location:../index.php');
        }
    }
    /* end donor delete */

    /* start donor activate */
    elseif($do=='don_activate'){
        if(isset($_GET['don_ID'])){

            $id = $_GET['don_ID'];
            $don_act = $con->prepare("UPDATE donor SET `reg_Type`=1 WHERE d_ID=:id");
            $don_act->execute(array(':id'=>$id));

            $themsg = "successfully activated......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }else{
            header('Location:../index.php');
        }
    }
    /* end donor activate */

    /****************************end donor management*******************************************/




    /****************************start medical management***************************************/

    /* start medical institution edit */
    elseif($do=='medical_edit'){

        if(isset($_GET['m_ID'])){

            $m_id = $_GET['m_ID'];
            $m_stmt = $con->prepare("SELECT * FROM medical_institution WHERE m_ID=:id");
            $m_stmt->execute(array(':id'=>$m_id));
            $row = $m_stmt->fetch();
        ?>

            <div class="institution-form">
                <form class="edit-form-donor" action="edit_content.php?do=m_update" method="post">
                    <h3 class="edit-type"> Institution Edit Form</h3>

                    <input type="hidden" name="id" value="<?php echo $row['m_ID'] ?>">

                    <input type="text" class="institution-input-edit" placeholder="Account Name" name="account_name" value="<?php echo $row['account_name'] ?>">

                    <input type="text" class="institution-input-edit" placeholder="Account Password" name="account_pass" value="<?php echo $row['account_pass'] ?>">

                    <input type="text" class="institution-input-edit" placeholder="Email" name="email" value="<?php echo $row['email'] ?>">

                    <input type="text" class="institution-input-edit" placeholder="Name" name="name" value="<?php echo $row['name'] ?>">

                    <input type="text" class="institution-input-edit" placeholder="Address" name="address" value="<?php echo $row['address'] ?>">

                    <input type="text" class="institution-input-edit" placeholder="Hotline" name="hotline" value="<?php echo $row['hotline'] ?>">


                    <select class="institution-input-edit" name="city">
                        <option>city...</option>
                        <?php

                            $city_select = $con->prepare("SELECT name,city_ID FROM city");
                            $city_select->execute();
                            while($cit=$city_select->fetch()){
                        ?>
                        <option value="<?php echo $cit['city_ID'] ?>"
                            <?php if($row['city_ID']==$cit['city_ID']) echo "selected"?> >
                            <?php echo $cit['name'] ?>
                        </option>
                        <?php } ?>
                    </select>

                    <br style="clear: both">
                    <div class="inst-button"><button type="submit" name="submit" class="institution-button-save">update</button></div>

                </form>
            </div>

<?php    }else{

            header('Location:../index.php');
        }}
    /* end medical institution edit */


    elseif($do=='m_update'){

        if(isset($_POST['id'])){

            $id           = $_POST['id'];
            $account_name = $_POST['account_name'];
            $account_pass = $_POST['account_pass'];
            $email        = $_POST['email'];
            $name         = $_POST['name'];
            $address      = $_POST['address'];
            $hotline      = $_POST['hotline'];
            $city         = $_POST['city'];


            $m_check = $con->prepare("SELECT account_name FROM medical_institution WHERE account_name=:account_name AND m_ID!=:id");
            $m_check->execute(array(':id'=>$id,':account_name'=>$account_name));
            $count = $m_check->rowCount();
            if($count>0){
                echo 'you cant print';
            }else{
            $m_update = $con->prepare("UPDATE `medical_institution` SET `name`=:name,`address`=:address,`hotline`=:hotline,`account_name`=:account_name,`account_pass`=:account_pass,`email`=:email,`creation`=NOW(),`city_ID`=:city WHERE `m_ID`=:id");

            $m_update->execute(array(':name'=>$name,
                                     ':address'=>$address,
                                     ':hotline'=>$hotline,
                                     ':account_name'=>$account_name,
                                     ':account_pass'=>$account_pass,
                                     ':email'=>$email,
                                     ':city'=>$city,
                                     ':id'=>$id));

            $themsg = "successfully updated......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }}else{
            header('Location:../index.php');
        }


    }
    /* end medical update */

    /* start medical delete */
    elseif($do=='medical_del'){
        if(isset($_GET['m_ID'])){

            $id = $_GET['m_ID'];
            $m_delete = $con->prepare("DELETE FROM medical_institution WHERE m_ID =:id");
            $m_delete->execute(array(':id'=>$id));

            $themsg = "successfully deleted......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }else{
            header('Location:../index.php');
        }
    }
    /* end medical delete */

    /* start medical activate */
    elseif($do=='medical_activate'){

        if(isset($_GET['m_ID'])){

            $id = $_GET['m_ID'];
            $m_activate = $con->prepare("UPDATE `medical_institution` SET `reg_Type`=1 WHERE m_ID =:id ");
            $m_activate->execute(array(':id'=>$id));

            $themsg = "successfully activated......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }else{
            header('Location:../index.php');
        }

    }
    /* end medical activate */

/****************************end medical management***************************************/

/****************************test managment************************************************/
    elseif($do=='test_del'){
        if(isset($_GET['bt_ID'])){
            $id = $_GET['bt_ID'];
            $test_del = $con->prepare("DELETE FROM blood_test WHERE bt_ID=:id");
            $test_del->execute(array(':id'=>$id));
            $themsg = "successfully Deleted......after ";
            getMessage($themsg,'bsck',$secounds=5);

        }else{
            header('Location:../index.php');
        }
    }
/*******************************end test mangement*******************************************/

/********************************logout*******************************************************/
    elseif($do=='logout'){

        session_unset();
        session_destroy();
        header('Location:../index.php');
        exit();

    }

/**********************************end logout**********************************************/


include $temp_path.'footer.php';
    }else{
    header('Location:../index.php');
}

?>
