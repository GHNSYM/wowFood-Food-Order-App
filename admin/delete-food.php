<?php

include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id=$_GET['id'];

        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            //image is available
            $path="../images/food/".$image_name;
            $remove=unlink($path);

            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'>Failed to Remove Image.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }
        
        $sql="DELETE FROM tbl_food WHERE id=$id";

        $res =mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            //admin deleted successfully
            $_SESSION['deleted']="<div class='success'>Food deleted successfully.</div>";

            header('location:'.SITEURL.'admin/manage-food.php');

        }
        else
        {
            //couldn't delete admin
            $_SESSION['deleted']="<div class='error'>Couldn't delete food.</div>";

            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
        
    }
?>