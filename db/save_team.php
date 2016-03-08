<?php

session_start();
include '../DBCon.php';

$date = $_POST['date'];
$type = $_POST['type'];
$at = $_POST['at'];
$team1 = $_POST['team1'];
$team2 = $_POST['team2'];
$umpire1 = $_POST['umpire1'];
$umpire2 = $_POST['umpire2'];
$scorer1 = $_POST['scorer1'];
$scorer2 = $_POST['scorer2'];
$team1player1 = $_POST['team1player1'];
$team1player2 = $_POST['team1player2'];
$team1player3 = $_POST['team1player3'];
$team1player4 = $_POST['team1player4'];
$team1player5 = $_POST['team1player5'];
$team1player6 = $_POST['team1player6'];
$team1player7 = $_POST['team1player7'];
$team1player8 = $_POST['team1player8'];
$team1player9 = $_POST['team1player9'];
$team1player10 = $_POST['team1player10'];
$team1player11 = $_POST['team1player11'];
$team1player12 = $_POST['team1player12'];
$team1player13 = $_POST['team1player13'];
$team1player14 = $_POST['team1player14'];
$team1player15 = $_POST['team1player15'];
$team1jersey1 = $_POST['team1jersey1'];
$team1jersey2 = $_POST['team1jersey2'];
$team1jersey3 = $_POST['team1jersey3'];
$team1jersey4 = $_POST['team1jersey4'];
$team1jersey5 = $_POST['team1jersey5'];
$team1jersey6 = $_POST['team1jersey6'];
$team1jersey7 = $_POST['team1jersey7'];
$team1jersey8 = $_POST['team1jersey8'];
$team1jersey9 = $_POST['team1jersey9'];
$team1jersey10 = $_POST['team1jersey10'];
$team1jersey11 = $_POST['team1jersey11'];
$team1jersey12 = $_POST['team1jersey12'];
$team1jersey13 = $_POST['team1jersey13'];
$team1jersey14 = $_POST['team1jersey14'];
$team1jersey15 = $_POST['team1jersey15'];
$team2player1 = $_POST['team2player1'];
$team2player2 = $_POST['team2player2'];
$team2player3 = $_POST['team2player3'];
$team2player4 = $_POST['team2player4'];
$team2player5 = $_POST['team2player5'];
$team2player6 = $_POST['team2player6'];
$team2player7 = $_POST['team2player7'];
$team2player8 = $_POST['team2player8'];
$team2player9 = $_POST['team2player9'];
$team2player10 = $_POST['team2player10'];
$team2player11 = $_POST['team2player11'];
$team2player12 = $_POST['team2player12'];
$team2player13 = $_POST['team2player13'];
$team2player14 = $_POST['team2player14'];
$team2player15 = $_POST['team2player15'];
$team2jersey1 = $_POST['team2jersey1'];
$team2jersey2 = $_POST['team2jersey2'];
$team2jersey3 = $_POST['team2jersey3'];
$team2jersey4 = $_POST['team2jersey4'];
$team2jersey5 = $_POST['team2jersey5'];
$team2jersey6 = $_POST['team2jersey6'];
$team2jersey7 = $_POST['team2jersey7'];
$team2jersey8 = $_POST['team2jersey8'];
$team2jersey9 = $_POST['team2jersey9'];
$team2jersey10 = $_POST['team2jersey10'];
$team2jersey11 = $_POST['team2jersey11'];
$team2jersey12 = $_POST['team2jersey12'];
$team2jersey13 = $_POST['team2jersey13'];
$team2jersey14 = $_POST['team2jersey14'];
$team2jersey15 = $_POST['team2jersey15'];

$result = mysqli_query($con, "INSERT INTO cricketmatch(date,type,at,team1,team2,umpire1,umpire2,scorer1,scorer2,status) VALUES
        ('" . $date . "','" . $type . "','" . $at . "','" . $team1 . "','" . $team2 . "','" . $umpire1 . "','" . $umpire2 . "',
            '" . $scorer1 . "','" . $scorer2 . "','1')");
if ($result) {
    $result = mysqli_query($con, "SELECT id FROM cricketmatch WHERE status='1' ORDER BY id DESC LIMIT 1");
    if ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        for ($index = 1; $index < 16; $index++) {
            $player = ${"team1player" . $index};
            $jersey = ${"team1jersey" . $index};
            $result = mysqli_query($con, "INSERT INTO player(matchid,team,player,jersey,status) VALUES
            ('" . $id . "','" . $team1 . "','" . $player . "','" . $jersey . "','1')");
            if ($result) {
                
            } else {
                header('location:../register.php?msg=error');
            }
        }
        for ($index = 1; $index < 16; $index++) {
            $player = ${"team2player" . $index};
            $jersey = ${"team2jersey" . $index};
            $result = mysqli_query($con, "INSERT INTO player(matchid,team,player,jersey,status) VALUES
                    ('" . $id . "','" . $team2 . "','" . $player . "','" . $jersey . "','1')");
            if ($result) {
                
            } else {
                header('location:../register.php?msg=error');
            }
        }
        header('location:../score.php');
    } else {
        header('location:../register.php?msg=error');
    }
} else {
    header('location:../register.php?msg=error');
}
?>
