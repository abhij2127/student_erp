<?php include('./backend/server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login</title>
	<link rel = "stylesheet" type="text/css" href="./styles/home.css" />
	<link rel="stylesheet" type="text/css" href="./styles/login.css" />
	<link rel="stylesheet" type="text/css" href="./styles/responsive.css" />
	<link rel="stylesheet" type="text/css" href="./styles/formstyle.css" />
  </head>
  <body>
   <!--- <a href="./adminlogin.php"> <li>Admin Login</li> </a>
    <a href="./studentlogin.php"> <li>Student Login</li> </a>
    <a href="./admission.php"> <li>AdmissionApply</li> </a>-->
	<div class="header">
	<div class="brand">Student ERP</div>
	<div class="loginsign"><img src = "./Resources/icons/2x/outline_login_white_24dp.png" /></div>
	</div>
	<div class="formcontainer">
	<div class="credform">
    <form class="cred" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
		<?php include('./backend/error.php');?>
      <input type="text" name="Phno" value="" placeholder="Phone no." required />
      <input type="password" name="password" value="" placeholder="Password" required />
      <input type="submit" name="student_login" value="Login" />

    </form>
	</div>
	</div>
  </body>
</html>