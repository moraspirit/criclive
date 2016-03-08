<?php

session_start();
include '../DBCon.php';

$matchid = $_GET['matchid'];

if ($matchid != '') {
    $result = mysqli_query($con, "UPDATE batsman SET status='3' WHERE matchid='$matchid' AND status='2'");
    if ($result) {
        $result = mysqli_query($con, "UPDATE batsman SET status='2' WHERE matchid='$matchid' AND status='1'");
        if ($result) {
            $result = mysqli_query($con, "UPDATE batsman SET status='1' WHERE matchid='$matchid' AND status='3'");
            if ($result) {
                header('location:../score.php#score');
            } else {
                header('location:../score.php?msg=shuffleerror');
            }
        } else {
            header('location:../score.php?msg=shuffleerror');
        }
    } else {
        header('location:../score.php?msg=shuffleerror');
    }
} else {
    header('location:../score.php#score');
}
?>