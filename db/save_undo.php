<?php

session_start();
include '../DBCon.php';

$matchid = $_POST['matchid'];
$inning = $_POST['inning'];

$batsmanScore = $_POST['batsmanScore'];
$extraScore = $_POST['extraScore'];
$bowlerScore = $_POST['bowlerScore'];

$result = mysqli_query($con, "UPDATE batsman SET score='$batsmanScore' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
if ($result) {
    $result = mysqli_query($con, "UPDATE batsman SET score='$extraScore' WHERE matchid='$matchid' AND inning='$inning' AND batsman='Extra'");
    if ($result) {
        $result = mysqli_query($con, "UPDATE bowler SET score='$bowlerScore' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
        if ($result) {
            header('location:../score.php#score');
        } else {
            header('location:../score.php?msg=undoerror');
        }
    } else {
        header('location:../score.php?msg=undoerror');
    }
} else {
    header('location:../score.php?msg=undoerror');
}
?>
