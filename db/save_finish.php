<?php

session_start();
include '../DBCon.php';

$matchid = $_POST['matchid'];

$result = mysqli_query($con, "UPDATE inning SET status='3' WHERE matchid='$matchid'");
if ($result) {
    $result = mysqli_query($con, "UPDATE cricketmatch SET status='0' WHERE id='$matchid'");
    if ($result) {
        session_destroy();
        header('location:../summary.php');
    } else {
        header('location:../score.php?msg=finisherror');
    }
}
?>
