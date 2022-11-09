<?php
    include('C:/xampp/htdocs/swiggy/config/constants.php');

    if(isset($_GET['id']))
    {
        $admin_id=$_GET['id'];

        $sql="DELETE FROM tbl_admin WHERE id=$admin_id";

        $res =mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            //admin deleted successfully
            $_SESSION['deleted']="Admin deleted successfully.";

            header('location:'.SITEURL.'admin/manage-admin.php');

        }
        else
        {
            //couldn't delete admin
            $_SESSION['delete_fail']="Couldn't delete admin.";

            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>