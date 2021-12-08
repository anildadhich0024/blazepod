<?php
include('db.php');
$pod_name       = base64_decode($_SESSION['pod_name']);
$code_name      = base64_decode($_SESSION['code_name']);
$game_status    = base64_decode($_SESSION['game_status']);
if((($pod_name != 'RED' || $pod_name != 'BLUE') && !isset($_SESSION['pod_name'])) && (($code_name != 'BF15' || $code_name != 'CHASE20' || $code_name != 'GAME25') && !isset($_SESSION['code_name'])))
{
    echo '<script>window.location.href= "leaderboard"</script>';
}

$record_list  = $con->query("Select *, final_score AS score from user_submissions WHERE pod_name = '".$pod_name."' ORDER BY score DESC, last_click_time ASC");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="utf-8" />
        <title>BlazePod UK Game  | Flash Reflex Training System | UK and Ireland Official Site</title>
        <meta name="BlazePod UK Game" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="BlazePod | Flash Reflex Training System | UK and Ireland Official Site"/>
        <meta name= "author" content="BlazePod UK">

        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="BlazePod | Flash Reflex Training System | UK and Ireland Official Site" />
        <meta property="og:description" content="The official BlazePod website for UK and Ireland. The world leading pro-level flash-reflex training system for everyone. Shop BlazePod - Follow Your Instincts - Reach True Excellence." />
        <meta property="og:url" content="https://game.blazepoduk.com/" />
        <meta property="og:site_name" content="BlazePod" />
        <meta property="og:image" content="https://cdn.shopify.com/s/files/1/0405/1288/0807/files/Logo_Horizontal_1_3db154b7-0d0f-45d0-bf7e-858eed37ac33.png?v=1592820114" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="BlazePod | Flash Reflex Training System | UK and Ireland Official Site">
        <meta name="twitter:description" content="The official BlazePod website for UK and Ireland. The world leading pro-level flash-reflex training system for everyone. Shop BlazePod - Follow Your Instincts - Reach True Excellence."> <link rel="alternate" href="https://blazepoduk.com/" hreflang="en-gb" />
        <link rel="alternate" href="https://blazepoduk.com/" hreflang="en-ie" />
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <style type="text/css">
        .tbl-bg.tableFixHead table tbody {
                display: block;
                width: 100%;
                overflow: auto;
                max-height: 400px;
            }
            .tableFixHead {
                overflow: auto;
                height: auto;
            }
            
            .tbl-bg.tableFixHead tr {
                width: 100%;
                display: table;
                table-layout: fixed; }
                
            .tbl-bg.tableFixHead th, td {
                display: table-cell;
                text-align: left;
                }

        	#portfolio {
    width: 95%;
    margin: 0 auto;
}
.tbl-bg {
    padding: 0px 0px 25px;
}

@media (max-width: 767px) {
	#portfolio {
    width:88%;
}
}
        </style>
   </head>
   <!-- style="background: url('assets/img/background.jpg') center; background-size: cover; background-repeat: no-repeat;" -->
   <body>
      <!-- Portfolio-->
      <div id="portfolio">
         <div class="p-0 tbls-btn">
            <div class="row">
               <div class="col-md-12">
                  <?php
                  if($game_status == 'SUCCESS') {
                  ?>
                    <p>
                        Congratulations you’ve won a Discount Voucher which can be used on all BlazePod kits, bundles and accessories! Your exclusive voucher code is <b class="ccode"><?=$code_name?></b> and expires at 23:59 on Tuesday 30th November 2021. <br>
                        Remember, you can play the game as many times as you want, each time you play you’ll get another entry into our prize draw! The more times you play the more chances you have to win! In order for your score to be updated on the leaderboard please make sure you use the same username and email address.<br><br>
                        <span>You’ll receive a confirmation email confirming the first voucher code you won, further entries won’t result in additional emails so if you win a different voucher code, please write this down! We will notify you by email if you are the lucky winner or if you’re top of the leaderboard at 23:59 on Tuesday 30th November 2021.</span>
                    </p>
                <?php } else { ?>
                    <p>Thank You for completing our Chase The Pod Black Friday game, you didn't beat your previous highest score... try again and if you beat it you'll be awarded another voucher code of either 15%, 20% or 25%... keep playing and beating your score to unlock the top value code!</p>
                <?php } ?>
               </div>
            </div>
            <div class="row">
                <?php
                    if($game_status == 'SUCCESS') {
                    ?>
                    <?php
                    if($pod_name == 'RED')
                    {
                    ?>
                        <div class="col-md-12 text-center mt-5">
                            <div class="tbl-bg tableFixHead">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>User</th>
                                            <th>Score</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            while($record = $record_list->fetch_array(MYSQLI_ASSOC))
                                            {
                                        ?>
                                            <tr>&nbsp;</tr>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$record['full_name']?></td>
                                                <td><?=$record['final_score']?></td>
                                                <td><?=$record['last_click_time']?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                    <div class="col-md-12 text-center wt-blu mt-5">
                        <div class="tbl-bg tableFixHead">
                            <table>
                                <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>User</th>
                                    <th>Score</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        while($record = $record_list->fetch_array(MYSQLI_ASSOC))
                                        {
                                    ?>
                                        <tr>&nbsp;</tr>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$record['full_name']?></td>
                                            <td><?=$record['final_score']?></td>
                                            <td><?=$record['last_click_time']?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                <?php
                    }
                ?>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                        <a href="index"><img src="assets/img/home.svg" style="max-height: 25px;"> Back To Home</a>
                     </div>
                     <div class="col-md-4 text-center">
                        <a href="game"><img src="assets/img/replay.svg" style="max-height: 25px;"> Play Again</a>
                     </div>
                     <div class="col-md-4 text-right">
                        <a href="https://www.blazepod.com/" target="_blank">BlazePod Website</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>