<?php

session_start();
include '../DBCon.php';

$matchid = $_POST['matchid'];
$inning = $_POST['inning'];
$bowler = $_POST['bowler'];
$howout = $_POST['howout'];
$catch = '';
if ($howout == 'catch') {
    $catch = $_POST['catch'];
}
$batsman = $_POST['batsman'];

$cur_score_bowler = '';
$new_score_bowler = '';

//echo $matchid;
//echo '<br>';
//echo $inning;
//echo '<br>';
//echo $bowler;
//echo '<br>';
//echo $howout;
//echo '<br>';
//echo $catch;
//echo '<br>';
//echo $batsman;

if ($howout != 'runoutextra') {
    $result_bowler = mysqli_query($con, "SELECT score FROM bowler WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
    if ($row = mysqli_fetch_array($result_bowler)) {
        $cur_score_bowler = $row['score'];
    }

    if ($cur_score_bowler == '') {
        $new_score_bowler = 'W';
    } else {
        $new_score_bowler = $cur_score_bowler . ' W';
    }

    $result = mysqli_query($con, "UPDATE batsman SET status='0', howout='$howout', catchby='$catch', bowler='$bowler' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
    if ($result) {
        $result = mysqli_query($con, "UPDATE bowler SET score='$new_score_bowler' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
        if ($result) {
            if ($batsman != 'end') {
                $result = mysqli_query($con, "INSERT INTO batsman(matchid,inning,batsman,jersey,status) VALUES
            ('" . $matchid . "','" . $inning . "','" . explode('#', $batsman)[0] . "','" . explode('#', $batsman)[1] . "','1')");
                if ($result) {
                    header('location:../score.php#score');
                } else {
                    header('location:../score.php?msg=wicketerror');
                }
            } else {
                $result = mysqli_query($con, "UPDATE inning SET status='*' WHERE matchid='$matchid' AND status='1'");
                if ($result) {
                    header('location:../score.php#score');
                } else {
                    header('location:../score.php?msg=wicketerror');
                }
            }
        } else {
            header('location:../score.php?msg=wicketerror');
        }
    } else {
        header('location:../score.php?msg=wicketerror');
    }
} else {
    $result = mysqli_query($con, "UPDATE batsman SET status='0', howout='$howout', catchby='$catch', bowler='$bowler' WHERE matchid='$matchid' AND inning='$inning' AND status='1'");
    if ($result) {
        if ($batsman != 'end1' && $batsman != 'end2') {
            $result = mysqli_query($con, "INSERT INTO batsman(matchid,inning,batsman,jersey,status) VALUES
            ('" . $matchid . "','" . $inning . "','" . explode('#', $batsman)[0] . "','" . explode('#', $batsman)[1] . "','1')");
            if ($result) {
                header('location:../score.php#score');
            } else {
                header('location:../score.php?msg=wicketerror');
            }
        } else if ($batsman == 'end1') {
            $result = mysqli_query($con, "UPDATE inning SET status='*' WHERE matchid='$matchid' AND status='1'");
            if ($result) {
                header('location:../score.php#score');
            } else {
                header('location:../score.php?msg=wicketerror');
            }
        } else if ($batsman == 'end2') {
            $result = mysqli_query($con, "UPDATE inning SET status='3' WHERE matchid='$matchid' AND status='2'");
            if ($result) {
                $result = mysqli_query($con, "UPDATE cricketmatch SET status='0' WHERE id='$matchid'");
                if ($result) {
                    session_destroy();
                    header('location:../summary.php');
                } else {
                    header('location:../score.php?msg=finisherror');
                }
            } else {
                header('location:../score.php?msg=finisherror');
            }
        }
    } else {
        header('location:../score.php?msg=wicketerror');
    }
}
?>