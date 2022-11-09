<?php include('partials/menu.php');?>

        <!--main content section starts here-->
        <div class="main-content">
            <div class="wrapper ">
               <h1>Manage Admin</h1>
               <br>
               <br>

               <!--button to add admin-->
               <a href="add-admin.php"class="btn-primary">Add Admin</a>
               <br>
               <br>

               <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['deleted']))
                    {
                        echo $_SESSION['deleted'];
                        unset($_SESSION['deleted']);
                    }
                    if(isset($_SESSION['delete_fail']))
                    {
                        echo $_SESSION['delete_fail'];
                        unset($_SESSION['delete_fail']);
                    }
                    if(isset($_SESSION['updated']))
                    {
                        echo $_SESSION['updated'];
                        unset($_SESSION['updated']);
                    }
                    if(isset($_SESSION['pass_changed']))
                    {
                        echo $_SESSION['pass_changed'];
                        unset($_SESSION['pass_changed']);
                    }
                    if(isset($_SESSION['user_not_found']))
                    {
                        echo $_SESSION['user_not_found'];
                        unset($_SESSION['user_not_found']);
                    }
                    if(isset($_SESSION['pass_changed']))
                    {
                        echo $_SESSION['pass_changed'];
                        unset($_SESSION['pass_changed']);
                    }
                    if(isset($_SESSION['pass_change_fail']))
                    {
                        echo $_SESSION['pass_change_fail'];
                        unset($_SESSION['pass_change_fail']);
                    }
                  
               ?>
               <br>

               <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>   
                <?php
                    $sql="SELECT * FROM tbl_admin ";
                    $res=mysqli_query($conn,$sql);
                    if($res==TRUE)
                    {
                        //count rows
                        $count=mysqli_num_rows($res);//function to count the no of rows in database
                        if($count>0)
                        {
                            //we have data in database
                            $ss=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get individual data
                                $id=$row['id'];
                                $full_name=$row['full_name'];
                                $username=$row['username'];

                                //display the data in table
                                ?>
                                <tr>
                                    <td><?php echo $ss++?>.</td>
                                    <td><?php echo $full_name?></td>
                                    <td><?php echo $username?></td>
                                    <td>
                                        <a href="<?php echo SITEURL."admin/change-password.php?id= $id"?>"class= "btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL."admin/update-admin.php?id= $id"?>"class= "btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL."admin/delete-admin.php?id= $id";?>"class= "btn-danger" > Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //database is empty
                        }
                    }
                ?>
               </table>
            </div>
        </div>
        <!--main content section ends here-->

<?php include('partials/footer.php')?>  