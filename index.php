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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
            margin-top: 60px;
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
            .home_sec {
            padding: 5px 30px;
            position: absolute;
            }
            .home_sec img {
            width: 40px;
            filter: invert(1);
            }
            .back_img {
            /*background: url(./../blazepod/img/pod/dark.png)center center;*/
            background-size: cover;
            position: absolute;
            text-align: center;
            width: 100%;
            background-image: linear-gradient(to bottom right,#445d75,#020f1c);
            padding-bottom: 50px;

            }
            .back_img h3 {
            color: #fff;
            font-size: 35px;
            margin-bottom: 20px;
            }
            .discounts  {
            text-align: left;
            padding: 10px 30px;
            float: left;
            font-size: 25px;
            font-weight: 700;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0px 0px 5px #fff;
            color: #fff;
            }
            .discounted  {
            box-shadow: 0px 0px 5px #fff;
            color: #fff;
            text-align: right;
            padding: 10px 30px;
            float: right;
            font-size: 25px;
            font-weight: 700;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
            }
            @media (max-width: 768px){
            a.load_more {
            width:100%;
            }
            .looking {
            margin-top: 70px;
            }
            }
            @media (max-width: 767px) and (min-width: 320px){ 
            .discounts {
            float: none;
            text-align: center;
            }
            .discounted {
            float: none;
            text-align: center;
            margin-top: 15px;
            }
            .looking {
            margin-top: 20px;
            }
            .home_sec {
            position: relative;
            margin-top: 15px;
            }
            }
            div#DataTables_Table_1_length {
            display: none;
            }
            div#DataTables_Table_1_filter {
            display: none;
            }
            .panel-table .panel-body{
            padding:0;
            }
            table.dataTable tbody tr {
            background-color: #343a40;
            }
            div#DataTables_Table_0_length {
            display: none;
            }
            div#DataTables_Table_0_filter {
            display: none;
            }
            .panel-table .panel-body .table-bordered{
            border-style: none;
            margin:0;
            }
            a.paginate_button {
            border: 1px solid #c5c5c5 !important;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
            text-align:center;
            width: 100px;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
            .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
            border-right: 0px;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
            .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
            border-left: 0px;
            }
            .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
            border-bottom: 0px;
            }
            .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
            border-top: 0px;
            }
            .panel-table .panel-footer .pagination{
            margin:0; 
            }
            /*
            used to vertically center elements, may need modification if you're not using default sizes.
            */
            .panel-table .panel-footer .col{
            line-height: 34px;
            height: 34px;
            }
            .panel-table .panel-heading .col h3{
            line-height: 30px;
            height: 30px;
            }
            .panel-table .panel-body .table-bordered > tbody > tr > td{
            line-height: 34px;
            }
            ul.pagination.hidden-xs.pull-right li {
            border: 1px solid #dee2e6;
            padding: 2px 20px;
            }
            ul.pagination.hidden-xs.pull-right li a{
            color: #000;
            }
            .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6 !important;
            }
            table.table.table-striped.table-bordered.table-list {
            border: 1px solid #9b9b9b;
            }
            .table-striped tbody tr:nth-of-type(odd) {
            background-color:transparent;
            }
            th.sorting {
            text-align: center;
            }
            table.table.table-striped.table-bordered.table-list {
            border: 0px solid #9b9b9b;
            background: #343a40;
            color: #fff;
            text-align: center;
            }
            .pagination {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: .25rem;
            position: absolute;
            right: 15px;
            top: 15px;
            }
            ul.pagination.hidden-xs.pull-right li.active {
            background: #343a40;
            }
            ul.pagination.hidden-xs.pull-right li.active a {
            color: #fff;
            }
            .dataTables_wrapper .dataTables_info {
                padding-left: 15px;
            }
        </style>
    </head>
    <?php
        $con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');
        $blue_chase = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'BLUE' ORDER BY score DESC, last_click_time ASC");
        $red_chase  = $con->query("Select *, CAST(final_score AS UNSIGNED) AS score from user_submissions WHERE pod_name = 'RED' ORDER BY score DESC, last_click_time ASC");
    ?>
    <body>
        <div class="back_img">
            <div class="looking">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="discounts" onclick="select_pod(1)">
                                <sapn style="color: red;"> Red </sapn>
                                Ball Chase 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="discounted" onclick="select_pod(0)">
                                <sapn style="color: #3fdeff;"> Blue </sapn>
                                Ball Chase 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center"><span style="color:red;"> Red </span> Ball Chase</h3>
                        <div class="panel panel-default panel-table">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-list">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th> Score</th>
                                            <th>Time</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
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
                                            
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center mt-0"><span style="color:#3fdeff;"> Blue </span> Ball Chase</h3>
                        <div class="panel panel-default panel-table">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-list">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th> Score</th>
                                            <th>Time</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
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
                                            
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function select_pod(POD_NAME)
    {
        document.cookie = "POD_NAME="+POD_NAME;
        window.location="game.php";
    }
    
    
    
</script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    /*$('.table').dataTable();*/

$(document).ready(function() {
    $('.table').DataTable( {
        "order": [[ 3, "asc" ]]
    } );
} );


</script>