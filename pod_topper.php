<?php
include('db.php');
$red_chase  = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'RED' ORDER BY score DESC, last_click_time ASC limit 10");  
$blue_chase  = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC limit 10");  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;                                       
$mail->isSMTP();                                            
$mail->Host       = 'smtp.gmail.com';                    
$mail->SMTPAuth   = true;                             
$mail->Username   = 'noreply@blazepoduk.com';                 
$mail->Password   = 'Blazepoduk@123';                        
$mail->SMTPSecure = 'ssl';                              
$mail->Port       = 465;  

$mail->setFrom('noreply@blazepoduk.com', 'BlazePod');  

// RED POD TOPPER EMAIL
if(mysqli_num_rows($red_chase) > 0) {
    $r = 1;
    while($record = $red_chase->fetch_array(MYSQLI_ASSOC))
    {
        $mail->addAddress($record['email_address'], $record['full_name']);
        $mail->isHTML(true);                               
        $mail->Subject = "Congratulations you're in the BlazePod 'Chase The Pod' Top 10";
        $mail->Body    = '<img src="https://stageofproject.com/blazepod/img/blue-team-top-10.jpg" width="1000" height="220" usemap="#Map" border="0" /></br>';
        $mail->Body    .= 'Dear <b>'.$record['full_name'].'</b></br>';
        $mail->Body    .= "<p>Congratulations… you finished yesterday in the Top 10 on the #BlazePodTeamRed ‘Chase The Pod’ leaderboard. You’re currently in position 1… great job!</br></br></p>";
        $mail->Body    .= '<p>Now you’ve pledged your allegiance to #BlazePodTeamRed you can play as many times as you like, improving your winning score and beating all your friends and family.</br></br></p>';
        $mail->Body    .= '<p>Remember your Black Friday discount code is only valid until 23:59 on Tuesday 30th November 2021, so check out our website <a href="www.blazepoduk.com">www.blazepoduk.com</a> to use your discount on our entire UK and Ireland product range.</br></br></p>';
        $mail->Body    .= '<p>Thanks for playing ‘Chase The Pod’ and don’t forget to keep playing, recording your score and stay in the top 10…</br></br></p>';
        $mail->Body    .= '<b>BlazePod UK and Ireland</b>';
        $mail->send();
        $mail->clearAddresses();
        $sql = mysqli_query($con, "INSERT INTO user_email (full_name, email_address, final_score, pod_name, last_click_time, created_at)
        VALUES ('".$record['full_name']."', '".$record['email_address']."', '".$record['final_score']."', '".$record['pod_name']."', '".$record['last_click_time']."', '".date('Y-m-d')."')");
        $r++;
    }
}


// BLUE POD TOPPER EMAIL
if(mysqli_num_rows($blue_chase) > 0) {
    $b = 1;
    while($record_blue = $blue_chase->fetch_array(MYSQLI_ASSOC))
    {
        $mail->addAddress($record_blue['email_address'], $record_blue['full_name']);
        $mail->isHTML(true);                                  
        $mail->Subject = "Congratulations you're in the BlazePod 'Chase The Pod' Top 10";
        $mail->Body    = '<img src="https://stageofproject.com/blazepod/img/red-team-top-10.jpg" width="1000" height="220" usemap="#Map" border="0" /></br>';
        $mail->Body    .= 'Dear <b>'.$record['full_name'].'</b></br>';
        $mail->Body    .= "<p>Congratulations… you finished yesterday in the Top 10 on the #BlazePodTeamRed ‘Chase The Pod’ leaderboard. You’re currently in position 1… great job!</br></br></p>";
        $mail->Body    .= '<p>Now you’ve pledged your allegiance to #BlazePodTeamRed you can play as many times as you like, improving your winning score and beating all your friends and family.</br></br></p>';
        $mail->Body    .= '<p>Remember your Black Friday discount code is only valid until 23:59 on Tuesday 30th November 2021, so check out our website <a href="www.blazepoduk.com">www.blazepoduk.com</a> to use your discount on our entire UK and Ireland product range.</br></br></p>';
        $mail->Body    .= '<p>Thanks for playing ‘Chase The Pod’ and don’t forget to keep playing, recording your score and stay in the top 10…</br></br></p>';
        $mail->Body    .= '<b>BlazePod UK and Ireland</b>';
        $mail->send();
        $mail->clearAddresses();
        $sql = mysqli_query($con, "INSERT INTO user_email (full_name, email_address, final_score, pod_name, last_click_time, created_at)
        VALUES ('".$record_blue['full_name']."', '".$record_blue['email_address']."', '".$record_blue['final_score']."', '".$record_blue['pod_name']."', '".$record_blue['last_click_time']."', '".date('Y-m-d')."')");
        $b++;
    }
}
?>