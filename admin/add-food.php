<?php include('partials/menu.php');

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>
        <?php
        if(isset($_SESSION['food-add']))
        {
            echo $_SESSION['food-add'];
            unset($_SESSION['food-add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br>
        <form action=""method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text"name="title" placeholder="Enter Title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"placeholder="Description of the food...."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" ></td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file"name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><select name="category" >
                        <?php
                            //create php code to display categories from database
                            //create sql to get all active categories from database
                            $sql2="SELECT * FROM tbl_category WHERE active='Yes'";

                            $res2=mysqli_query($conn,$sql2);
                            if($res2==TRUE)
                            {
                                $count=mysqli_num_rows($res2);
                                
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res2))
                                    {
                                        //get the details of categories
                                        $id=$row['id'];
                                        $title=$row['title'];
                                        ?>
                                            <option value="<?php echo $id;?>" name="category"><?php echo $title;?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <option value="10">No Category Found.</option>
                                    <?php
                                }
                            }
                        ?>
                      
                    </select></td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio"name="featured"value="Yes">Yes
                        <input type="radio"name="featured"value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio"name="active"value="Yes">Yes
                        <input type="radio"name="active"value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn-primary" type="submit" name="submit" value="Add Food">
                    </td>
                </tr>
        </table>            
        </form>
    </div>
</div>

<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['submit']))
    {
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];

        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
        }
        else
        {
            $active="No";
        }

        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];
        }
        else
        {
            $featured="No";
        }

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

            $image_name="Food_Item_".rand(000,999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];

            $destination_path="../images/food/".$image_name;

            //upload image
            $upload=move_uploaded_file($source_path,$destination_path);

            //checck whether the image is uploaded or not
            //if image is not uploaded then we will stop the process and redirect with error message
            if($upload==false)
            {
                $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";

                header('location:'.SITEURL.'admin/add-food.php');

                die();
            }
          }

        }
        else
        {
            //dont up;oad image and set the image name value as blank
            $image_name="blank";
        }

        $sql="INSERT INTO tbl_food SET
        title='$title',
        description='$description',
        price=$price,
        image_name='$image_name',
        category_id=$category,
        featured='$featured',
        active='$active'";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
           
            //category added successfully
            $_SESSION['food-add']="<div class='success'>Food Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //category adding failed
            $_SESSION['food-add']="<div class='error'>Failed to Add Food.</div>";
            header('location:'.SITEURL.'admin/add-food.php');
        }
    }
?>