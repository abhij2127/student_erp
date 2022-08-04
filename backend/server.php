<?php


session_start();

include ('connection.php');

$username = "";
$email = "";
$errors = array();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//admission server

if (isset($_POST['admission'])) {


	$username = test_input($_POST['name']);
	$email = test_input($_POST['email']);
  $phno = test_input($_POST['Phno']);
	$password_1 = test_input($_POST['password_1']);
	$password_2 = test_input($_POST['password_2']);
	$course = $_POST['course'];


	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if (empty($phno)||strlen($phno)!=10){array_push($errors, "Not valid mobile number");}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");

	}
	$alreadyExist = $pdo->query("SELECT * FROM `students` WHERE `Phno`=$phno");
	if($alreadyExist->rowCount()!=0){
		array_push($errors, "Account already exists");
	}else{
		$alreadyExist = $pdo->query("SELECT * FROM `temp_student` WHERE `Phno`=$phno");
		if($alreadyExist->rowCount()!=0){
			array_push($errors, "Already Applied");
		}
	}

	if (count($errors)==0){

		$password = password_hash($password_1,PASSWORD_DEFAULT);

    $params = array(':name'=>$username,':phno'=>$phno,':password'=>$password,':email'=>$email,':course'=>$course);
    $result = $pdo->prepare("INSERT INTO `temp_student` VALUES('', :name, :phno, :password, :email, :course)");
		$result = $result->execute($params);


		

		
    

		header('location: ./backend/confirmation.php');
	}
}

//student login server 

if (isset($_POST['student_login'])) {


  $phno = test_input($_POST['Phno']);
  $password = test_input($_POST['password']);


	if (empty($phno)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}


	if (count($errors) == 0) {


		
    $params = array(':phno'=>$phno,':password'=>$password);
		$results = $pdo->query("SELECT * FROM `students` WHERE `Phno`=$phno");
		if ($results->rowCount()==0){
			$status = "Pending";
			$results = $pdo->query("SELECT * FROM `temp_student` WHERE `Phno`=$phno");
		}else{
			$status = "Enrolled";
		}
		
		
		if ($results->rowCount()==1) {

			$row = $results->fetch();
		    $id = $row["sid"];
			$hash_password = $row["Password"];
			if(password_verify($password,$hash_password)){
				session_start();
				$_SESSION["login"] = "student";
				$_SESSION["id"] = $id;
				$_SESSION["password"]=$hash_password;
				$_SESSION["status"] = $status;
				header('location: index.php');
				
			}
			else{
				array_push($errors,"Invalid username or password");
			}


			
		}
		else {

			array_push($errors, "No Such User Exists");
		}
	}
}

//admin login server

if (isset($_POST['admin_login'])){
	
	$loginname = test_input($_POST['userid']);
	$password = test_input($_POST['password']);
	$result = $pdo->query("SELECT * FROM `admins`");
	$f=0;
	$errors = array();
	foreach($result->fetchAll() as $r){
		if($r["username"]==$loginname){
			$f = 1;
			if($r["password"]=$password){
				$_SESSION["login"] = "admin";
			$_SESSION["id"] = $loginname;
			$_SESSION["password"] = $password;
			header('location: ./backend/adminpanel.php');
			}
			else{
				$errors[] = "Wrong Password";
			}
		}
	}

  if($f=0){
	 $errors[] = "Wrong Username";
  }

}

?>
