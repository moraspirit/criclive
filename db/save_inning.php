<?php

session_start();
include '../DBCon.php';

$bat1 = $_POST['bat1'];
//$ball1 = $_POST['ball1'];
$bat2 = $_POST['bat2'];
//$ball2 = $_POST['ball2'];

$id = '';
$team1 = '';
$team2 = '';
$result = mysqli_query($con, "SELECT id, team1, team2 FROM cricketmatch WHERE status='1' ORDER BY id DESC LIMIT 1");
if ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $team1 = $row['team1'];
    $team2 = $row['team2'];
}

if ($bat1 == '1') {
    $result = mysqli_query($con, "INSERT INTO inning(matchid,inning1,inning2,status) VALUES
        ('" . $id . "','" . $team1 . "','" . $team2 . "','0')");
    if ($result) {
        header('location:../score.php');
    } else {
        header('location:../score.php?msg=error');
    }
} else if ($bat1 == '2') {
    $result = mysqli_query($con, "INSERT INTO inning(matchid,inning1,inning2,status) VALUES
        ('" . $id . "','" . $team2 . "','" . $team1 . "','0')");
    if ($result) {
        header('location:../score.php');
    } else {
        header('location:../score.php?msg=error');
    }
}
?>