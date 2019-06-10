<?php
    $pageName = 'manage page';
    include 'init.php';

    if(isset($_SESSION['username'])){


?>


    <!--Control Code--------------------------------------------------------------------->
    <section class="admin-section">
        <div class="parent-admin">
            <div class="admin-header">
                <h1 class="manage-members">Manage Members</h1>
                <i class="fa fa-cog" aria-hidden="true"></i>

            </div>



            <div class="admin-tables">
                <div class="tabs-admin">
                    <ul id="my-tabs-admin">
                        <li class="tab-admin" id="tab1-message">Message</li>
                        <li class="tab-admin" id="tab2-donor">Donor</li>
                        <li class="tab-admin" id="tab3-institution" class="inactive3">Institution</li>
                        <li class="tab-admin" id="tab4-test">donorTest</li>
                    </ul>
                </div>



                <!-- message form content start -->
                <div class="admin-table" id="tab1-message-content3">
                    <table>
                        <tr class="table-header">
                            <td>ID</td?>
                            <td>Name</td>
                            <td>E-mail</td>
                            <td>Phone</td>
                            <td>Message</td>
                            <td>Date</td>
                            <td>Control</td>
                        </tr>
                            <?php

                                $stmt_mes=$con->prepare("SELECT* FROM message");
                                $stmt_mes->execute();
                                while($row=$stmt_mes->fetch()){?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo $row['creation']; ?></td>
                                    <td><a href="edit_content.php?do=mes_edit&mes_ID=<?php echo $row['ID']; ?>" class="edit-button-admin"  >Edit</a> <a href="edit_content.php?do=mes_delete&mes_ID=<?php echo $row['ID']; ?>"  class="delete-button-admin">Delete</a></td>
                                </tr>
                                    <?php } ?>
                    </table>
                </div>
                 <!-- message form content end -->

                 <!-- donor form content start -->
                <div class="admin-table tables-disappear" id="tab2-donor-content3">
                    <table>
                        <tr class="table-header">
                            <td>ID</td>
                            <td>UserName</td>
                            <td>E-mail</td>
                            <td>Gender</td>
                            <td>Phone</td>
                            <td>City</td>
                            <td>Control</td>
                        </tr>
                            <?php

                                $stmt_don=$con->prepare("SELECT donor.*,city.name FROM donor,city WHERE city.city_ID = donor.city_ID AND group_ID!=1");
                                $stmt_don->execute();
                                while($row=$stmt_don->fetch()){
                            ?>
                                <tr>
                                    <td><?php echo $row['d_ID']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>
                                    <a href="edit_content.php?do=don_edit&don_ID=<?php echo $row['d_ID']; ?>"class="edit-button-admin">Edit</a>
                                    <a href="edit_content.php?do=don_del&don_ID=<?php echo $row['d_ID']; ?>" class="delete-button-admin">Delete</a>

                                    <?php if($row['reg_Type']==0){ ?>
                                    <a href="edit_content.php?do=don_activate&don_ID=<?php echo $row['d_ID']; ?>" class="activate-button-admin">Activate</a>
                                    <?php } ?>
                                    </td>

                                </tr>
                        <?php } ?>
                    </table>
                </div>
                 <!-- donor form content end -->

                 <!-- institution form content start -->
                <div class="admin-table tables-disappear" id="tab3-institution-content3">
                    <table>
                        <tr class="table-header">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Hotline</td>
                            <td>Account-Name</td>
                            <td>Email</td>
                            <td>City</td>
                            <td>Date</td>
                            <td>Control</td>
                        </tr>
                            <?php

                                $stmt_don=$con->prepare("SELECT medical_institution.*, city.name AS city FROM medical_institution,city WHERE medical_institution.city_ID = city.city_ID");
                                $stmt_don->execute();
                                while($row=$stmt_don->fetch()){?>
                                <tr>
                                    <td><?php echo $row['m_ID']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['hotline']; ?></td>
                                    <td><?php echo $row['account_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['creation']; ?></td>
                            <td>
                                <a href="edit_content.php?do=medical_edit&m_ID=<?php echo $row['m_ID']; ?>" class="edit-button-admin">Edit</a>

                                <a href="edit_content.php?do=medical_del&m_ID=<?php echo $row['m_ID']; ?>" class="delete-button-admin">Delete</a>


                                <?php
                                    if($row['reg_Type']==0){ ?>
                                <a href="edit_content.php?do=medical_activate&m_ID=<?php echo $row['m_ID']; ?>" class="activate-button-admin">Activate</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                 <!-- institution form content end -->
                <div class="admin-table tables-disappear" id="tab4-test-content3">
                    <table>
                        <tr class="table-header">
                            <th>test_ID</th>
                            <th>creation</th>
                            <th>control</th>
                        </tr>
                        <?php
                            $test = $con->prepare("SELECT * FROM blood_test");
                            $test->execute();
                            while ($row = $test->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $row['bt_ID'] ?></td>
                            <td><?php echo $row['time'] ?></td>
                            <td><a href="edit_content.php?do=test_del&bt_ID=<?php echo $row['bt_ID']; ?>" class="delete-button-admin">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <!--End Control Code--------------------------------------------------------------------->


<?php
    }else{
        header('Location:../index.php');
    }
include $temp_path.'footer.php';
?>
