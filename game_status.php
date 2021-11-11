<?php
include('db.php');

$start_date = !isset($_GET['game_date']) || empty($_GET['game_date']) ? date('Y-m-d') : $_GET['game_date'];

$start_date_time = !isset($_GET['game_date']) || empty($_GET['game_date']) ? date('Y-m-d 00:00:00') : $_GET['game_date'].' 00:00:00';
$end_date_time = !isset($_GET['game_date']) || empty($_GET['game_date']) ? date('Y-m-d 23:59:59') : $_GET['game_date'].' 23:59:59';

$red_all_parti = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total_users) AS total_users FROM start_game WHERE pod_name = 'RED' LIMIT 1"));
$red_today_parti = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total_users) AS total_users FROM start_game WHERE pod_name = 'RED' AND game_date = '".$start_date."' LIMIT 1"));

$red_all_comp = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS ttl_users FROM user_submissions WHERE pod_name = 'RED' LIMIT 1"));
$red_today_comp = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS ttl_users FROM user_submissions WHERE pod_name = 'RED' AND created_at between '".$start_date_time."' AND '".$end_date_time."' LIMIT 1"));

$blue_all_parti = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total_users) AS total_users FROM start_game WHERE pod_name = 'BLUE' LIMIT 1"));
$blue_today_parti = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total_users) AS total_users FROM start_game WHERE pod_name = 'BLUE' AND game_date = '".$start_date."'  LIMIT 1"));

$blue_all_comp = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS ttl_users FROM user_submissions WHERE pod_name = 'BLUE' LIMIT 1"));
$blue_today_comp = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS ttl_users FROM user_submissions WHERE pod_name = 'BLUE' AND created_at between '".$start_date_time."' AND '".$end_date_time."' LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
        <meta name="twitter:description" content="The official BlazePod website for UK and Ireland. The world leading pro-level flash-reflex training system for everyone. Shop BlazePod - Follow Your Instincts - Reach True Excellence.">
        <link rel="alternate" href="https://blazepoduk.com/" hreflang="en-gb" />
        <link rel="alternate" href="https://blazepoduk.com/" hreflang="en-ie" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css">
        <style type="text/css">
            .over_all {
            background: #fff;
            box-shadow: 0px 0px 15px #c5c5c5;
            border-radius: 15px;
            padding: 25px;
            }
            .over_all ul.list-part {
            padding-left: 0;
            margin-bottom: 0;
            }
            .over_all ul.list-part li.list-group-item {
            border: none;
            padding: 5px 0px;
            font-size: 16px;
            }
            .over_all ul.list-part li.list-group-item span.badge {
            float: right;
            }
            .all_over input[type="date"] {
            width: 45%;
            border: 1px solid #d1d1d1;
            padding: 8px;
            border-radius: 5px;
            outline: none;
            }
            .all_over input[type="submit"] {
            border: none;
            padding: 9px 30px;
            }
            .all_over button {
            border: none;
            padding: 9px 30px;
            }
        </style>
    </head>
    <body>
        <div class="container all_over mt-2">
            <div class="row">
                <div class="col-md-6">
                    <form action="game_status" method="GET">
                        <input type="date" id="game_date" name="game_date" value="<?=$_GET['game_date']?>">
                        <input type="submit">
                        <button type="button" id="ClearFilter">Clear</button>
                    </form>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-6">
                    <h3>Red Team Status </h3>
                    <div class="over_all">
                        <ul class="list-part">
                            <li class="list-group-item">
                                <label>Till now total game played partially + Completely: </label>  <span class="badge"><?= ($red_all_parti['total_users'] - $red_all_comp['ttl_users']) + $red_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Till now total game played completely:  </label>  <span class="badge"><?=empty($red_all_comp['ttl_users']) ? 0 : $red_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Till now total game played partially: </label>  <span class="badge"><?=$red_all_parti['total_users'] - $red_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Today total game played completely::  </label>  <span class="badge"><?=empty($red_today_comp['ttl_users']) ? 0 : $red_today_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Today total game played partially:  </label> <span class="badge"><?=$red_today_parti['total_users'] - $red_today_comp['ttl_users']?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Blue Team Status </h3>
                    <div class="over_all">
                        <ul class="list-part">
                            <li class="list-group-item">
                                <label>Till now total game played partially + Completely: </label>  <span class="badge"><?= ($blue_all_parti['total_users'] - $blue_all_comp['ttl_users']) + $blue_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Till now total game played completely:  </label>  <span class="badge"><?=empty($blue_all_comp['ttl_users']) ? 0 : $blue_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Till now total game played partially: </label>  <span class="badge"><?=$blue_all_parti['total_users'] - $blue_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Today total game played completely::  </label>  <span class="badge"><?=empty($blue_today_comp['ttl_users']) ? 0 : $blue_today_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Today total game played partially:  </label> <span class="badge"><?=$blue_today_parti['total_users'] - $blue_today_comp['ttl_users']?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3>Overall Status  </h3>
                    <div class="over_all">
                        <ul class="list-part">
                            <li class="list-group-item">
                                <label>Till now total game played partially + Completely: </label>  <span class="badge"><?= (($red_all_parti['total_users'] - $red_all_comp['ttl_users']) + $red_all_comp['ttl_users']) + (($blue_all_parti['total_users'] - $blue_all_comp['ttl_users']) + $blue_all_comp['ttl_users'])?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Till now total game played completely:  </label>  <span class="badge"><?=empty($red_all_comp['ttl_users']) && empty($blue_all_comp['ttl_users']) ? 0 : $red_all_comp['ttl_users'] + $blue_all_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Till now total game played partially: </label>  <span class="badge"><?=($red_all_parti['total_users'] - $red_all_comp['ttl_users']) + ($blue_all_parti['total_users'] - $blue_all_comp['ttl_users'])?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Today total game played completely::  </label>  <span class="badge"><?=empty($red_today_comp['ttl_users']) && empty($blue_today_comp['ttl_users']) ? 0 : $red_today_comp['ttl_users'] + $blue_today_comp['ttl_users']?></span>
                            </li>
                            <li class="list-group-item">
                                <label> Today total game played partially:  </label> <span class="badge"><?=($red_today_parti['total_users'] - $red_today_comp['ttl_users']) + ($blue_today_parti['total_users'] - $blue_today_comp['ttl_users'])?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#ClearFilter').on('click', function () {
    var currentURL = location.protocol + '//' + location.host + location.pathname;
    window.location = currentURL;
});
</script>