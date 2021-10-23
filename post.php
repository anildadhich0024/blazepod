<?php

$con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$record = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE email_address = '".$_POST['email_address']."' AND pod_name = '".base64_decode($_POST['pod_name'])."'"));
if(empty($record))
{
  $sql = mysqli_query($con, "INSERT INTO user_submissions (full_name, email_address, final_score, pod_name, last_click_time)
  VALUES ('".$_POST['full_name']."', '".$_POST['email_address']."', '".base64_decode($_POST['final_score'])."', '".base64_decode($_POST['pod_name'])."', '".base64_decode($_POST['last_click_time'])."')");
}
else
{
  if(base64_decode($_POST['final_score']) > $record['final_score'])
  {
    $sql = mysqli_query($con, "UPDATE user_submissions set final_score = '".base64_decode($_POST['final_score'])."', last_click_time = '".base64_decode($_POST['last_click_time'])."' WHERE user_id = '".$record['user_id']."'");
  }
}
echo '<script>window.location.href= "index.php"</script>';

?>