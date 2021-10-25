<?php
$con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');
$red_chase  = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'RED' ORDER BY score DESC, last_click_time ASC limit 10");  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;                                       
$mail->isSMTP();                                            
$mail->Host       = 'smtp.gmail.com;';                    
$mail->SMTPAuth   = true;                             
$mail->Username   = 'blazepodgame@gmail.com';                 
$mail->Password   = 'Anil#123!';                        
$mail->SMTPSecure = 'ssl';                              
$mail->Port       = 465;  

$mail->setFrom('blazepodgame@gmail.com', 'BlazePod');  

$i = 1;
while($record = $red_chase->fetch_array(MYSQLI_ASSOC))
{
    try {         
        $mail->addAddress($record['email_address'], $record['full_name']);
        
        $mail->isHTML(true);                                  
        $mail->Subject = 'Position Update';
        $mail->Body    = 'Dear <b>'.$record['full_name'].'</b></br>';
        $mail->Body    .= '<p>Greetings of the day,</br></p>';
        $mail->Body    .= '<p>You have holds the '.$i.' position into the game with '.$record['final_score'].'. Keep playing to be on top.</br></br></p>';
        $mail->Body    .= '<p>Thanks</p>';
        $mail->Body    .= '<b>Team BlazePod</b>';
        $mail->send();
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$record['full_name']}";
    }
    if($i == 10) {
        break;
    }
    $i++;
}
?>