<?php
require("connection.inc.php");
require("function.inc.php");
if(isset($_SESSION['ADMIN_LOGIN']) && ($_SESSION['ADMIN_LOGIN'])!=''){
    
}
else{
 header('location:login.php');
        die();   
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav" style="color:black;">
                  <li class="menu-title" style="background-color:#ffbdf4;"><a href="category.php" style="color:black;">Menu</a></li>
                  <li class="menu-item-has-children dropdown"  >
                     <a href="category.php" style="color:black;"> Category</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="product.php" style="color:black;"> Products</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="users.php" style="color:black;"> Users</a>
                  </li>
                    <li class="menu-item-has-children dropdown">
                     <a href="#" style="color:black;"> Orders</a>
                  </li>
                    <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" style="color:black;"> Contact</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header" style="background-color:black;">
            <div class="top-left">
               <div class="navbar-header" style="background-color:black;">
                  <a class="navbar-brand" href="index.html" style="color:rgba(255, 189, 244,1);width:100px"><i class="fa fa-medkit" aria-hidden="true" style="font-size: 30px"></i>&nbsp;<span style="font-family: Century;">MEDLIFE</span></a>&nbsp;
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffbdf4;" onMouseOver="this.style.color='grey'" onMouseOut="this.style.color='#ffbdf4'" >Welcome Admin</a>
                     <div class="user-menu dropdown-menu"  style="background-color:black;color:#ffbdf4;">
                        <a class="nav-link" href="logout.php"  style="color:#ffbdf4;"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>