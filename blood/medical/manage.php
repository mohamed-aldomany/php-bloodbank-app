<?php
session_start();
if(isset($_SESSION['accountname'])){
    include 'init.php';

$page = '';
if(isset($_GET['page'])){
    $page=$_GET['page'];
}


    if($page=='choose')
    {
        if(isset($_GET['do'])&&($_GET['d_ID'])){
                $m_id = $_SESSION['ID'];
                $b_id = $_GET['do'];
                $d_ID = $_GET['d_ID'];

                $stmt_sel = $con->prepare("SELECT d_ID FROM take WHERE d_ID =:id AND m_ID=:m_ID");
                $stmt_sel->execute(array(':id'=>$d_ID,
                                         ':m_ID'=>$m_id));
                $count = $stmt_sel->rowCount();
                if($count>0){
                    $themsg = "you have already added the doner to your list......after ";
                    getMessage($themsg,'back',$secounds=5);
                }else{

                    $stmt = $con->prepare("INSERT INTO `take`(`bt_ID`, `m_ID`,`d_ID`, `creation`) VALUES (:b_id,:m_id,:d_ID,NOW())");
                    $stmt->execute(array(':b_id'=>$b_id,
                                         ':m_id'=>$m_id,
                                         ':d_ID'=>$d_ID));
                    $themsg = "you add doner to your list......after ";
                    getMessage($themsg,'back',$secounds=5);
                    }
            }}

    elseif($page=='del'){

        if(isset($_GET['del'])){

                $t_ID = $_GET['del'];
                $stmt_del = $con->prepare("DELETE FROM take WHERE t_ID=:id");
                $stmt_del->execute(array(':id'=>$t_ID));
                $themsg = "successfully deleted......after ";
                getMessage($themsg,'back',$secounds=5);
        }

}
    /* medical edit profile */

    elseif($page=='m_update'){
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
            getMessage($themsg,'back',$secounds=5);

        }}else{
            header('Location:../index.php');
        }


    }
    /* end medical update */

elseif($page=='logout'){

        session_unset();
        session_destroy();
        header('Location:../index.php');
        exit();

    }



}else{
    header('Location:../index.php');
    }



?>
