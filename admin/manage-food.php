<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">

        <h1>Manage Food</h1>
        <br>
        <?php
          if(isset($_SESSION['food-add']))
          {
              echo $_SESSION['food-add'];
              unset($_SESSION['food-add']);
          }
          if(isset($_SESSION['food-update']))
          {
              echo $_SESSION['food-update'];
              unset($_SESSION['food-update']);
          }
          if(isset($_SESSION['deleted']))
          {
              echo $_SESSION['deleted'];
              unset($_SESSION['deleted']);
          }
          if(isset($_SESSION['upload']))
          {
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
          }

          if(isset($_SESSION['remove']))
          {
              echo $_SESSION['remove'];
              unset($_SESSION['remove']);
          }
        ?>
        <br>

<!--button to add admin-->
<a href="<?php echo SITEURL;?>admin/add-food.php"class="btn-primary">Add Food</a>
<br>
<br>
        <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>   
                <?php

                    $sql="SELECT * FROM tbl_food";

                    $res=mysqli_query($conn,$sql);

            
                        $count=mysqli_num_rows($res);

                        if($count>0)
                        {
                            $sn=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $title=$row['title'];
                                $price=$row['price'];
                                $image_name=$row['image_name'];
                                $featured=$row['featured'];
                                $active=$row['active'];
  
                                ?>
  
                                <tr>
                                    <td><?php echo $sn++;?>.</td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $price ?></td>
                                    <td><?php
                                    //check whether image name is available or not
                                    if($image_name!="")
                                        {
                                            //display the image 
                                            ?>
  
                                            <img src="<?php echo SITEURL.'images/food/'.$image_name?>" width="100px"> 
  
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
                                          <td><a href="<?php echo SITEURL."admin/update-food.php?id= $id"?>" class="btn-secondary">Update Food</a>
                                          <a href="<?php echo SITEURL."admin/delete-food.php?id= $id &image_name=$image_name"?>" class="btn-danger">Delete Food</a>
                                      </tr>
  
                                      <?php
                            }
                        }
                        else
                        {
                            //database is empty
                            ?>
                                <tr>
                                   <td colspan="8"><div class="error">No Food Added.</div></td>
                                </tr>
                            <?php
                        }
                    
                    
                ?>
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>