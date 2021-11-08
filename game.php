<?php
session_unset();
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
        <meta name="twitter:description" content="The official BlazePod website for UK and Ireland. The world leading pro-level flash-reflex training system for everyone. Shop BlazePod - Follow Your Instincts - Reach True Excellence."> <link rel="alternate" href="https://blazepoduk.com/" hreflang="en-gb" />
        <link rel="alternate" href="https://blazepoduk.com/" hreflang="en-ie" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css">
        <style type="text/css">
            .animatedDivs {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100vh;
            justify-content: center;
            }
            @media (min-width: 576px){
            .modal-dialog {
            max-width: 95%;
            margin: 1.75rem auto;
            }
            }
            #timer {
            width: 160px;
            }
            span#seconds {
            position: absolute;
            left: 30px;
            font-weight: 700;
            }
            span#milliseconds {
            position: absolute;
            right: 30px;
            font-weight: 700;
            }
            .modal-dialog.blaze_start .form-control {
            padding: 0.550rem .75rem;
            }
            /* .modal-dialog.blaze_start {
            margin-top: 90px;
            }*/
            .modal-dialog.blaze_start .btn-success:active {
            background: #00C1DE;
            border: #00C1DE;
            }
            .modal-dialog.blaze_start .btn-success {
            color: #fff;
            background-color: #00C1DE;
            border-color: #00C1DE;
            width: 100%;
            margin-top: 15px;
            height: 50px;
            }
            .modal-dialog.blaze_start h5 {
                font-size: 16px;
        color: #00c1de;
        text-align: center;
        line-height: 37px;
        text-align: left;
        padding: 40px;
        margin-bottom: 0;
        border-radius: 15px;
        background: rgb(0 0 32 / 70%);
        font-family: 'Oswald', sans-serif;
            }
            .modal-dialog.blaze_start .modal-content {
            background: transparent;
            margin-top: 90px;
            border: none;
            }
            .modal-dialog.blaze_start .modal-body label {
            color: #fff;
            font-size: 18px;
            }
            .form__radio-input {
            display: none;
            }
            .form__label-radio {
            font-size: 15px;
            cursor: pointer;
            position: relative;
            padding-left: 25px;
            margin-left: 10px;
            }
            .form__radio-button {
            border: 2px solid #c7c7c7;
            }
            .form__radio-input:checked ~ .form__label-radio .form__radio-button::after {
            opacity: 1;
            }
            .form__radio-button {
            height: 20px;
            width: 20px;
            border: 2px solid #2AC7F0;
            border-radius: 50%;
            display: inline-block;
            position: absolute;
            left: 0;
            top: 5px;
            }
            .form__radio-button::after {
            content: "";
            display: block;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            opacity: 0;
            transition: opacity 0.2s;
            }
            .form__radio-button {
            border: 2px solid #c7c7c7;
            }
            div#finish img {
            width: 33px;
            }
            #finish {
            position: fixed;
            text-align: center;
            width: 220px;
            z-index: 999;
            top: -63px;
            right: 50%;
            transform: translate(50%,-50%);
            font-family: 'LED Digital 7', sans-serif;
            font-size: 30px;
            font-weight: 500;
            padding: 5px 10px 8px 10px;
            background: #ebe8e8;
            border-radius: 0px 0px 10px 10px;
            /* border: #6c6c6c solid 3px; */
            border-top: none;
            border-bottom: 7px solid #6c6c6c;
            }
            .form__radio-group.mt-3 {
            color: #fff;
            }
            #exampleModal {
                    padding-left: 0px !important;
            }

        </style>
    </head>
    <body style="background-color:black;">
        <div id="timer">
            <div class="dhm d-none">
                <span id="days">00</span>
                <span id="hours">00</span>
                <span id="minutes">00</span>
            </div>
            <div class="sec">           
                <span id="seconds">00 </span> :
                <span id="milliseconds">00</span>
            </div>
        </div>
        <div class="animatedDivs"></div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog blaze_start" role="document">
            <div id="finish">      
                <img src="https://stageofproject.com/blazepod/img/pod/home.png">  FINISHED
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="mb-4 text-left">
                        <p>Congratulations you tapped out <span class="total_points"> </span> pods in <span class="last_click"> </span> seconds... you tapped out <span class="positive_points"></span> correctly coloured pods and <span class="neg_points"></span> of the wrong colour. Your final score is <span class="final_point"></span>.</p>
                        <p>Enter your username and email address below to reveal your exclusive Black Friday discount code of up to 25%. Once you've submitted your details you can always play again and look to beat your score, just remember your username and you'll need this to update your personal leaderboard score!</p>
                        <p>If you're in the Top 10 for either the Red or Blue Leaderboards then you're in with a chance to win a heap of BlazePod prizes too!</p>
                        <p><small style="font-size:75%;">Your username will be seen on our leaderboard so don't include personal information you don't want to be seen by others. Usernames which are deemed offensive by the BlazePod team will be deleted.</small></p>
                    </h5>
                    <form method="post" action="post.php" id="data_form">
                        <input type="hidden" name="total_points" id="total_points" value="">
                        <input type="hidden" name="neg_points" id="neg_points" value="">
                        <input type="hidden" name="final_point" id="final_point" value="">
                        <input type="hidden" name="positive_points" id="positive_points" value="">
                        <input type="hidden" name="pod_name" id="pod_name" value="">
                        <input type="hidden" name="last_click_time" id="last_click_time" value="">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Full Name:</label>
                                        <input type="text" class="form-control" required id="inputName" name="full_name" placeholder="User Name"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail">Email Address:</label>
                                        <input type="email" class="form-control" required id="inputEmail" name="email_address" placeholder="Enter email"> 
                                    </div>
                                </div>
                            </div>
                            <div class="form__radio-group mt-3">
                                <input type="checkbox" name="accept_condition" id="larget" value="Yes" class="form__radio-input">
                                    <label class="form__label-radio" for="larget">
                                    <span class="form__radio-button"></span> I wish to opt in to receive email updates, news from Blazepod. ( You can unsubscribe from Blazepod emails at any time in the future).
                                </label>
                            </div>
                            <button class="btn btn-success" type="button">Submit</button>
                    </form>
                    </div> 
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/main.js?v=<?=date('YmdHis')?>"></script>
        <script> 
            document.addEventListener('contextmenu', event => event.preventDefault()); 
            
            document.onkeypress = function (event) {  
            
                event = (event || window.event);  
            
                if (event.keyCode == 123) {  
            
                    return false;  
            
                }  
            
            }  
            
            document.onmousedown = function (event) {  
            
                event = (event || window.event);  
            
                if (event.keyCode == 123) {  
            
                    return false;  
            
                }  
            
            }  
            
            document.onkeydown = function (event) {  
            
                event = (event || window.event);  
            
                if (event.keyCode == 123) {  
            
                    return false;  
            
                }  
            
            }  
            
            
            
            document.addEventListener("keydown", function (event) {
            
                if (event.ctrlKey) {
            
                    event.preventDefault();
            
                }   
            
            });
            
        </script>
    </body>
</html>