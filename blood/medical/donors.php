<?php
session_start();

$pageName = 'find donors';

if(isset($_SESSION['accountname'])){

    include 'init.php';

    $id = $_SESSION['ID'];

?>
    <!--start hospital option-->
    <nav class="hospital_option">
        <label class="custom-select" for="styledSelect1">
            <select id="styledSelect1" name="city">
                <option value="">Select City</option>
                <?php
                    $city = $con->prepare("SELECT * FROM city");
                    $city->execute();
                    while($row=$city->fetch()){
                     ?>
                    <option value="<?php echo $row['city_ID'] ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
        </label>
        <label class="custom-select" for="styledSelect1">
            <select id="styledSelect1" name="blood">
                    <option value="">Select bloodTyp</option>
                    <?php
                    $blood = $con->prepare("SELECT * FROM blood");
                    $blood->execute();
                    while($row=$blood->fetch()){
                     ?>
                    <option value="<?php echo $row['b_ID'] ?>"><?php echo $row['type']; ?></option>
                <?php } ?>
            </select>
        </label>
        <a href="select.php?page=city&id=<?php echo $row['b_ID'] ?>" class="btn btn-danger button_hos_info" role="button">Choose</a>
    </nav>
    <!--end hospital option-->


    <?php


    $donor_detail = $con->prepare("SELECT
                    donor.d_ID AS d_ID ,bt_ID,fullname,email,gender,age,phone,name,type,time,description
                    FROM donor,blood_test,city,blood
                    WHERE donor.city_ID = city.city_ID
                    AND   donor.blood_ID = blood.b_ID
                    AND   donor.d_ID = blood_test.d_ID
                    ");
    $donor_detail->execute();

    while($row=$donor_detail->fetch()){

?>



        <!--start hospital info-->
        <section class="all_info">
            <div class="doners_info div-all-together">
                <div class="_info col-sm-6 col-md-4">
                    <form>


                        <div class="hide_div"><span>Name: </span><span><?php echo $row['fullname'] ?></span></div>
                        <div class="hide_div"><span>E-mail: </span><span><?php echo $row['email'] ?></span></div>

                        <div class="hide_div"><span>Age: </span><span>
                    <?php
                        if($row['age']==0){
                            echo "no";
                        }else{
                        echo $row['age'];
                        }
                    ?>
                </span></div>

                        <div class="hide_div"><span>Gender: </span><span>

                    <?php
                        if($row['gender']==''){
                            echo "no";
                        }else{
                            echo $row['gender'];
                        }
                    ?>


                    </span></div>

                        <div class="hide_div"><span>Phone: </span><span><?php echo $row['phone'] ?></span></div>
                        <div class="hide_div"><span>City: </span><span><?php echo $row['name'] ?></span></div>
                        <div class="hide_div"><span>Blood: </span><span><?php echo $row['type'] ?></span></div>
                        <div class="hide_div"><span>Date: </span><span><?php echo $row['time'] ?></span></div>
                        <div class="show_div"><span>Description: </span>
                            <p>
                                <?php echo $row['description'] ?>
                            </p>
                        </div>
                        <div><i class="fa fa-tint fa-5x color " style="color: #D83841"></i></div>
                        <a href="manage.php?page=choose&do=<?php echo $row['bt_ID']; ?>&d_ID=<?php echo $row['d_ID']; ?>" class="btn btn-danger button_info" role="button">Choose</a>
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                        <span class="four"></span>
                    </form>
                </div>
            </div>
        </section>

        <!--end hospital info-->




        <?php
    }
    include $temp_path.'footer.php';

}else{
    header('Location:../index.php');
}


?>
