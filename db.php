<?php
if($_SERVER['SERVER_NAME'] == 'game.blazepoduk.com') {
    $con = new mysqli('localhost', 'root', 'Redhat123?tombigbee', 'blazepod_game');
} else {
    $con = new mysqli('localhost', 'stageofp_blazepod', '2WJD=j))0SdK', 'stageofp_game');
}
?>