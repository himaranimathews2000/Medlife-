<?php
require("connection.inc.php");
require("function.inc.php");
$msg='';
if(isset($_POST['submit']))
{
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    $sql="select * from admin_users where username='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);

    if($count>0)
    {
        $_SESSION['ADMIN_LOGIN']="yes";
        $_SESSION['ADMIN_USERNAME']=$username;
        header('location:category.php');
        die();
    }else{
        $msg="Please enter correct login details";
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
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
   <body class="bg-dark" >
      <div class="sufee-login d-flex align-content-center flex-wrap" style="background: url(images/Background/b3.jpg); background-size: cover;background-repeat: no-repeat;background-attachment: fixed;">
         <div class="container" >
            <div class="login-content" >
               <div class="login-form mt-150" style="background-color:  rgba(255, 189, 244,0.8);" >
                  <form method="post">
                      <h1 align=center ><div ><i class="fa fa-medkit" aria-hidden="true" style="font-size: 40px"></i>&nbsp;<span style="font-family: Century;font-size: 40px;color: black">MEDLIFE</span><br>
         &nbsp;&nbsp;<span style="font-family: Segoe Script;font-size: 30px;color: black">Giving Your Life A Lift</span></div></h1><br>
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username/email-id" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="background-color:rgba(0,0,0,0.9);">Sign in</button>
					</form>
                   <div style="color:red;margin-top: 15px;"><?php echo $msg;?></div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>