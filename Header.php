<!DOCTYPE html>
<html>
  <head>
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet"/>
        <link href="css/Styles.css" rel="stylesheet" />
      <meta charset="utf-8" />
      <title><?php echo $Title; ?></title>
      <?php session_start(); ?>
  </head>
  <body>
      <div id="Wrapper">
    <div id="Header">
        <div id="LogoDIV">  
        <a id="LogoA" href="index.php"><img src="Images/logo.png" id="Logo" alt="Logo" />
            <p id="WebSiteName">Admin Panel</p>
            </a>
            
            </div>
            <div id="Nav">
            <ul>
                <li class="li"><a href= "index.php" class="HeaderA">Panel</a></li>
                <li class="li"> <a href= "Login.php" class="HeaderA">Login</a></li>
				<li class="li"> <a href= "AddCart.php" class="HeaderA">Add Cart</a></li>
				<?php if(isset($_SESSION['login_user']) and $_SESSION['login_user']=="Admin"){ ?>
				<li class="li"> <a href= "Logout.php" class="HeaderA">Logout</a></li>
				<?php } ?>
            </ul>
            </div>
        <div class="Clear"></div>
        </div>