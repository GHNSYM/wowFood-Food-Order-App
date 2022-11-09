<?php 

    include('../config/constants.php');
    include('login-check.php');
?>
<html>
    <head>
        <title>Food order website - Home page</title>
        <link rel="stylesheet" href="../CSS/admin.css">
    </head>
    <body>
        <!--menu section starts here-->
        <div class="menu">
            <div class="wrapper text-center">
               <ul>
                   <li><a href="index.php">Home</a></li>
                   <li><a href="manage-admin.php">Admin Manager</a></li>
                   <li><a href="manage-category.php">Category</a></li>
                   <li>
                       <a href="manage-food.php">Food</a>
                   </li>
                   <li><a href="manage-order.php">Order</a></li>
                   <li><a href="logout.php">Logout</a></li>
               </ul>
            
            </div>
        </div>
        <!--menu section ends here-->