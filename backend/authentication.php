<?php
$i = "<abc>";
echo $i."\n";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$i = test_input($i);
echo $i;
 ?>
