<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!--Important to make website responsive-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restraunt website</title>
    <link rel="stylesheet" href="CSS/style.css" />
  </head>
  <body>
    <!--navbar section starts here-->
    <section class="navbar">
      <div class="container">
        <div class="logo">
          <img
            src="images/logo.png"
            alt="Restaurant logo"
            class="image-responsive"
          />
        </div>

        <div class="menu text-right">
          <ul>
            <li>
              <a href="<?php echo SITEURL;?>">Home</a>
            </li>
            <li>
              <a href="<?php echo SITEURL.'about.php';?>">About</a>
            </li>
            <li>
              <a href="<?php echo SITEURL;?>foods.php">Foods</a>
            </li>
            <li>
              <a href="<?php echo SITEURL;?>">Contacts</a>
            </li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
    <!--navbar section ends here-->