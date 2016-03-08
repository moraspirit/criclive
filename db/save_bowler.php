<?php

session_start();
include '../DBCon.php';

$bowler = $_POST['bowler'];
$matchid = $_POST['matchid'];
$inning = $_POST['inning'];

$res = mysqli_query($con, "SELECT bowler FROM bowler WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
//check whether there is a bowler available or not. If there is not that means this is the first over. Else that means this
//is not the first over. So, 2 batsmans should change their strike...
if (mysqli_num_rows($res) == 0) {
    $result = mysqli_query($con, "INSERT INTO bowler(matchid,inning,bowler,jersey,status) VALUES
        ('" . $matchid . "','" . $inning . "','" . explode('#', $bowler)[0] . "','" . explode('#', $bowler)[1] . "','1')");
    if ($result) {
        header('location:../score.php');
    } else {
        header('location:../score.php?msg=bowlererror');
    }
} else {
    $cur_score_batsman_1 = '';
    $cur_score_batsman_2 = '';

    $result_batsman_1 = mysqli_query($con, "SELECT score FROM batsman WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
    if ($row = mysqli_fetch_array($result_batsman_1)) {
        $cur_score_batsman_1 = $row['score'];
    }

    $result_batsman_2 = mysqli_query($con, "SELECT score FROM batsman WHERE matchid='$matchid' AND inning='$inning' AND status='2'");
    if ($row = mysqli_fetch_array($result_batsman_2)) {
        $cur_score_batsman_2 = $row['score'];
    }

    $new_score_batsman_1 = $cur_score_batsman_1 . ' | ';
    $new_score_batsman_2 = $cur_score_batsman_2 . ' | ';

    $result = mysqli_query($con, "UPDATE bowler SET status='2' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
    if ($result) {
        $result = mysqli_query($con, "INSERT INTO bowler(matchid,inning,bowler,jersey,status) VALUES
        ('" . $matchid . "','" . $inning . "','" . explode('#', $bowler)[0] . "','" . explode('#', $bowler)[1] . "','1')");
        if ($result) {
            $result = mysqli_query($con, "UPDATE batsman SET status='3', score='$new_score_batsman_2' WHERE matchid='$matchid' AND inning='$inning' AND status='2'");
            if ($result) {
                $result = mysqli_query($con, "UPDATE batsman SET status='2', score='$new_score_batsman_1' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
                if ($result) {
                    $result = mysqli_query($con, "UPDATE batsman SET status='1' WHERE matchid='$matchid' AND inning='$inning' AND status='3'");
                    if ($result) {
                        header('location:../score.php#score');
                    } else {
                        header('location:../score.php?msg=bowlererror');
                    }
                } else {
                    header('location:../score.php?msg=bowlererror');
                }
            } else {
                header('location:../score.php?msg=bowlererror');
            }
        } else {
            header('location:../score.php?msg=bowlererror');
        }
    } else {
        header('location:../score.php?msg=bowlererror');
    }
}
?>
