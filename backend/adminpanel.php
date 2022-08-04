<?php include("./connection.php");?>
<?php 

if(isset($_POST['del_cand'])){
	$s_id = $_POST['sid'];
	$query = "DELETE FROM `temp_student` WHERE sid=$s_id";
}

?>
<?php session_start() ?>
<!DOCTYPE html>
<?php
	if(!isset($_SESSION["login"])){
		header("location: login.php");

	}
	$id = $_SESSION["id"];
  ?>
<html lang="en" dir="ltr">
  <head>
  
    <meta charset="utf-8">
    <title>Admin</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../styles/admin.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
		
		$(document).ready( function () {
			$('#studentTable').DataTable();
		} );
		
		$(document).ready( function () {
			$('#courseTable').DataTable();
		} );
	</script>
	
  </head>
  <body>
	<div class="sdbr">
		<div class="hdad">Admin Panel</div>
		<div class="evryels" >
			<li id="applicantBtn" class="sdbarCont activeSdbar"><img src = "../Resources/icons/1x/outline_manage_accounts_white_24dp.png" />Applicants</li>
			<li id="studentBtn" class="sdbarCont"><img src = "../Resources/icons/1x/outline_people_alt_white_24dp.png" />Students</li>
			<li id="courseBtn" class="sdbarCont"><img src = "../Resources/icons/1x/outline_import_contacts_white_24dp.png" />Courses</li>
		</div>
	</div>
	
	<div class="myhdr">
		<div class="myBrand">
			Student ERP
		</div>
		<div class="lgout">
			<a href="./logout.php" id="logout">Sign Out</a>
		</div>

	</div>
	<div class="mcont">
  
	<div class = "cont" id="contents">
	<div class="applicants" id="applicants">
	<h2>Applicants</h2>
	<table class='table compact' id="myTable"> <thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phno.</th><th scope='col'>Email</th><th scope='col'>Course</th><th scope='col'>Actions</th></th></tr></thead>
	<tbody><?php
		$allpending = $pdo->query("SELECT * FROM `temp_student`");
		if($allpending->rowCount()==0){
			echo "<div class='nap'>No applications right now</div>";
		}
		else{
			
			foreach($allpending->fetchAll() as $p){
				$sid = $p['sid'];
				$courses = $pdo->query("SELECT * FROM `course`");
				echo "<tr><td>".$p['sid']."</td>"."<td>".$p['Name']."</td>"."<td>".$p['Phno']."</td>"."<td>".$p['email']."</td>";
				echo "<td>";
				foreach($courses->fetchAll() as $course){
					if($course['CID']==$p['CID']){
						echo $course['CNAME']."</td>";
					}
				}
				echo "<td><button class='reject' id=$sid>Reject</button><button class='accept'>Accept</button></td></tr>";
			}
		}
		?>
	</tbody>
	</table>
  </div>
  
  <div class="students" id="students">
	<h2>Students</h2>
	<table class='table compact' id="studentTable"> <thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phno.</th><th scope='col'>Email</th><th scope='col'>Course</th></tr></thead>
	<tbody><?php
		$allpending = $pdo->query("SELECT * FROM `students`");
		if($allpending->rowCount()==0){
			echo "<div class='nap'>No applications right now</div>";
		}
		else{
			
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
		}
		?>
	</tbody>
	</table>
  </div>
  
  <div class="courses" id = "courses">
	<h2>Courses</h2>
	<table class='table compact' id="courseTable"> <thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phno.</th><th scope='col'>Email</th><th scope='col'>Course</th></tr></thead>
	<tbody><?php
		$allpending = $pdo->query("SELECT * FROM `temp_student`");
		if($allpending->rowCount()==0){
			echo "<div class='nap'>No applications right now</div>";
		}
		else{
			
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
		}
		?>
	</tbody>
	</table>
  </div>
  
  
	</div>
	</div>


	
	<form id="del" style="display:none" action="<?php echo $_SERVER['PHP_SELF'] ?> " method="post">
	<input type="hidden" value="" name="sid">
	<input type="submit" name="del_cand">
	</form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../scripts/admin.js"></script>
	
	
	<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	
  </body>
</html>
