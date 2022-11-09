<?php include('partials/menu.php');

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="SELECT * FROM tbl_category WHERE id=$id";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);

        $title=$row['title'];
        $current_image=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];
    }
    else
    {
        $_SESSION['no-category-found']="<div class='error'>Category Not Found</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
        
    }
}
else
{
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>


<div class="main-menu">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br>
        <br>
        <form action=""method="POST"enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if($current_image!="")
                        {
                            //display the image 
                            ?>
                            <img src="<?php echo SITEURL.'images/category/'.$current_image?>" width="100px"> 

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

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=='Yes') {echo "checked";}?> type="radio"name="featured"value="Yes">Yes
                        <input <?php if($featured=='No') {echo "checked";}?> type="radio"name="featured"value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($featured=='Yes') {echo "checked";}?> type="radio"name="active"value="Yes">Yes
                        <input <?php if($featured=='No' ) {echo "checked";}?> type="radio" name="active"value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image"value="<?php echo $current_image;?>">
                        <input type="hidden"name="id"value="<?php echo $id;?>">
                        <input class="btn-primary" type="submit" name="submit" value="Update Category">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $title=$_POST['title'];
                $current_image=$_POST['current_image'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                
                //1.updating new image if selected
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

                        $image_name="Food_Category_".rand(000,999).'.'.$ext;

                        $source_path=$_FILES['image']['tmp_name'];

                        $destination_path="../images/category/".$image_name;

                        //upload image
                        $upload=move_uploaded_file($source_path,$destination_path);

                        //checck whether the image is uploaded or not
                        //if image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";

                            header('location:'.SITEURL.'admin/manage-category.php');

                            die();
                        }

                        //remove current image
                        if($current_image!="")
                        {
                            $remove_path="../images/category/".$current_image;
                            $remove=unlink($remove_path);
    
                            if($remove==false)
                            {
                                $_SESSION['remove']="<div class='error'>Failed to Remove Image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die();
                            }
                        }
                    } 
                }
                else
                {
                    $image_name=$current_image;
                }

                //2.Update the database
                $sql2="UPDATE tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                WHERE id=$id
                ";

                $res2=mysqli_query($conn,$sql2);

                //3/Redirect to manage category page
                if($res2==true)
                {
                    //category updated successfully
                    $_SESSION['cat-update']="<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //category update failed
                    $_SESSION['cat-update']="<div 
                    class='success'>Category Update Failed.</div>";
                    header('location:'.SITEURL.'admin/
                    manage-category.php');
                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>