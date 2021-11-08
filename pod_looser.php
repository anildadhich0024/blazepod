<?php
include('db.php');
$red_chase  = $con->query("SELECT *, CAST(final_score AS UNSIGNED) AS score FROM `user_email` WHERE email_address NOT IN (SELECT email_address FROM `user_email` where `created_at` = '".date('Y-m-d')."') AND `created_at` = '".date('Y-m-d',strtotime("-1 days"))."' AND pod_name = 'RED' ORDER BY score DESC, last_click_time ASC");  
$blue_chase  = $con->query("SELECT *, CAST(final_score AS UNSIGNED) AS score FROM `user_email` WHERE email_address NOT IN (SELECT email_address FROM `user_email` where `created_at` = '".date('Y-m-d')."') AND `created_at` = '".date('Y-m-d',strtotime("-1 days"))."' AND pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC");  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;                                       
$mail->isSMTP();                                            
$mail->Host       = 'smtp.gmail.com';                    
$mail->SMTPAuth   = true;                             
$mail->Username   = 'blazepodgame@gmail.com';                 
$mail->Password   = 'Anil#123!';                        
$mail->SMTPSecure = 'ssl';                              
$mail->Port       = 465;  

$mail->setFrom('blazepodgame@gmail.com', 'BlazePod');  

// RED POD TOPPER EMAIL
if(mysqli_num_rows($red_chase) > 0) {
    $r = 11;
    while($record = $red_chase->fetch_array(MYSQLI_ASSOC))
    {
        $mail->addAddress($record['email_address'], $record['full_name']);
        $mail->isHTML(true);                                  
        $mail->Subject = "Oh No... you've dropped out of the BlazePod 'Chase The Pod' Top 10";
        $mail->Body    = '<img src="https://stageofproject.com/blazepod/img/blue-team-dropped-out.jpg" width="1000" height="220" usemap="#Map" border="0" /></br>';
        $mail->Body    .= 'Dear <b>'.$record['full_name'].'</b></br>';
        $mail->Body    .= "<p>Oh no… you’ve been replaced in the Top 10 on the #BlazePodTeamBlue ‘Chase The Pod’ leaderboard. You’re currently in position '".$r."'.</br></br></p>";
        $mail->Body    .= "<p>Don’t worry though, you’ve still unlocked your Black Friday discount code, and you’ve until 23:59 on Tuesday 30th November 2021 to get back into the Top 10 be in with a chance to win some amazing prizes!</br></br></p>";
        $mail->Body    .= "<p>Now you’ve pledged your allegiance to #BlazePodTeamBlue you can play as many times as you like, improving your winning score and beating all your friends and family.</br></br></p>";
        $mail->Body    .= '<p>Remember your Black Friday discount code is only valid until 23:59 on Tuesday 30th November 2021, so check out our website <a href="www.blazepoduk.com">www.blazepoduk.com</a> to use your discount on our entire UK and Ireland product range.</br></br></p>';
        $mail->Body    .= '<p>Thanks for playing ‘Chase The Pod’ and don’t forget to keep playing, recording your score and getting back into the top 10…</br></br></p>';
        $mail->Body    .= '<b>BlazePod UK and Ireland</b>';
        $mail->send();
        $mail->clearAddresses();
        $r++;
    }
}


// BLUE POD TOPPER EMAIL
if(mysqli_num_rows($blue_chase) > 0) {
    $b = 11;
    while($record_blue = $blue_chase->fetch_array(MYSQLI_ASSOC))
    {
        $mail->addAddress($record_blue['email_address'], $record_blue['full_name']);
        $mail->isHTML(true);                                  
        $mail->Subject = "Oh No... you've dropped out of the BlazePod 'Chase The Pod' Top 10";
        $mail->Body    = '<img src="https://stageofproject.com/blazepod/img/red-team-dropped-out.jpg" width="1000" height="220" usemap="#Map" border="0" /></br>';
        $mail->Body    .= 'Dear <b>'.$record['full_name'].'</b></br>';
        $mail->Body    .= "<p>Oh no… you’ve been replaced in the Top 10 on the #BlazePodTeamBlue ‘Chase The Pod’ leaderboard. You’re currently in position '".$b."'.</br></br></p>";
        $mail->Body    .= "<p>Don’t worry though, you’ve still unlocked your Black Friday discount code, and you’ve until 23:59 on Tuesday 30th November 2021 to get back into the Top 10 be in with a chance to win some amazing prizes!</br></br></p>";
        $mail->Body    .= "<p>Now you’ve pledged your allegiance to #BlazePodTeamBlue you can play as many times as you like, improving your winning score and beating all your friends and family.</br></br></p>";
        $mail->Body    .= '<p>Remember your Black Friday discount code is only valid until 23:59 on Tuesday 30th November 2021, so check out our website <a href="www.blazepoduk.com">www.blazepoduk.com</a> to use your discount on our entire UK and Ireland product range.</br></br></p>';
        $mail->Body    .= '<p>Thanks for playing ‘Chase The Pod’ and don’t forget to keep playing, recording your score and getting back into the top 10…</br></br></p>';
        $mail->Body    .= '<b>BlazePod UK and Ireland</b>';
        $mail->send();
        $mail->clearAddresses();
        $b++;
    }
}
?>