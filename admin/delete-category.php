<?php
    // include('C:/xampp/htdocs/swiggy/config/constants.php');
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id=$_GET['id'];

        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            //image is available
            $path="../images/category/".$image_name;
            $remove=unlink($path);

            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'>Failed to Remove Image.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }
        
        $sql="DELETE FROM tbl_category WHERE id=$id";

        $res =mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            //admin deleted successfully
            $_SESSION['deleted']="<div class='success'>Cateogry deleted successfully.</div>";

            header('location:'.SITEURL.'admin/manage-category.php');

        }
        else
        {
            //couldn't delete admin
            $_SESSION['deleted']="<div class='error'>Couldn't delete category.</div>";

            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
        
    }
?>