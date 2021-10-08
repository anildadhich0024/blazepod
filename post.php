<?php

$con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$time = explode(' : ',base64_decode($_POST['last_click_time']));
$last_second = abs(20 - $time[0]) - 1;
$last_mili_second = abs(60 - $time[1]);


if($last_second == 0 && $last_mili_second == 0) {
  $last_second = 20;
  $last_mili_second = 0;

}

$last_click_time = str_pad($last_second, 2, '0', STR_PAD_LEFT).' : '.str_pad($last_mili_second, 2, '0', STR_PAD_LEFT);
$sql = "INSERT INTO user_submissions (full_name, email_address, mobile_number, final_score, pod_name, last_click_time)
VALUES ('".$_POST['full_name']."', '".$_POST['email_address']."', '".$_POST['mobile_number']."', '".base64_decode($_POST['final_score'])."', '".base64_decode($_POST['pod_name'])."', '".$last_click_time."')";

if (mysqli_query($con, $sql)) {
  echo '<script>window.location.href= "result.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
} 

?>