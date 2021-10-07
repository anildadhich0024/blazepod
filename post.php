<?php

$con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$sql = "INSERT INTO user_submissions (full_name, email_address, mobile_number, final_score, pod_name)
VALUES ('".$_POST['full_name']."', '".$_POST['email_address']."', '".$_POST['mobile_number']."', '".$_POST['final_score']."', '".$_POST['pod_name']."')";

if (mysqli_query($con, $sql)) {
  echo '<script>window.location.href= "https://www.google.com"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
} 

?>