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
</head>
<?php
    $con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');
    $blue_chase = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC");
    $red_chase = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'RED' ORDER BY score DESC, last_click_time ASC");
?>
<body>
  <div class="container mb-3">
     <div class="row">
        <div class="col-lg-6 col-md-12 mt-5">
           <h3>Red Ball Chase</h3>
           <div class="blue_ball">
              <table>
                 <thead>
                    <tr>
                       <th>Name</th>
                       <th>Mobile Number</th>
                       <th>Score</th>
                       <th>Time</th>
                   </tr>
               </thead>
               <tbody>
                <?php
                    if(mysqli_num_rows($red_chase) > 0)
                    {
                        while($record = $red_chase->fetch_array(MYSQLI_ASSOC))
                        {
                ?>
                        <tr>
                            <td><?=$record['full_name']?></td>
                            <td><?=$record['mobile_number']?></td>
                            <td><?=$record['final_score']?></td>
                            <td><?=$record['last_click_time']?></td>
                        </tr>
                <?php
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
<div class="col-lg-6 col-md-12 mt-5">
   <h3>Blue Ball Chase</h3>
   <div class="blue_ball">
      <table>
         <thead>
            <tr>
               <th>Name</th>
               <th>Mobile Number</th>
               <th>Score</th>
               <th>Time</th>
           </tr>
       </thead>
       <tbody>
       <?php
            if(mysqli_num_rows($blue_chase) > 0)
            {
                while($record = $blue_chase->fetch_array(MYSQLI_ASSOC))
                {
        ?>
                <tr>
                    <td><?=$record['full_name']?></td>
                    <td><?=$record['mobile_number']?></td>
                    <td><?=$record['final_score']?></td>
                    <td><?=$record['last_click_time']?></td>
                </tr>
        <?php
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