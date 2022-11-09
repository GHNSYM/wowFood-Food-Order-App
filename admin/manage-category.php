<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
        if(isset($_SESSION['cat-add']))
        {
            echo $_SESSION['cat-add'];
            unset($_SESSION['cat-add']);
        }
        if(isset($_SESSION['cat-update']))
        {
            echo $_SESSION['cat-update'];
            unset($_SESSION['cat-update']);
        }
        if(isset($_SESSION['deleted']))
        {
            echo $_SESSION['deleted'];
            unset($_SESSION['deleted']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['failed_remove']))
        {
            echo $_SESSION['failed_remove'];
            unset($_SESSION['failed_remove']);
        }
        ?>
        <br>
        <!--button to add admin-->
        <a href="<?php echo SITEURL.'admin/add-category.php'?> "class="btn-primary">Add Category</a>
        <br>
        <br>
        <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>   
                    <?php
                        $sql="SELECT * FROM tbl_category";

                        $res=mysqli_query($conn,$sql);

                        if($res==TRUE)
                        {
                            //count rows
                            $count=mysqli_num_rows($res);

                            if($count>0)
                            {
                                $sn=1;
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    $image_name=$row['image_name'];
                                    $featured=$row['featured'];
                                    $active=$row['active'];

                                    ?>

                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $title;?></td>
                                        <td><?php
                                        //check whether image name is available or not
                                        if($image_name!="")
                                        {
                                           //display the image 
                                           ?>

                                           <img src="<?php echo SITEURL.'images/category/'.$image_name?>" width="100px"> 

                                            <?php
                                        }
                                        else
                                        {
                                            //display the message
                                            echo "<div class='error'>No Image Found </div>";
                                        }
                                        ?></td>
                                        <td><?php echo $featured;?></td>
                                        <td><?php echo $active;?></td>
                                        <td><a href="<?php echo SITEURL."admin/update-category.php?id= $id"?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL."admin/delete-category.php?id= $id &image_name=$image_name"?>" class="btn-danger">Delete Category</a>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //database is empty
                                ?>
                                    <tr>
                                        <td colspan="6"><div class="error">No Category Added.</div></td>
                                    </tr>
                                <?php
                            }
                        }

                    ?>
                <tr>
                    
                        
                    </td>
                </tr>
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>
