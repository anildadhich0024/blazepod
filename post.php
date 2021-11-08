<?php

include('db.php');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 

$code_array = array( "1"=>"BF15", "2"=>"CHASE20", "3"=>"GAME25");
$code_key = array_rand($code_array);
$code_name = $code_array[$code_key];
$mail_status = false;

$record = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE email_address = '".$_POST['email_address']."' AND full_name = '".$_POST['full_name']."' AND pod_name = '".base64_decode($_POST['pod_name'])."'"));
if(empty($record))
{
  $mail_status = true;
  $sql = mysqli_query($con, "INSERT INTO user_submissions (full_name, email_address, total_points, positive_points, neg_points, final_score, pod_name, last_click_time, accept_condition, code_name)
  VALUES ('".$_POST['full_name']."', '".$_POST['email_address']."', '".base64_decode($_POST['total_points'])."', '".base64_decode($_POST['positive_points'])."', '".base64_decode($_POST['neg_points'])."', '".base64_decode($_POST['final_point'])."', '".base64_decode($_POST['pod_name'])."', '".base64_decode($_POST['last_click_time'])."', '".$_POST['accept_condition']."', '".$code_name."')");
}
else
{
  if(base64_decode($_POST['final_point']) > $record['final_score'])
  {
    $mail_status = true;
    $sql = mysqli_query($con, "UPDATE user_submissions set total_points = '".base64_decode($_POST['total_points'])."', positive_points = '".base64_decode($_POST['positive_points'])."', neg_points = '".base64_decode($_POST['neg_points'])."', final_score = '".base64_decode($_POST['final_point'])."', last_click_time = '".base64_decode($_POST['last_click_time'])."', code_name = '".$code_name."', accept_condition = '".$_POST['accept_condition']."' WHERE user_id = '".$record['user_id']."'");
  }
  if(base64_decode($_POST['final_point']) == $record['final_score'])
  {
    if(strtotime(base64_decode($_POST['last_click_time'])) < strtotime($record['last_click_time']))
    {
      $mail_status = true;
      $sql = mysqli_query($con, "UPDATE user_submissions set total_points = '".base64_decode($_POST['total_points'])."', positive_points = '".base64_decode($_POST['positive_points'])."', neg_points = '".base64_decode($_POST['neg_points'])."', final_score = '".base64_decode($_POST['final_point'])."', last_click_time = '".base64_decode($_POST['last_click_time'])."', code_name = '".$code_name."', accept_condition = '".$_POST['accept_condition']."' WHERE user_id = '".$record['user_id']."'");
    }
  }
}

$_SESSION["pod_name"] = $_POST['pod_name'];
$_SESSION["code_name"] = base64_encode($code_name);

if($mail_status)
{
  $fields_string = '';
  $url = 'https://mail.topodiumgroup.com/rest/automation/trigger_workflow';
  $fields = array(
      'api_id'                 => 'MoHx_J7cKxV4M5tyaKoM205-9cs.',
      'api_key'                => '7gdcavfGsMwRvf6WuohNMNS4RrocCVcSnwXejcXM8mI.',
      'workflow_api_identifier' => urlencode('BPod/BF2021/trigger_workflow'),
      'email_address'           => urlencode($_POST['email_address']),
      'first_name'              => urlencode($_POST['full_name']),
      'variable_data_1'         => urlencode($code_name),
  );

  //url-ify the data for the POST
  foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
  rtrim($fields_string, '&');

  //open connection
  $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, count($fields));
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  curl_exec($ch);
  curl_close($ch);
  echo '<script>window.location.href= "result"</script>';
}
echo '<script>window.location.href= "index"</script>';

?>