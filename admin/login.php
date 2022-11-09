<?php include('C:\xampp\htdocs\swiggy\config\constants.php');?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../CSS/admin.css">
    </head>
    <body>
        <div class="back">

            <div class="login">
                <br>
            <h1 class="text-center login-text">Login</h1>
            <br>
            <?php
                if(isset($_SESSION['login_fail']))
                {
                    echo $_SESSION['login_fail'];
                    unset($_SESSION['login_fail']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br>
                <!-- login starts here -->
                <form action=""method="POST" class="text-center login-text">
                    Username:
                    <input class="button"type="text" name="username" placeholder="Enter Username"><br><br><br>
                    Password:
                    <input class="button" type="password" name="password" placeholder="Enter Password"><br><br><br>

                    <input class="button" type="submit" name="submit" value="Login">
                </form>
                <!-- login form ends here -->
                <br>
                <!-- <p class="text-center">Created By - <a href="www.ghnsym.com">Ghanshyam</a></p> -->
            </div>
        </div>
    </body>
    </html>

    <?php
    if(isset($_POST['submit']))
    {
        //process for login
        //1. Get the data from login page
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //2.SQL to check whether the username and password exist or not
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3.Execute the query
        $res=mysqli_query($conn,$sql);
   
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                //user available and login success
                $_SESSION['login']="<div class='success'>Login Successfull</div>";

                $_SESSION['user']=$username;//to check whether the user is logged in or not and logout will unset if

                header('location:'.SITEURL.'admin/index.php');
            }
            else
            {
                //user not available and login failed
                $_SESSION['login_fail']="<div class='login-text text-center'>Login Failed.</div>";
                header('location:'.SITEURL.'admin/login.php');
            }
        
    }
    ?>