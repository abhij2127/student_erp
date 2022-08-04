<?php


session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

else{
	if($_SESSION["login"]=="student"){
		if($_SESSION["status"]=="Pending"){
			header("location: applicant.php");
		}
		else if($_SESSION["status"]=="Enrolled"){
			header("location: student.php");
		}
	}
	else if($_SESSION["login"]=="admin"){
		header("location: ./backend/adminpanel.php");
	}
}


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['login']);
    header("location: login.php");
}

?>
