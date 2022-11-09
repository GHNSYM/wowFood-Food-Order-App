<?php include('partials/menu.php');

    if($_GET['id'])
    {
        $id=$_GET['id'];

        $sql="SELECT * FROM tbl_admin WHERE id=$id";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            $row= mysqli_fetch_assoc($res);

            $full_name=$row['full_name'];
            $username=$row['username'];
            
        }
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br>
        <?php
            if(isset($_SESSION['update_fail']))
            {
                echo $_SESSION['update-fail'];

                unset($_SESSION['update-fail']);
            }
        ?>
        <br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text"name="full_name" value="<?php echo $full_name;?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text"name="username" value="<?php echo $username;?>">
                    </td>
                   
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit"value="UPDATE" class="btn-secondary">
                        </td>
                    </tr>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['submit']))
    {
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $sql2="UPDATE tbl_admin SET full_name='$full_name',
        username='$username',
        password='$password'
        WHERE id=$id";

        $res2=mysqli_query($conn,$sql2);

        if($res==TRUE)
        {
            $_SESSION['updated']="Admin Updated Successfully.";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update_fail']="Update Unsuccessfull.";
            header('location:'.SITEURL.'admin/update-admin.php');

        }

    }
?>