<?php

session_start();

$pageName = 'edit-profile';

if(isset($_SESSION['accountname'])){

    include 'init.php';

    $m_id = $_SESSION['ID'];
    $m_stmt = $con->prepare("SELECT * FROM medical_institution WHERE m_ID=:id");
    $m_stmt->execute(array(':id'=>$m_id));
    $row = $m_stmt->fetch();
?>
<div class="institution-form">
                <form class="edit-form-donor" action="manage.php?page=m_update" method="post">
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
                            <?php if($row['city_ID']==$cit['city_ID']){ echo "selected";}?> >
                            <?php echo $cit['name'] ?>
                        </option>
                        <?php } ?>
                    </select>

                    <br style="clear: both">
                    <div class="inst-button"><button type="submit" name="submit" class="institution-button-save">update</button></div>

                </form>
            </div>
<?php

    include $temp_path.'footer.php';
}else{

    header('Location:../index.php');
}
