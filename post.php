<?php

$con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$sql = "INSERT INTO user_submissions (full_name, email_address, final_score, pod_name, last_click_time)
VALUES ('".$_POST['full_name']."', '".$_POST['email_address']."', '".base64_decode($_POST['final_score'])."', '".base64_decode($_POST['pod_name'])."', '".base64_decode($_POST['last_click_time'])."')";

if (mysqli_query($con, $sql)) {
  echo '<script>window.location.href= "index.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
} 

?>