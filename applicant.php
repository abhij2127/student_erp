<?php include("./backend/connection.php");?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <h1>Student Details</h1>
  <?php 
	if(!isset($_SESSION["login"])){
		header("location: login.php");
		
	}
	$id = $_SESSION["id"];
  ?>
  
  <?php 
		$details = $pdo->query("SELECT * FROM `temp_student` WHERE `sid`=$id");
		if($details->rowCount()==0){
			echo "Oops omething went wrong";
		}
		else{
				
				$d = $details->fetch();
				echo "<li>name : ".$d["Name"]."</li>";
				echo "<li>Id : ".$d["sid"]."</li>";
				echo "<li>Phno : ".$d["Phno"]."</li>";
				echo "<li>email : ".$d["email"]."</li>";
				echo "<li>status : "."Pending"."</li>";
			
		}
  ?>
  <br />
  <center><a href = "./backend/logout.php">Logout</a></center>

  </body>
</html>
