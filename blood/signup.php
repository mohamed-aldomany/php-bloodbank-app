<?php
include 'init.php';


if(isset($_POST['submitdon'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email      = $_POST['email'];
    $mobile      = $_POST['mobile'];
    $city      = $_POST['city'];
    $blood      = $_POST['blood'];

    $select = $con->prepare("SELECT username FROM donor WHERE username=:username");
    $select->execute(array(':username'=>$username));
    $count = $select->rowCount();
    if($count>0){
        getMessage("change the username after...");
    }else{
        $stmt = $con->prepare("INSERT INTO donor(`username`,`password`,`email`,`phone`,`city_ID`,`blood_ID`,creation)
                           VALUES(:username,:password,:email,:mobile,:city,:blood,NOW())");
        $stmt->execute(array(
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email,
            ':mobile'=>$mobile,
            ':city'=>$city,
            ':blood'=>$blood
        ));
        header('Location:donor.php');
    }
}
/* end of signup of donor */


elseif(isset($_POST['submithos'])){
    $accountname = $_POST['accountname'];
    $password = $_POST['password'];
    $email      = $_POST['email'];
    $mobile      = $_POST['mobile'];
    $city      = $_POST['city'];
    $hospital = $_POST['hospitalname'];

    $select = $con->prepare("SELECT account_name FROM medical_institution WHERE account_name=:accountname");
    $select->execute(array(':accountname'=>$accountname));
    $count = $select->rowCount();
    if($count>0){
        getMessage("change the accountname after...");
    }
    else{
        $stmt = $con->prepare("INSERT INTO medical_institution(`name`,`hotline`,`account_name`,`account_pass`,`email`,`city_ID`,creation)VALUES(:name,:hotline,:accountname,:accountpass,:email,:city,NOW())");

        $stmt->execute(array(
            ':name'=>$hospital,
            ':hotline'=>$mobile,
            ':accountname'=>$accountname,
            ':accountpass'=>$password,
            ':email'=>$email,
            ':city'=>$city
            ));
        header('Location:hospital.php');
}}/* end of institute */



?>

