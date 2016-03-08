<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
error_reporting(0);
?>

<!--
Author :
Chanaka Lakmal
ldclakmal@gmail.com
https://lk.linkedin.com/in/chanakalakmal
@MoraSpirit
-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="www.moraspirit.com"/>
        <meta name="author" content="Chanaka Lakmal"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="refresh" content="20">
        <title>MoraSpirit | CricLive</title>
        <link rel="shortcut icon" href="img/moraspirit_logo.png">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">-->
    </head>
    <body style="padding-top: 70px;">

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <?php include './header.php'; ?>

        <div class="container">

            <?php
            if ($_GET != NULL) {
                $id = $_GET["id"];
                include './DBCon.php';
                $result = mysqli_query($con, "SELECT * FROM cricketmatch WHERE id='$id'");
                if ($row = mysqli_fetch_array($result)) {
                    $date = $row['date'];
                    $type = $row['type'];
                    $at = $row['at'];
                    $team1 = $row['team1'];
                    $team2 = $row['team2'];
                    $umpire1 = $row['umpire1'];
                    $umpire2 = $row['umpire2'];
                    $scorer1 = $row['scorer1'];
                    $scorer2 = $row['scorer2'];
                    $cricketmatch_status = $row['status'];
                    $targetscore = $row['targetscore'];
                    $targetover = $row['targetover'];

                    $type_ = '';
                    $at_ = '';

                    if ($type == 'test') {
                        $type_ = 'Test Match';
                    } else {
                        $type_ = 'One Day Match';
                    }

                    $university = array("cmb" => "University of Colombo", "pera" => "University of Peradeniya",
                        "jpura" => "University of Sri Jayawardenepura", "kel" => "University of Kelaniya",
                        "mora" => "University of Moratuwa", "jaff" => "University of Jaffna",
                        "ruh" => "University of Ruhuna", "ousl" => "The Open University of Sri Lanka",
                        "eusl" => "Eastern University of Sri Lanka", "seusl" => "South Eastern University of Sri Lanka",
                        "rusl" => "Rajarata University of Sri Lanka", "susl" => "Sabaragamuwa University of Sri Lanka",
                        "wusl" => "Wayamba University of Sri Lanka", "uwu" => "Uva Wellassa University",
                        "uvpa" => "University of the Visual & Performing Arts");
                }

                $res = mysqli_query($con, "SELECT * FROM inning ORDER BY id DESC LIMIT 1");
                if ($row = mysqli_fetch_array($res)) {
                    $inning1 = $row['inning1'];
                    $inning2 = $row['inning2'];
                    $status = $row['status'];
                }
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p><strong>Match Type :</strong> <?php echo $type_; ?></p>
                        <p><strong>Teams :</strong> <?php echo $university[$team1]; ?> vs. <?php echo $university[$team2]; ?></p>
                        <p><strong>Umpires :</strong> <?php echo $umpire1; ?> and <?php echo $umpire2; ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p><strong>Date :</strong> <?php echo $date; ?></p>
                        <p><strong>Place :</strong> <?php echo $university[$at]; ?></p>
                        <p><strong>Scorers :</strong> <?php echo $scorer1; ?> and <?php echo $scorer2; ?></p>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <hr>
                </div>

                <?php
                $inning1Scores = 0;
                $inning1Wickets = 0;
                $inning1Overs = 0;
                $inning1Balls = 0;
                $inning2Scores = 0;
                $inning2Wickets = 0;
                $inning2Overs = 0;
                $inning2Balls = 0;

                //--------------------------Inning 1 Summary----------------------------------------------
                $countOvers = 0;
                $scoreFinal = 0;
                $countWickets = 0;

                $res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning1'");
                while ($row = mysqli_fetch_array($res)) {
                    $countBalls = 0;
                    $temp = $row['status'];
                    $score = $row['score'];
                    if ($temp != '1') {
                        $countOvers++;
                    } else {
                        $scoreArray = explode(' ', $score);
                        $sizeArray = count($scoreArray);

                        for ($x = 0; $x < $sizeArray; $x++) {
                            if (is_numeric($scoreArray[$x]) || $scoreArray[$x] == 'W') {
                                $countBalls++;
                            }
                        }
                    }
                }

                $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning1'");
                while ($row = mysqli_fetch_array($res)) {
                    $score = $row['score'];
                    $batsman = $row['batsman'];
                    $batsman_status = $row['status'];
                    if ($batsman != 'Extra') {
                        $scoreArray = explode(' ', $score);
                        $sizeArray = count($scoreArray);
                        $scoreTotal = array_sum($scoreArray);

                        $scoreFinal += $scoreTotal;

                        if ($batsman_status == '0') {
                            $countWickets++;
                        }
                    } else {
                        $sizeExtraArray = 0;
                        $extraScore = 0;
                        if ($score != '') {
                            $extraArray = explode(' ', $score);
                            $sizeExtraArray = count($extraArray);
                            for ($x = 0; $x < $sizeExtraArray; $x++) {
                                if (strlen($extraArray[$x]) == 3) {
                                    $extra = substr($extraArray[$x], 0, 1);
                                    $extra_type = substr($extraArray[$x], 1, 3);
                                    if ($extra == 0) {
                                        $extra = 1;
                                    } else {
                                        if ($extra_type == 'wd' || $extra_type == 'nb') {
                                            $extraScore++;
                                        }
                                    }
                                    $extraScore += $extra;
//                                    $extraScore++;
                                } else {
                                    $extraScore++;
                                }
                            }
                        }
                        $scoreFinal += $extraScore;
                    }
                }

                $inning1Scores = $scoreFinal;
                $inning1Wickets = $countWickets;
                $inning1Overs = $countOvers;
                $inning1Balls = $countBalls;

                //--------------------------Inning 2 Summary----------------------------------------------
                $countOvers = 0;
                $scoreFinal = 0;
                $countWickets = 0;

                $res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning2'");
                while ($row = mysqli_fetch_array($res)) {
                    $countBalls = 0;
                    $temp = $row['status'];
                    $score = $row['score'];
                    if ($temp != '1') {
                        $countOvers++;
                    } else {
                        $scoreArray = explode(' ', $score);
                        $sizeArray = count($scoreArray);

                        for ($x = 0; $x < $sizeArray; $x++) {
                            if (is_numeric($scoreArray[$x]) || $scoreArray[$x] == 'W') {
                                $countBalls++;
                            }
                        }
                    }
                }

                $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning2'");
                while ($row = mysqli_fetch_array($res)) {
                    $score = $row['score'];
                    $batsman = $row['batsman'];
                    $batsman_status = $row['status'];
                    if ($batsman != 'Extra') {
                        $scoreArray = explode(' ', $score);
                        $sizeArray = count($scoreArray);
                        $scoreTotal = array_sum($scoreArray);

                        $scoreFinal += $scoreTotal;

                        if ($batsman_status == '0') {
                            $countWickets++;
                        }
                    } else {
                        $sizeExtraArray = 0;
                        $extraScore = 0;
                        if ($score != '') {
                            $extraArray = explode(' ', $score);
                            $sizeExtraArray = count($extraArray);
                            for ($x = 0; $x < $sizeExtraArray; $x++) {
                                if (strlen($extraArray[$x]) == 3) {
                                    $extra = substr($extraArray[$x], 0, 1);
                                    $extra_type = substr($extraArray[$x], 1, 3);
                                    if ($extra == 0) {
                                        $extra = 1;
                                    } else {
                                        if ($extra_type == 'wd' || $extra_type == 'nb') {
                                            $extraScore++;
                                        }
                                    }
                                    $extraScore += $extra;
//                                    $extraScore++;
                                } else {
                                    $extraScore++;
                                }
                            }
                        }
                        $scoreFinal += $extraScore;
                    }
                }

                $inning2Scores = $scoreFinal;
                $inning2Wickets = $countWickets;
                $inning2Overs = $countOvers;
                $inning2Balls = $countBalls;
                ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="summary_scoresheet">
                    <!--<div class="col-md-1"></div>-->
                    <div class="col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="col-xs-8 col-sm-8 col-md-8" style="text-align: left;">
                                <h4 class="text-primary"><?php echo $university[$inning1]; ?></h4>
                                <?php if ($inning1Wickets == '10') { ?>
                                    <h1 style="font-size: 60px; margin-top: 0px;"><?php echo $inning1Scores; ?></h1>
                                <?php } else { ?>
                                    <h1 style="font-size: 60px; margin-top: 0px;"><?php echo $inning1Scores; ?>/<?php echo $inning1Wickets; ?></h1>
                                <?php } ?>
                                <?php if ($inning1Balls == 6) { ?>
                                    <h3 style="margin-top: 0px;"><?php echo $inning1Overs + 1 ?> overs</h3>
                                <?php } else { ?>
                                    <h3 style="margin-top: 0px;"><?php echo $inning1Overs . '.' . $inning1Balls; ?> overs</h3>
                                <?php } ?>
                                <?php
                                $inning1RR = number_format(($inning1Scores / ($inning1Overs * 6 + $inning1Balls)) * 6, 2, '.', '');
                                ?>
                                <h5 class="text-primary"><strong>RR <?php echo $inning1RR; ?></strong></h5>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4" style="text-align: right;">
                                <span style="display: inline-block; height: 100%; vertical-align: middle;"></span><img class="img-responsive" src="img/university/<?php echo $inning1; ?>.png" height="130" style="vertical-align: middle;"/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="col-xs-4 col-sm-4 col-md-4" style="text-align: left;">
                                <span style="display: inline-block; height: 100%; vertical-align: middle;"></span><img class="img-responsive" src="img/university/<?php echo $inning2; ?>.png" height="130" style="vertical-align: middle;"/>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8" style="text-align: right;">
                                <h4 class="text-primary"><?php echo $university[$inning2]; ?></h4>
                                <?php if ($status == '1' || $status == '*') { ?>
                                    <h1 style="font-size: 60px; margin-top: 0px;">---/-</h1>
                                    <h3 style="margin-top: 0px;">--</h3>
                                <?php } else { ?>
                                    <?php if ($inning2Wickets == '10') { ?>
                                        <h1 style="font-size: 60px; margin-top: 0px;"><?php echo $inning2Scores; ?></h1>
                                    <?php } else { ?>
                                        <h1 style="font-size: 60px; margin-top: 0px;"><?php echo $inning2Scores; ?>/<?php echo $inning2Wickets; ?></h1>
                                    <?php } ?>

                                    <?php if ($inning2Balls == 6) { ?>
                                        <h3 style="margin-top: 0px;"><?php echo $inning2Overs + 1 ?> overs</h3>
                                    <?php } else { ?>
                                        <h3 style="margin-top: 0px;"><?php echo $inning2Overs . '.' . $inning2Balls; ?> overs</h3>
                                    <?php } ?>

                <!--<h3 style="margin-top: 0px;"><?php // echo $inning2Overs . '.' . $inning2Balls;   ?> overs</h3>-->
                                    <?php
                                    $inning2RR = number_format(($inning2Scores / ($inning2Overs * 6 + $inning2Balls)) * 6, 2, '.', '');
                                    if ($status != 3) {
                                        if ($targetscore != '') {
                                            $inning1Scores = $targetscore;
                                        }
                                        if ($targetover == '') {
                                            $targetover = 50;
                                        }
                                        $inning2RRR = number_format(($inning1Scores - $inning2Scores) / ($targetover * 6 - (($inning2Overs - 1) * 6 + (6 - $inning2Balls))) * 6, 2, '.', '');
                                        ?>
                                        <h5 class="text-primary"><strong>RR <?php echo $inning2RR; ?> | RRR <?php echo $inning2RRR; ?></strong></h5>
                                    <?php } else { ?>
                                        <h5 class="text-primary"><strong>RR <?php echo $inning2RR; ?></strong></h5>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-1"></div>-->
                </div>

                <?php if ($cricketmatch_status == '0') { ?>            
                    <div class="col-md-12 text-center" style="margin-bottom: 0px;">
                        <?php if ($inning2Scores > $inning1Scores) { ?>
                            <h1 class="text-primary label label-danger"><strong><?php echo $university[$inning2]; ?> won by <?php echo 10 - $inning2Wickets; ?> wickets</strong></h1>
                        <?php } else if ($inning2Scores < $inning1Scores) { ?>
                            <h1 class="text-primary label label-danger"><strong><?php echo $university[$inning1]; ?> won by <?php echo $inning1Scores - $inning2Scores; ?> runs</strong></h1>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <hr>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <!-- ----------------------------------------------1st Innings------------------------------------- -->

                        <div class="panel panel-danger">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <!--<p class="lead">-->
                                        <strong>1<sup>st</sup> Innings : &nbsp;</strong>
                                        <img src="img/bat.png" style="height: 20px;"/> <?php echo $university[$inning1]; ?> &nbsp;|&nbsp; 
                                        <img src="img/ball.png" style="height: 20px;"/> <?php echo $university[$inning2]; ?>
                                        <!--</p>-->
                                    </a>
                                </h4>
                            </div>
                            <?php if ($status == '1' || $status == '3') { ?>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <?php } else { ?>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <?php } ?>
                                    <div class="panel-body">
                                        <div class="col-sm-12 col-md-7">
                                            <table class="table" style="margin-top: 15px; font-size: 12px;">
                                                <thead>
                                                    <tr class="bg-info">
                                                        <th style="text-align: left;"><?php echo $university[$inning1]; ?></th>
                                                        <th style="text-align: right;"></th>
                                                        <th style="text-align: right;">R</th>
                                                        <th style="text-align: right;">B</th>
                                                        <th style="text-align: right;">4's</th>
                                                        <th style="text-align: right;">6's</th>
                                                        <th style="text-align: right;">SR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $scoreFinal = 0;
                                                    $ballsFinal = 0;
                                                    $count4Final = 0;
                                                    $count6Final = 0;
                                                    $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning1'");
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        $batsman = $row['batsman'];
                                                        $score = $row['score'];
                                                        $howout = $row['howout'];
                                                        $catchby = $row['catchby'];
                                                        $catchbyArray = explode('#', $catchby);
                                                        $bowler = $row['bowler'];
                                                        $bowlerArray = explode('#', $bowler);
                                                        $batsman_status = $row['status'];
                                                        if ($batsman != 'Extra') {
                                                            if ($batsman_status == '1') {
                                                                ?>
                                                                <tr class="active" style="font-weight: bold;">
                                                                <?php } elseif ($batsman_status == '2') { ?>
                                                                <tr class="active">             
                                                                <?php } else { ?>
                                                                <tr>
                                                                <?php } ?>
                                                                <td><?php echo $batsman; ?></td>
                                                                <?php if ($howout == 'catch') { ?>
                                                                    <td><span class="label label-danger">catch</span> <?php echo $catchbyArray[0]; ?> <strong>b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                <?php } else if ($howout == 'lbw') { ?>
                                                                    <td><span class="label label-danger">lbw</span><strong> b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                <?php } else if ($howout == 'runout') { ?>
                                                                    <td><span class="label label-danger">runout</span><strong> b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                <?php } else if ($howout == 'wicket') { ?>
                                                                    <td><span class="label label-danger">wicket</span><strong> b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                <?php } else { ?>
                                                                    <td></td>
                                                                <?php } ?>

                                                                <?php
                                                                $scoreArray = explode(' ', $score);
                                                                $sizeArray = count($scoreArray);
                                                                $scoreTotal = array_sum($scoreArray);
                                                                $countBalls = 0;
                                                                $count4s = 0;
                                                                $count6s = 0;
                                                                for ($x = 0; $x < $sizeArray; $x++) {
                                                                    if (is_numeric($scoreArray[$x])) {
                                                                        $countBalls++;
                                                                        if ($scoreArray[$x] == '4') {
                                                                            $count4s++;
                                                                        } else if ($scoreArray[$x] == '6') {
                                                                            $count6s++;
                                                                        }
                                                                    }
                                                                }
                                                                if ($batsman_status == '0') {
                                                                    $countBalls++;
                                                                }
                                                                $SR = number_format(($scoreTotal * 100 / $countBalls), 2, '.', '');
                                                                $scoreFinal += $scoreTotal;
                                                                $ballsFinal += $countBalls;
                                                                $count4Final += $count4s;
                                                                $count6Final += $count6s;
                                                                ?>
                                                                <td style="text-align: right;"><b><?php echo $scoreTotal; ?></b></td>
                                                                <td style="text-align: right;"><?php echo $countBalls; ?></td>
                                                                <td style="text-align: right;"><?php echo $count4s; ?></td>
                                                                <td style="text-align: right;"><?php echo $count6s; ?></td>
                                                                <td style="text-align: right;"><?php echo $SR; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND batsman='Extra' AND inning='$inning1'");
                                                    if ($row = mysqli_fetch_array($res)) {
                                                        $score = $row['score'];
                                                        $sizeExtraArray = 0;
                                                        $extraScore = 0;
                                                        if ($score != '') {
                                                            $extraArray = explode(' ', $score);
                                                            $sizeExtraArray = count($extraArray);

                                                            for ($x = 0; $x < $sizeExtraArray; $x++) {
                                                                if (strlen($extraArray[$x]) == 3) {
                                                                    $extra = substr($extraArray[$x], 0, 1);
                                                                    $extra_type = substr($extraArray[$x], 1, 3);
                                                                    if ($extra == 0) {
                                                                        $extra = 1;
                                                                    } else {
                                                                        if ($extra_type == 'wd' || $extra_type == 'nb') {
                                                                            $extraScore++;
                                                                        }
                                                                    }
                                                                    $extraScore += $extra;
                                                                } else {
                                                                    $extraScore++;
                                                                }
                                                            }
                                                        }
                                                        $scoreFinal += $extraScore;
                                                        ?>
                                                        <tr>
                                                            <td><b>Extras</b></td>
                                                            <td></td>
                                                            <td style="text-align: right;"><b><?php echo $extraScore; ?></b></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr class="bg-primary">
                                                        <td><b>Total</b></td>
                                                        <td></td>
                                                        <td style="text-align: right;"><b><?php echo $scoreFinal; ?></b></td>
                                                        <td style="text-align: right;"><?php echo $ballsFinal; ?></td>
                                                        <td style="text-align: right;"><?php echo $count4Final; ?></td>
                                                        <td style="text-align: right;"><?php echo $count6Final; ?></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>

                                        <div class="col-sm-12 col-md-5">
                                            <table class="table" style="margin-top: 15px; font-size: 12px;">
                                                <thead>
                                                    <tr class="bg-info">
                                                        <th>Bowling</th>
                                                        <th>O</th>
                                                        <th style="text-align: right;">M</th>
                                                        <th style="text-align: right;">R</th>
                                                        <th style="text-align: right;">W</th>
                                                        <th style="text-align: right;">0's</th>
                                                        <th style="text-align: right;">4's</th>
                                                        <th style="text-align: right;">6's</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning1' GROUP BY bowler");
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        $bowler = $row['bowler'];
                                                        $inner_res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND bowler='$bowler' AND inning='$inning1'");
                                                        $overs = 0;
                                                        $runs = 0;
                                                        $scoreTotal = 0;
                                                        $countWickets = 0;
                                                        $count0s = 0;
                                                        $count4s = 0;
                                                        $count6s = 0;
                                                        $countMaidens = 0;

                                                        while ($row = mysqli_fetch_array($inner_res)) {
                                                            $bowler_status = $row['status'];
                                                            $score = $row['score'];
                                                            $overs++;

                                                            $scoreArray = explode(' ', $score);
                                                            $sizeArray = count($scoreArray);
                                                            $scoreTotal += array_sum($scoreArray);

                                                            $countBalls = 0;

                                                            if ($score == '0 0 0 0 0 0') {
                                                                $countMaidens++;
                                                            }

                                                            for ($x = 0; $x < $sizeArray; $x++) {
                                                                if ($scoreArray[$x] == 'W') {
                                                                    $countBalls++;
                                                                    $countWickets++;
                                                                }
                                                                if (is_numeric($scoreArray[$x])) {
                                                                    $countBalls++;
                                                                    if ($scoreArray[$x] == '0') {
                                                                        $count0s++;
                                                                    } else if ($scoreArray[$x] == '4') {
                                                                        $count4s++;
                                                                    } else if ($scoreArray[$x] == '6') {
                                                                        $count6s++;
                                                                    }
                                                                } else if (strlen($scoreArray[$x]) == 3) {
                                                                    $extra = substr($scoreArray[$x], 0, 1);
                                                                    $scoreTotal += $extra;
                                                                    if ($extra == '4') {
                                                                        $count4s++;
                                                                    } else if ($extra == '6') {
                                                                        $count6s++;
                                                                    }
                                                                }
                                                            }
                                                        }


                                                        if ($bowler_status == '1') {
                                                            ?>
                                                            <tr class="active">
                                                            <?php } else { ?>
                                                            <tr>
                                                            <?php } ?>
                                                            <td><?php echo $bowler; ?></td>
                                                            <?php
                                                            if ($bowler_status == '1') {
                                                                $overs--;
                                                                $overs = $overs . '<b>.</b>' . $countBalls;
                                                            }
                                                            ?>
                                                            <td style="text-align: left;"><?php echo $overs; ?></td>
                                                            <td style="text-align: right;"><?php echo $countMaidens; ?></td>
                                                            <td style="text-align: right;"><?php echo $scoreTotal; ?></td>
                                                            <td style="text-align: right;"><?php echo $countWickets; ?></td>
                                                            <td style="text-align: right;"><?php echo $count0s; ?></td>
                                                            <td style="text-align: right;"><?php echo $count4s; ?></td>
                                                            <td style="text-align: right;"><?php echo $count6s; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                    <?php if ($status == '1') { ?>
                                    </div>
                                <?php } else { ?>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- ----------------------------------------------2nd Innings------------------------------------- -->

                        <?php if ($status == '2' || $status == '3') { ?>
                            <div class="panel panel-danger">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a style="text-decoration: none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <!--<p class="lead">-->
                                            <strong>2<sup>nd</sup> Innings : &nbsp;</strong>
                                            <img src="img/bat.png" style="height: 20px;"/> <?php echo $university[$inning2]; ?> &nbsp;|&nbsp; 
                                            <img src="img/ball.png" style="height: 20px;"/> <?php echo $university[$inning1]; ?>
                                            <!--</p>-->
                                        </a>
                                    </h4>
                                </div>
                                <?php if ($status == '2' || $status == '3') { ?>
                                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <?php } else { ?>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <?php } ?>
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-12 col-md-7">
                                                <table class="table" style="margin-top: 15px; font-size: 12px;">
                                                    <thead>
                                                        <tr class="bg-info">
                                                            <th style="text-align: left;"><?php echo $university[$inning2]; ?></th>
                                                            <th style="text-align: right;"></th>
                                                            <th style="text-align: right;">R</th>
                                                            <th style="text-align: right;">B</th>
                                                            <th style="text-align: right;">4's</th>
                                                            <th style="text-align: right;">6's</th>
                                                            <th style="text-align: right;">SR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $scoreFinal = 0;
                                                        $ballsFinal = 0;
                                                        $count4Final = 0;
                                                        $count6Final = 0;
                                                        $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning2'");
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            $batsman = $row['batsman'];
                                                            $score = $row['score'];
                                                            $howout = $row['howout'];
                                                            $catchby = $row['catchby'];
                                                            $catchbyArray = explode('#', $catchby);
                                                            $bowler = $row['bowler'];
                                                            $bowlerArray = explode('#', $bowler);
                                                            $batsman_status = $row['status'];
                                                            if ($batsman != 'Extra') {
                                                                if ($batsman_status == '1') {
                                                                    ?>
                                                                    <tr class="active" style="font-weight: bold;">
                                                                    <?php } elseif ($batsman_status == '2') { ?>
                                                                    <tr class="active">             
                                                                    <?php } else { ?>
                                                                    <tr>
                                                                    <?php } ?>
                                                                    <td><?php echo $batsman; ?></td>
                                                                    <?php
                                                                    if ($howout == 'catch') {
                                                                        ?>
                                                                        <td><span class="label label-danger">catch</span> <?php echo $catchbyArray[0]; ?> <strong>b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                    <?php } else if ($howout == 'lbw') { ?>
                                                                        <td><span class="label label-danger">lbw</span><strong> b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                    <?php } else if ($howout == 'runout') { ?>
                                                                        <td><span class="label label-danger">runout</span><strong> b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                    <?php } else if ($howout == 'wicket') { ?>
                                                                        <td><span class="label label-danger">wicket</span><strong> b</strong> <?php echo $bowlerArray[0]; ?></td>
                                                                    <?php } else { ?>
                                                                        <td></td>
                                                                    <?php } ?>

                                                                    <?php
                                                                    $scoreArray = explode(' ', $score);
                                                                    $sizeArray = count($scoreArray);
                                                                    $scoreTotal = array_sum($scoreArray);
                                                                    $countBalls = 0;
                                                                    $count4s = 0;
                                                                    $count6s = 0;
                                                                    for ($x = 0; $x < $sizeArray; $x++) {
                                                                        if (is_numeric($scoreArray[$x])) {
                                                                            $countBalls++;
                                                                            if ($scoreArray[$x] == '4') {
                                                                                $count4s++;
                                                                            } else if ($scoreArray[$x] == '6') {
                                                                                $count6s++;
                                                                            }
                                                                        }
                                                                    }
                                                                    if ($batsman_status == '0') {
                                                                        $countBalls++;
                                                                    }
                                                                    $SR = number_format(($scoreTotal * 100 / $countBalls), 2, '.', '');
                                                                    $scoreFinal += $scoreTotal;
                                                                    $ballsFinal += $countBalls;
                                                                    $count4Final += $count4s;
                                                                    $count6Final += $count6s;
                                                                    ?>
                                                                    <td style="text-align: right;"><b><?php echo $scoreTotal; ?></b></td>
                                                                    <td style="text-align: right;"><?php echo $countBalls; ?></td>
                                                                    <td style="text-align: right;"><?php echo $count4s; ?></td>
                                                                    <td style="text-align: right;"><?php echo $count6s; ?></td>
                                                                    <td style="text-align: right;"><?php echo $SR; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND batsman='Extra' AND inning='$inning2'");
                                                        if ($row = mysqli_fetch_array($res)) {
                                                            $score = $row['score'];
                                                            $sizeExtraArray = 0;
                                                            $extraScore = 0;
                                                            if ($score != '') {
                                                                $extraArray = explode(' ', $score);
                                                                $sizeExtraArray = count($extraArray);
                                                                for ($x = 0; $x < $sizeExtraArray; $x++) {
                                                                    if (strlen($extraArray[$x]) == 3) {
                                                                        $extra = substr($extraArray[$x], 0, 1);
                                                                        $extra_type = substr($extraArray[$x], 1, 3);
                                                                        if ($extra == 0) {
                                                                            $extra = 1;
                                                                        } else {
                                                                            if ($extra_type == 'wd' || $extra_type == 'nb') {
                                                                                $extraScore++;
                                                                            }
                                                                        }
                                                                        $extraScore += $extra;
                                                                    } else {
                                                                        $extraScore++;
                                                                    }
                                                                }
                                                            }
                                                            $scoreFinal += $extraScore;
                                                            ?>
                                                            <tr>
                                                                <td><b>Extras</b></td>
                                                                <td></td>
                                                                <td style="text-align: right;"><b><?php echo $extraScore; ?></b></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <tr class="bg-primary">
                                                            <td><b>Total</b></td>
                                                            <td></td>
                                                            <td style="text-align: right;"><b><?php echo $scoreFinal; ?></b></td>
                                                            <td style="text-align: right;"><?php echo $ballsFinal; ?></td>
                                                            <td style="text-align: right;"><?php echo $count4Final; ?></td>
                                                            <td style="text-align: right;"><?php echo $count6Final; ?></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>

                                            <div class="col-sm-12 col-md-5">
                                                <table class="table" style="margin-top: 15px; font-size: 12px;">
                                                    <thead>
                                                        <tr class="bg-info">
                                                            <th>Bowling</th>
                                                            <th>O</th>
                                                            <th style="text-align: right;">M</th>
                                                            <th style="text-align: right;">R</th>
                                                            <th style="text-align: right;">W</th>
                                                            <th style="text-align: right;">0's</th>
                                                            <th style="text-align: right;">4's</th>
                                                            <th style="text-align: right;">6's</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning2' GROUP BY bowler");
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            $bowler = $row['bowler'];
                                                            $inner_res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND bowler='$bowler' AND inning='$inning2'");
                                                            $overs = 0;
                                                            $runs = 0;
                                                            $scoreTotal = 0;
                                                            $countWickets = 0;
                                                            $count0s = 0;
                                                            $count4s = 0;
                                                            $count6s = 0;
                                                            $countMaidens = 0;

                                                            while ($row = mysqli_fetch_array($inner_res)) {
                                                                $bowler_status = $row['status'];
                                                                $score = $row['score'];
                                                                $overs++;

                                                                $scoreArray = explode(' ', $score);
                                                                $sizeArray = count($scoreArray);
                                                                $scoreTotal += array_sum($scoreArray);

                                                                $countBalls = 0;

                                                                if ($score == '0 0 0 0 0 0') {
                                                                    $countMaidens++;
                                                                }

                                                                for ($x = 0; $x < $sizeArray; $x++) {
                                                                    if ($scoreArray[$x] == 'W') {
                                                                        $countBalls++;
                                                                        $countWickets++;
                                                                    }
                                                                    if (is_numeric($scoreArray[$x])) {
                                                                        $countBalls++;
                                                                        if ($scoreArray[$x] == '0') {
                                                                            $count0s++;
                                                                        } else if ($scoreArray[$x] == '4') {
                                                                            $count4s++;
                                                                        } else if ($scoreArray[$x] == '6') {
                                                                            $count6s++;
                                                                        }
                                                                    } else if (strlen($scoreArray[$x]) == 3) {
                                                                        $extra = substr($scoreArray[$x], 0, 1);
                                                                        $scoreTotal += $extra;
                                                                        if ($extra == '4') {
                                                                            $count4s++;
                                                                        } else if ($extra == '6') {
                                                                            $count6s++;
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            if ($bowler_status == '1') {
                                                                ?>
                                                                <tr class="active">
                                                                <?php } else { ?>
                                                                <tr>
                                                                <?php } ?>
                                                                <td><?php echo $bowler; ?></td>
                                                                <?php
                                                                if ($bowler_status == '1') {
                                                                    $overs--;
                                                                    $overs = $overs . '<b>.</b>' . $countBalls;
                                                                }
                                                                ?>
                                                                <td style="text-align: left;"><?php echo $overs; ?></td>
                                                                <td style="text-align: right;"><?php echo $countMaidens; ?></td>
                                                                <td style="text-align: right;"><?php echo $scoreTotal; ?></td>
                                                                <td style="text-align: right;"><?php echo $countWickets; ?></td>
                                                                <td style="text-align: right;"><?php echo $count0s; ?></td>
                                                                <td style="text-align: right;"><?php echo $count4s; ?></td>
                                                                <td style="text-align: right;"><?php echo $count6s; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>  
                                            </div>
                                        </div>
                                        <?php if ($status == '2' || $status == '3') { ?>
                                        </div>
                                    <?php } else { ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <hr>
                </div>

                <?php
            } else {
                header("Location: summary.php");
            }
            ?>

            <hr class="col-md-12 featurette-divider">

            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="fb-like" data-href="http://criclive.moraspirit.com/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    <hr/>
                    <div class="fb-page" data-href="https://www.facebook.com/moraspirit.fanpage" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/moraspirit.fanpage"><a href="https://www.facebook.com/moraspirit.fanpage">MoraSpirit</a></blockquote></div></div>
                </div>
                <div class="col-md-6">
                    <div class="fb-comments" data-href="http://criclive.moraspirit.com" data-numposts="8"></div>
                </div>
            </div>

        </div>

        <?php include './footer.php'; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/bootstrap.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/dropdown.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/tab.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/collapse.js"></script>
        <script>
            //Dropdown Menu
            $('.dropdown-toggle').dropdown();

            //Tab Pane
            $('#myTab a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            });
        </script>
    </body>
</html>