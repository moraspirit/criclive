<?php

session_start();
include '../DBCon.php';

$matchid = $_POST['matchid'];
$score = $_POST['score'];
$over = $_POST['over'];

$result = mysqli_query($con, "UPDATE cricketmatch SET targetscore='$score', targetover='$over' WHERE id='$matchid' AND status='1'");
if ($result) {
    header('location:../score.php#score');
} else {
    header('location:../score.php?msg=targetchangeerror');
}
?>
