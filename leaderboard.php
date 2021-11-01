<?php
    include('db.php');
    $red_ball_top = mysqli_fetch_array(mysqli_query($con, "SELECT *, CAST(final_score AS UNSIGNED) AS score FROM user_submissions WHERE created_at < '".date('Y-m-d 00:00:00')."' AND pod_name = 'RED' ORDER BY score DESC, last_click_time ASC LIMIT 1")); 
    $blue_ball_top = mysqli_fetch_array(mysqli_query($con, "SELECT *, CAST(final_score AS UNSIGNED) AS score FROM user_submissions WHERE created_at < '".date('Y-m-d 00:00:00')."' AND pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC LIMIT 1")); 
    $red_chase  = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'RED' ORDER BY score DESC, last_click_time ASC");
    $blue_chase  = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BlazePod UK Game  | Flash Reflex Training System | UK and Ireland Official Site</title>
        
        <meta name="BlazePod UK Game" />
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
        </style>
    </head>
    <body>
        <section id="hero1" class="" style="background: url('assets/img/banner1.png') center;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" class="logo-1">
                    <img src="assets/img/Logo_Horizontal_White.png" alt="">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center logo-2">
                    <img class="img-fluid" src="assets/img/BlazePod-Team-Red.png" alt="">
                </div>
                <div class="col-md-6 text-center for-mob">
                    <img class="img-fluid" src="assets/img/BlazePod-Team-Blue.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                	<h1>'Chase The Pod'</h1>
                    <h2>to unlock your Black Friday discount of up to 25%</h2>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <div class="lgt-img" >
                        <img class="img-fluid" src="assets/img/BlazePodLeft.png" alt="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="lgt-img1 text-center" >
                        <img class="img-fluid" src="assets/img/BlackFridaySaleHeader.png" alt="">
                        <p>So... this November, we're asking you to pick Team Red or Team Blue, join your BlazePod tribe and play our hugely addictive 'Chase The Pod' online game to be in with a chance to win a heap of exclusive prizes and unlock an amazing 25% Black Friday and Cyber Monday discount off our entire BlazePod UK and Ireland store!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="choose-clr" style="background: url('assets/img/Background.png') top;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>WHICH COLOUR ARE YOU?</h3>
                        <p>
We hope you've warmed up those thumbs? It's about to get serious...<br><br>

Back by popular demand, our online 'Chase The Pod' game is making a comeback... but this year it's got even more additive as not only are you competing for #BlazePodTeamRed or #BlazePodTeamBlue we've added moving pods to test your reflexes even more!<br><br>

Like some of your most loved retro games, 'Chase The Pod' is addictive, competitive and will have you challenging (and hopefully beating) all your friends and family. BUT this game can also win you amazing prizes, including BlazePod Kits, Training and Accessories, and will unlock an amazing up to 25% Black Friday and Cyber Monday discount code off our entire BlazePod UK and Ireland store!<br><br>

