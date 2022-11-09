<?php include('partials/menu.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="SELECT * FROM tbl_food WHERE id=$id";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);

        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
        $current_image=$row['image_name'];
        $current_category=$row['category_id'];
        $featured=$row['featured'];
        $active=$row['active'];
    }
    else
    {
        $_SESSION['no-food-found']="<div class='error'>Food Not Found</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
        
    }
}
else
{
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>

<div class="main-menu">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br>
        <br>
        <form method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text"name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price"value="<?php echo $price;?>" ></td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if($current_image!="")
                        {
                            //display the image 
                            ?>
                            <img src="<?php echo SITEURL.'images/food/'.$current_image?>" width="100px"> 

                            <?php
                            }
                            else
                            {
                                //display the message
                                echo "<div class='error'>No Image Found </div>";
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file"name="image">
                    </td>
                </tr>
                    <td>Category:</td>
                    <td><select name="category">
                    <?php
                            //create php code to display categories from database
                            //create sql to get all active categories from database
                            $sql2="SELECT * FROM tbl_category WHERE active='Yes'";

                            $res2=mysqli_query($conn,$sql2);
                            if($res2==TRUE)
                            {
                                $count2=mysqli_num_rows($res2);
                                
                                if($count2>0)
                                {
                                    while($row2=mysqli_fetch_assoc($res2))
                                    {
                                        //get the details of categories
                                        $category_id=$row2['id'];
                                        $category_title=$row2['title'];
                                        ?>
                                        <option <?php if($current_category==$category_id) {echo "selected";}?> value="<?php echo $category_id;?>" name="category"><?php echo $category_title;?></option>
                                        <?php
                                    }
                                }    
                                else
                                {
                                    
                                    echo "<option value='0'>No Category Found.</option>";
                                    
                                }
                            }
                        ?>
                    </select></td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){ echo 'checked';}?> type="radio"name="featured"value="Yes">Yes
                        <input <?php if($featured=="No"){ echo 'checked';}?>  type="radio"name="featured"value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){ echo 'checked';}?>  type="radio"name="active"value="Yes">Yes
                        <input <?php if($active=="No"){ echo 'checked';}?>  type="radio"name="active"value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn-primary" type="submit" name="submit" value="Update Food">
                    </td>
                </tr>
        </table>            
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];
                $active=$_POST['active'];
                $featured=$_POST['featured'];
   
                //check whether the image is selected or not and set the value for image name accordingly

                if(isset($_FILES['image']['name']))
                {
                    //uplaod the image
                    //to upload image we need image name, source path and destination path
                    $image_name=$_FILES['image']['name'];

                    if($image_name!="")
                    {
                        //auto rename our image
                        //get the extention of our image (jpg,png,gif,ect) like for E.g. "food.jpg"
                        $ext=end(explode('.',$image_name));

                        echo $image_name="Food_Item_".rand(000,999).'.'.$ext;

                        $source_path=$_FILES['image']['tmp_name'];

                        $destination_path="../images/food/".$image_name;

                        //upload image
                        $upload=move_uploaded_file($source_path,$destination_path);

                        //checck whether the image is uploaded or not
                        //if image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";

                            header('location:'.SITEURL.'admin/manage-food.php');

                            die();
                        }

                        if($current_image!="")
                        {
                            //remove current image
                            $remove_path="../images/food/".$current_image;
                            $remove=unlink($remove_path);

                            if($remove==false)
                            {
                                $_SESSION['remove']="<div class='error'>Failed to Remove Image.</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                        }
                    
                    }
                }
                else
                {
                    $image_name=$current_image;
                }

                $sql3="UPDATE tbl_food SET
                title='$title',
                description='$description',
                price=$price,
                image_name='$image_name',
                category_id=$category,
                featured='$featured',
                active='$active'
                WHERE id=$id";

                $res3=mysqli_query($conn,$sql3);

                if($res3==TRUE)
                {
                    //category added successfully
                    $_SESSION['food-update']="<div class='success'>Food Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //category adding failed
                    $_SESSION['food-update']="<div class='error'>Failed to Update Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>