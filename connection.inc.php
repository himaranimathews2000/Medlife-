<?php
session_start();
$con=mysqli_connect("localhost","root","","medlife");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/MY PROJECT/');
define('SITE_PATH','http://localhost:81/MY PROJECT/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>