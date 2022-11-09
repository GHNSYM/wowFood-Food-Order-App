<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>
        <?php
            if(isset($_SESSION['fail']))
            {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text"name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text"name="username" placeholder="Username">
                    </td>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password"name="password"placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit"value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php')?>

<?php 
//process the value from form and save it in database
//check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
    //button clicked

    //1.get the data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);//Password encrypted with md5


    //2.SQL query to save the data into database

    $sql="INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    //3.Executing query and saving data into database
    $res=mysqli_query($conn,$sql) or die(mysqli_error());

    //4.chexk whether (Query is executed) data is inserted or not and display appropriate message
    if($res==TRUE)
    {
        //data inserted
        //create a session variable to display message 
        $_SESSION['add']="Admin Added Successfully.";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to insert data
        // echo"failed to insert data";
        $_SESSION['fail']="Failed to add Admin.";
        header("location:".SITEURL.'admin/add-admin.php');
    }

}
?>