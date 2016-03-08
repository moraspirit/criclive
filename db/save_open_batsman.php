<?php

session_start();
include '../DBCon.php';

$batsman1 = $_POST['batsman1'];
$batsman2 = $_POST['batsman2'];
$matchid = $_POST['matchid'];
$inning = $_POST['inning'];

$result_inning = mysqli_query($con, "SELECT status FROM inning WHERE matchid='$matchid'");
if ($row = mysqli_fetch_array($result_inning)) {
    $cur_status = $row['status'];
}

if ($cur_status == '0') {
    $result = mysqli_query($con, "UPDATE inning SET status='1' WHERE matchid='$matchid'");
} else if ($cur_status == '*' || $cur_status == '1') {
    $result = mysqli_query($con, "UPDATE inning SET status='2' WHERE matchid='$matchid'");
}

if ($result) {
    $result = mysqli_query($con, "INSERT INTO batsman(matchid,inning,batsman,jersey,status) VALUES
        ('" . $matchid . "','" . $inning . "','Extra','0','0')");
    if ($result) {
        $result = mysqli_query($con, "INSERT INTO batsman(matchid,inning,batsman,jersey,status) VALUES
        ('" . $matchid . "','" . $inning . "','" . explode('#', $batsman1)[0] . "','" . explode('#', $batsman1)[1] . "','1')");
        if ($result) {
            $result = mysqli_query($con, "INSERT INTO batsman(matchid,inning,batsman,jersey,status) VALUES
        ('" . $matchid . "','" . $inning . "','" . explode('#', $batsman2)[0] . "','" . explode('#', $batsman2)[1] . "','2')");
            if ($result) {
                header('location:../score.php');
            } else {
                header('location:../score.php?msg=openerror');
            }
        } else {
            header('location:../score.php?msg=openerror');
        }
    } else {
        header('location:../score.php?msg=openerror');
    }
} else {
    header('location:../score.php?msg=openerror');
}
?>
