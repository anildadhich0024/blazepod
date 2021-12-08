<?php

include('db.php');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$record = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM start_game WHERE game_date = '".date('Y-m-d')."' AND pod_name = '".$_GET['pod_name']."' LIMIT 1"));
if(empty($record))
{
  $sql = mysqli_query($con, "INSERT INTO start_game (game_date, pod_name, total_users) VALUES ('".date('Y-m-d')."', '".$_GET['pod_name']."', 1)");
}
else
{
  $total_user = $record['total_users'] + 1;
  $sql = mysqli_query($con, "UPDATE start_game set total_users = '".$total_user."' WHERE game_id = '".$record['game_id']."'");
}

?>