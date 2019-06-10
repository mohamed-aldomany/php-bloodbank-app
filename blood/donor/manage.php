<?php
session_start();
include 'init.php';

$id = $_SESSION['d_ID'];

$do='';
if(isset($_GET['do'])){
    $do=$_GET['do'];
}





if($do=='donateNow'){
    if(isset($_POST['submit'])){

        $descripe = $_POST['descripe'];

        $stmt_sel = $con->prepare("SELECT d_ID FROM blood_test WHERE d_ID=:id ");
        $stmt_sel->execute(array(':id'=>$id));
        $count = $stmt_sel->rowCount();
        if($count>0){
            $themsg = "you are already in donate list......after ";
            getMessage($themsg,'back',$secounds=5);
        }else{

        $stmt=$con->prepare("INSERT INTO `blood_test`( `d_ID`,`description`, `time`) VALUES (:d_ID,:descripe,NOW())");
        $stmt->execute(array(':d_ID'=>$id,
                             ':descripe'=>$descripe));
        $themsg = "successfully donated......after ";
        getMessage($themsg,'bsck',$secounds=5);

}}else{
        header('Location:../index.php');
    }

}


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


 /* start logout  */
    elseif($do=='logout'){

        session_unset();
        session_destroy();
        header('Location:../index.php');
        exit();

    }

 /* end logout */









?>