Everytime you play, you'll unlock a 15%, 20% or 25% discount code, if you don't get 25% the first time around, don't worry... keep playing and see what you get next time!
</p>
                    </div>
                </div>
                <div class="row chose-tm">
                    <div class="col-md-6 chose-tm1">
                        <h4>TEAM RED</h4>
                        <img src="assets/img/Rey-Smart.png" alt="">
                    </div>
                    <div class="col-md-6 chose-tm2">
                        <img src="assets/img/MichaelBaah.png" alt="">
                        <h4>TEAM BLUE</h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section id="services">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="chose-pod" src="assets/img/Chase-The-Pod.png" alt="">
                        <h5>We hope you've warmed up those thumbs. It's about to get serious.</h5>
                        <p>Back by popular demand, our Chase the Pod game is making a come back.<br><br> Like some of your most loved retro games, Chase the Pod is addictive, competitive...and won't win you any friends. <br>BUT it could win you a whole load of discount off BlazePod Kits, Bundles and Accessories.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio" style="background: url('assets/img/Background-1.png') top;">
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="game-sc" src="assets/img/game-screen.png" alt="" />
                    </div>
                    <div class="col-md-12 text-center btens">
                        <a class="red-bt" onclick="select_pod(1)">PLAY FOR TEAM RED</a>
                        <a class="blue-bt" onclick="select_pod(0)">PLAY FOR TEAM BLUE</a>
                    </div>
                    <div class="col-md-12 text-center">
                    	<p class="nw-p">Choose to play for Team Red or Team Blue, play the game and submit your score to unlock your Black Friday discount code and enter either the Red or Blue Leaderboard. Once you've pledged your allegiance to one team, you're not able to switch... so choose wisely!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h3>RED TEAM LEADERBOARD</h3>
                        <div class="pl-nm-bg">Player of the day<br><?=!empty($red_ball_top) ? ucwords($red_ball_top['full_name']) : 'Name'?></div>
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
                                    if(mysqli_num_rows($red_chase) > 0)
                                    {
                                    ?>
                                        <?php
                                            $i = 1;
                                            while($record = $red_chase->fetch_array(MYSQLI_ASSOC))
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
                                    <?php
                                    } else {
                                    ?>
                                        <tr>&nbsp;</tr>
                                        <tr>
                                            <td>------</td>
                                            <td>------</td>
                                            <td>------</td>
                                            <td>------</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 text-center wt-blu">
                        <h3>BLUE TEAM LEADERBOARD</h3>
                        <div class="pl-nm-bg">Player of the day<br><?=!empty($blue_ball_top) ? ucwords($red_ball_top['full_name']) : 'Name'?></div>
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
                                    if(mysqli_num_rows($blue_chase) > 0)
                                    {
                                    ?>
                                        <?php
                                            $i = 1;
                                            while($record = $blue_chase->fetch_array(MYSQLI_ASSOC))
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
                                    <?php
                                    } else {
                                    ?>
                                        <tr>&nbsp;</tr>
                                        <tr>
                                            <td>------</td>
                                            <td>------</td>
                                            <td>------</td>
                                            <td>------</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Once you've played the 'Chase The Pod' game and submitted your details, you'll unlock a voucher code for 15%, 20% or 25% off our entire BlazePod UK and Ireland store. You can play as many times as you want to increase your chances of unlocking the top 25% discount code. All discount codes are valid until 23:59 on Tuesday 30th November 2021. Voucher codes cannot be redeemed or exchanged for cash value. Voucher codes are limited to a one time use per online transaction and exclude our £5.00 next day shipping option. </p>
                    </div>
                </div>
            </div>
        </div>
        <section id="contact" style="background: url('assets/img/noise-bg.png') top;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="frm-bg">
                            <h4>WHO WILL YOU CHOOSE?</h4>
                            <form>
                                <div style="padding: 5px;">
                                    <input class="form-control" name="firstname" placeholder="Name" type="text" required="">
                                    <input class="form-control" name="email" placeholder="Email" type="text" required="">
                                    <input class="form-control" name="Phone Number" placeholder="Phone Number" type="text" required="">
                                    <input class="form-control" name="Team" placeholder="Team" type="text" required="">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col-md-4">
                        <?=date('Y')?> BlazePod UK
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="https://blazepoduk.com/pages/privacy-policy" target="_blank">Privacy Policy</a> 
                        <a href="https://www.blazepod.com/pages/terms-of-use" target="_blank">Terms and Conditions</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
<script>
function select_pod(POD_NAME)
{
    document.cookie = "POD_NAME="+POD_NAME;
    window.location="game.php";
}

window.onload = function() {
    var countDownDate = new Date("Nov 08, 2021 09:00:00 GMT+0200").getTime();
    // Get today's date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    if (distance >= 0) {
        window.location='index.php';
    }
};
</script>