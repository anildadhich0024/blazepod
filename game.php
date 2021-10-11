<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Game</title>
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
                    max-width: 55%;
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
                background: #0458b4;
                border: #0458b4;
            }
            .modal-dialog.blaze_start .btn-success {
                color: #fff;
                background-color: #0458b4;
                border-color: #0458b4;
                width: 100%;
                margin-top: 15px;
                height: 50px;
            }
            .modal-dialog.blaze_start h5 {
                color: #3c7256;
                font-size: 18px;
                line-height: 27px;
                font-weight: 400;
                text-align: center;
                background: #d4edda;
                padding: 15px;
                border-radius: 15px;
                font-family: "roboto";
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
            <!-- <div class="score">	Score: <span>0</span> </div> -->
        </div>
        <div class="animatedDivs"></div>
        <!-- Modal -->
        <!--  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            
            
            
            <div class="modal-content"> 
            
            
            
                <div class="modal-body">
            
            
            
                   <h5 class="mb-4">Thank you for participating, your score is <span class="scores"> </span></h5> 
            
            
            
                    <form method="post" action="post.php">
            
            
            
                        <input type="hidden" name="final_score" id="final_score" value="">
            
            
            
                        <input type="hidden" name="pod_name" id="pod_name" value="">
            
            
            
                        <input type="hidden" name="last_click_time" id="last_click_time" value="">
            
            
            
                        <div class="form-group">
            
            
            
                            <label for="inputName">Name</label>
            
            
            
                            <input type="text" class="form-control" required id="inputName" name="full_name" placeholder="Enter Name"> 
            
            
            
                          </div>
            
            
            
                          <div class="form-group">
            
            
            
                            <label for="inputEmail">Email address</label>
            
            
            
                            <input type="email" class="form-control" required id="inputEmail" name="email_address" placeholder="Enter email"> 
            
            
            
                          </div>
            
            
            
                          <div class="form-group">
            
            
            
                            <label for="inputPhone">Phone Number</label>
            
            
            
                            <input type="tel" pattern="[0-9]{10}" required title="10 digits required" name="mobile_number" class="form-control" id="inputPhone" placeholder="Enter Phone number"> 
            
            
            
                          </div>
            
            
            
                          <button class="btn btn-success" type="submit">Submit</button>
            
            
            
                    </form>
            
            
            
                </div> 
            
            
            
            </div>
            
            
            
            </div>
            
            
            
            </div> -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog blaze_start" role="document">
            <div id="finish">      
                <img src="https://stageofproject.com/blazepod/img/pod/home.png">  FINISHED
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="mb-4">Congratulations you tapped <span class="scores"> </span> pods in <span class="last_click"> </span>. Enter your username and email address to reveal your exclusive <br> voucher code. We'll
                        also enter you into our prize draw to win a FREE Blazepod Trainer Kit Deluxe Bundle. <span class="scores"> </span>
                    </h5>
                    <form method="post" action="post.php" id="data_form">
                        <input type="hidden" name="final_score" id="final_score" value="">
                        <input type="hidden" name="pod_name" id="pod_name" value="">
                        <input type="hidden" name="last_click_time" id="last_click_time" value="">
                        <div class="container">
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
                            <!-- <div class="form-group">
                                <label for="inputPhone">Phone Number</label>
                                
                                
                                
                                <input type="tel" pattern="[0-9]{10}" required title="10 digits required" name="mobile_number" class="form-control" id="inputPhone" placeholder="Enter Phone number"> 
                                
                                
                                
                                </div> -->
                            <div class="form__radio-group mt-3">
                                <!-- <input type="radio" name="size" id="larget" class="form__radio-input">
                                    <label class="form__label-radio" for="larget">
                                    
                                    
                                    
                                        <span class="form__radio-button"></span>  -->I wish to opt in to receive email updates, news from Blazepod. ( You can unsubscribe from Blazepod emails  <br>at any time in the future).
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
        <script src="js/main.js"></script>
    </body>
</html>