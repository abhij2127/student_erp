<?php include("./connection.php");?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php 
	if(!isset($_SESSION["login"])){
		header("location: login.php");
		
	}
	$id = $_SESSION["id"];
  ?>
  
  <div><span><?php echo $id;?></span></div>
  <div>
	<h2>Applicants</h2>
	<?php
		$allpending = $pdo->query("SELECT * FROM `temp_student`");
		if($allpending->rowCount()==0){
			echo "No applications right now";
		}
		else{
			echo "<table class='table'> <thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phno.</th><th scope='col'>Email</th></tr></thead>";
			foreach($allpending->fetchAll() as $p){
				$courses = $pdo->query("SELECT * FROM `course`");
				echo "<tr><td>".$p['sid']."</td>"."<td>".$p['Name']."</td>"."<td>".$p['Phno']."</td>"."<td>".$p['email']."</td>";
				echo "<td>";
				foreach($courses->fetchAll() as $course){
					if($course['CID']==$p['CID']){
						echo $course['CNAME']."</td></tr>";
					}
				}
			}
			echo "</table>";
		}
		?>
  </div>
  
  
  <br />
  <center><a href = "./logout.php">Logout</a></center>
	
  </body>
</html>