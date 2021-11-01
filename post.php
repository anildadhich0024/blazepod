<?php

include('db.php');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$record = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE email_address = '".$_POST['email_address']."' AND pod_name = '".base64_decode($_POST['pod_name'])."'"));
if(empty($record))
{
  $sql = mysqli_query($con, "INSERT INTO user_submissions (full_name, email_address, total_points, positive_points, neg_points, final_score, pod_name, last_click_time)
  VALUES ('".$_POST['full_name']."', '".$_POST['email_address']."', '".base64_decode($_POST['total_points'])."', '".base64_decode($_POST['positive_points'])."', '".base64_decode($_POST['neg_points'])."', '".base64_decode($_POST['final_point'])."', '".base64_decode($_POST['pod_name'])."', '".base64_decode($_POST['last_click_time'])."')");
}
else
{
  if(base64_decode($_POST['final_point']) > $record['final_score'])
  {
    $sql = mysqli_query($con, "UPDATE user_submissions set total_points = '".base64_decode($_POST['total_points'])."', positive_points = '".base64_decode($_POST['positive_points'])."', neg_points = '".base64_decode($_POST['neg_points'])."', final_score = '".base64_decode($_POST['final_point'])."', last_click_time = '".base64_decode($_POST['last_click_time'])."' WHERE user_id = '".$record['user_id']."'");
  }
  if(base64_decode($_POST['final_point']) == $record['final_score'])
  {
    if(strtotime(base64_decode($_POST['last_click_time'])) < strtotime($record['last_click_time']))
    {
      $sql = mysqli_query($con, "UPDATE user_submissions set total_points = '".base64_decode($_POST['total_points'])."', positive_points = '".base64_decode($_POST['positive_points'])."', neg_points = '".base64_decode($_POST['neg_points'])."', final_score = '".base64_decode($_POST['final_point'])."', last_click_time = '".base64_decode($_POST['last_click_time'])."' WHERE user_id = '".$record['user_id']."'");
    }
  }
}
echo '<script>window.location.href= "leaderboard.php"</script>';

?>