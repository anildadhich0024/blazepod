<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blazepod Result</title>

  <meta content="" name="descriptison">

  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Vendor CSS Files -->

  <link rel="stylesheet" href="https://use.typekit.net/uis3pwg.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Template Main CSS File -->

  <link href="styles/style.css" rel="stylesheet">

  <style type="text/css">

  body {

    font-family: "Times New Roman";

}



div#finish img {

    width: 33px;

}

#finish {

    position: fixed;

    text-align: center;

    width: 220px;

    z-index: 999;

    top: 30px;

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

.looking {

    margin-top: 120px;

}

.discount {

    background: #152c39;

    padding: 40px;

    border-radius: 15px;

    color: #2a9dc1;

    font-size: 16px;

    line-height: 28px;

    text-align: center;

}





@media (max-width: 768px){



 a.load_more {

    width:100%;

}



}



</style>



</head>

<?php

$con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');

$blue_chase = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC");

$red_chase = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'RED' ORDER BY score DESC, last_click_time ASC");

?>

<body>



    <div id="finish">      

      <img src="https://stageofproject.com/blazepod/img/pod/home.png">  FINISHED

  </div>  

  <div class="looking">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="discount">

                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).  Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>

                    <br>

                    <p> ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>

                </div>

            </div>

        </div>

    </div>        

</div>



<div class="container mb-3">

   <div class="row">

    <div class="col-lg-12 col-md-12 mt-3">

     <h3 class="text-center">Red Ball Chase</h3>

     <div class="blue_ball">

      <table>

       <thead>

        <tr>

         <th>User Name</th>

         <th>Score</th>

         <th>Time</th>

         <th>Position</th>

     </tr>

 </thead>

 <tbody>

    <?php

    if(mysqli_num_rows($red_chase) > 0)

    {
        $i = 1;
        while($record = $red_chase->fetch_array(MYSQLI_ASSOC))

        {

            ?>

            <tr>

                <td><?=$record['full_name']?></td>

                <td><?=$record['final_score']?></td>

                <td><?=$record['last_click_time']?></td>

                <td><?=$i?></td>

            </tr>

            <?php
            $i++;
        }

    } else {

        ?>

        <tr><td colspan="3" class="text-center"><strong>No record found</strong></td></tr>

        <?php

    }

    ?>

</tbody>

</table>

</div>

</div>

<div class="col-lg-12 col-md-12 mt-3">

 <h3 class="text-center mt-0">Blue Ball Chase</h3>

 <div class="blue_ball">

  <table>

   <thead>

    <tr>

     <th> User Name</th>

     <th>Score</th>

     <th>Time</th>

     <th>Position</th>

 </tr>

</thead>

<tbody>

 <?php

 if(mysqli_num_rows($blue_chase) > 0)

 {
    $i = 1;
    while($record = $blue_chase->fetch_array(MYSQLI_ASSOC))

    {

        ?>

        <tr>

            <td><?=$record['full_name']?></td>

            <td><?=$record['final_score']?></td>

            <td><?=$record['last_click_time']?></td>

            <td><?=$i?></td>

        </tr>

        <?php
        $i++;
    }

} else {

    ?>

    <tr><td colspan="3" class="text-center"><strong>No record found</strong></td></tr>

    <?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

<a class="load_more" href="index.html"> Go to Home Page </a>

</div>

</body>

</html>