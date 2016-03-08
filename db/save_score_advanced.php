<?php

session_start();
include '../DBCon.php';

$matchid = $_GET['matchid'];
$score = $_GET['score'];
$inning = $_GET['inning'];

$cur_score_batsman = '';
$cur_score_bowler = '';
$cur_score_extra = '';
$new_score_batsman = '';
$new_score_bowler = '';
$new_score_extra = '';

$result_batsman = mysqli_query($con, "SELECT score FROM batsman WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
if ($row = mysqli_fetch_array($result_batsman)) {
    $cur_score_batsman = $row['score'];
}

$result_extra = mysqli_query($con, "SELECT score FROM batsman WHERE matchid='$matchid' AND inning='$inning' AND batsman='Extra'");
if ($row = mysqli_fetch_array($result_extra)) {
    $cur_score_extra = $row['score'];
}

$result_bowler = mysqli_query($con, "SELECT score FROM bowler WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
if ($row = mysqli_fetch_array($result_bowler)) {
    $cur_score_bowler = $row['score'];
}

if (strpos($score, ':') !== false) {
    list($extra_score, $extra_type) = explode(':', $score);

    if ($cur_score_batsman == '') {
        $new_score_batsman = $extra_score;
    } else {
        $new_score_batsman = $cur_score_batsman . ' ' . $extra_score;
    }

    if ($cur_score_bowler == '') {
        $new_score_bowler = $extra_score . '' . $extra_type;
    } else {
        $new_score_bowler = $cur_score_bowler . ' ' . $extra_score . '' . $extra_type;
    }

    if ($cur_score_extra == '') {
        $new_score_extra = $extra_type;
    } else {
        $new_score_extra = $cur_score_extra . ' ' . $extra_type;
    }

    $result = mysqli_query($con, "UPDATE batsman SET score='$new_score_extra' WHERE matchid='$matchid' AND inning='$inning' AND batsman='Extra'");
    if ($result) {
        if ($extra_score == '0') {
            $result = mysqli_query($con, "UPDATE bowler SET score='$new_score_bowler' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
            if ($result) {
                header('location:../score.php#score');
            } else {
                header('location:../score.php?msg=scoreerror');
            }
        } else if ($extra_score == '2' || $extra_score == '4' || $extra_score == '6') {
            $result = mysqli_query($con, "UPDATE batsman SET score='$new_score_batsman' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
            if ($result) {
                $result = mysqli_query($con, "UPDATE bowler SET score='$new_score_bowler' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
                if ($result) {
                    header('location:../score.php#score');
                } else {
                    header('location:../score.php?msg=scoreerror');
                }
            } else {
                header('location:../score.php?msg=scoreerror');
            }
        } else if ($extra_score == '1' || $extra_score == '3' || $extra_score == '5' || $extra_score == '7') {
            $result = mysqli_query($con, "UPDATE batsman SET score='$new_score_batsman', status='3' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
            if ($result) {
                $result = mysqli_query($con, "UPDATE bowler SET score='$new_score_bowler' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
                if ($result) {
                    $result = mysqli_query($con, "UPDATE batsman SET status='1' WHERE matchid='$matchid' AND inning='$inning' AND status='2'");
                    if ($result) {
                        $result = mysqli_query($con, "UPDATE batsman SET status='2' WHERE matchid='$matchid' AND inning='$inning' AND status='3'");
                        if ($result) {
                            header('location:../score.php#score');
                        } else {
                            header('location:../score.php?msg=scoreerror');
                        }
                    } else {
                        header('location:../score.php?msg=scoreerror');
                    }
                } else {
                    header('location:../score.php?msg=scoreerror');
                }
            } else {
                header('location:../score.php?msg=scoreerror');
            }
        } else {
            header('location:../score.php#score');
        }
    } else {
        header('location:../score.php?msg=scoreerror');
    }
}
?>