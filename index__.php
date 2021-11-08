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

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    </head>
    <body>
        <section id="hero" class="" style="background: url('assets/img/banner.png');">
            <div class="pt-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="#" class="logo-1"><img src="assets/img/Logo_Horizontal_White.png" alt=""></a>
                    </div>
                    <div class="col-md-12 text-center logo-2">
                        <img class="img-fluid" src="assets/img/Chase-The-Pod.png" alt="">
                    </div>
                    <div class="col-md-12 text-center">
                        <div id="clock">
                            <!-- <p class="date">{{ date }}</p> -->
                            <p class="time" id="time"></p>
                            <!-- <p class="text">DIGITAL CLOCK with Vue.js</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
    <script type="text/javascript">
        var countDownDate = new Date("Nov 08, 2021 09:00:00 GMT+0200").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
          // Output the result in an element with id="demo"
          document.getElementById("time").innerHTML = days.toString().padStart(2, 0) + ":"
          + hours.toString().padStart(2, 0) + ":"
          + minutes.toString().padStart(2, 0) + ":" + seconds.toString().padStart(2, 0);
            
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            window.location="leaderboard"
          }
        }, 1000);
    </script>
</html>