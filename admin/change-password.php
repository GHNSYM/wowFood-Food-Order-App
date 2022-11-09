<?php include('partials/menu.php');

if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br>
       <?php
        
            if(isset($_SESSION['pass_not_match']))
            {
                echo $_SESSION['pass_not_match'];
                unset($_SESSION['pass_not_match']);
            }
        ?>            
        <br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>  

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
            
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
        //1.get the data from form
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        //2.check whether the user with current ID and current password exists or not
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            //check whether data is available or not
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be changed
                
                //3.check whether the new password and confirm password match or not
                if($new_password==$confirm_password)
                {
                    //update the passowrd
                    $sql2="UPDATE tbl_admin SET
                    password='$new_password'
                    WHERE id=$id";

                    //4.change password if all of above is true
                    $res2=mysqli_query($conn,$sql2);

                    if($res2==TRUE)
                    {
                        //password changed successfully
                        $_SESSION['pass_changed']="<div class='success'>Password Changed Successfully.</div>";

                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //password change failed
                        $_SESSION['pass_change_fail']="<div class='error'>Failed to change Password.</div>";

                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //redirect to manage admin page with error message
                    $_SESSION['pass_not_match']="<div class='error'>Password did not match.</div>";
                    header('location:'.SITEURL.'admin/change-password.php');
                }
            }
            else
            {
                    //user does not exist
                    $_SESSION['user_not_found']="<div class='error'>User Not Found. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
            }
            
        } 
    }
?>
<?php include('partials/footer.php');?>s
