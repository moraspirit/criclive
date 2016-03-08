<?php

session_start();
include '../DBCon.php';

$matchid = $_POST['matchid'];
$inning = $_POST['inning'];

$result = mysqli_query($con, "DELETE FROM bowler WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
if ($result) {
    header('location:../score.php#score');
} else {
    header('location:../score.php?msg=cancelovererror');
}
?>