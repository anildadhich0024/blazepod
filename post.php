<?php

$con = new mysqli('localhost', 'root', '', 'ballgame');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$username = $_POST['username'];
$useremail = $_POST['useremail'];
$userphone = $_POST['userphone'];

$sql = "INSERT INTO user_submissions (name, email, phone_number)
VALUES ('".$username."', '".$useremail."', '".$userphone."')";

if (mysqli_query($con, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
} 

?>