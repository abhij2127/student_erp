<?php

$serverName = 'localhost';
$username = 'root';
$db = 'student_erp';
$password = '';
$studentTable = `students`;
$applicantTable = `temp_students`;

try{
  $pdo = new PDO("mysql:host=$serverName;dbname=$db",$username,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}


 ?>
