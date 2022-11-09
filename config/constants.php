<?php   

    //start the session
    session_start();

    //create constant for non-reapeating values
    define('SITEURL','http://localhost/swiggy/');
    define('LOCALHOST','localhost:3307');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');

    $conn=mysqli_connect(LOCALHOST,'root','') or die(mysqli_error());//database connection

    $db_select=mysqli_select_db($conn,'food-order')or die(mysqli_error());//selecting database
    
?>