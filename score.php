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
        <title>MoraSpirit | CricHQ</title>
        <link rel="shortcut icon" href="img/moraspirit_logo.png">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">-->
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/hover.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body style="padding-top: 70px;">

        <?php include './header.php'; ?>

        <div class="container">

            <?php
            $permission = FALSE;
            if ($_SESSION != NULL) {
                if ($_SESSION['username'] == 'admin') {
                    $permission = TRUE;
                } else {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Warning!</strong> You don't have permission to access this area. Please <a href="signin.php">Sign In</a>
                    </div>
                    <?php
                }
            } else {
                header("Location: signin.php");
            }
            ?>

            <a href="db/sign_out.php">
                <img class="hvr-pulse-grow" src="img/logout.jpg" 
                     style="position: fixed; top: 60px; right: 20px; z-index: 5; width: 50px; height: 50px;">
            </a>

            <?php
            if ($permission) {
                if ($_GET != NULL) {
                    if ($_GET["msg"] == "openerror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Opening Batsman details seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "bowlererror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Bowler details seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "scoreerror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Last score seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "wicketerror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Wicket details seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "shuffleerror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Shuffle batsmans seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "finisherror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Finish seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "cancelovererror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Cancel over seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "undoerror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Undo action seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    } else if ($_GET["msg"] == "targetchangeerror") {
                        ?>
                        <div class="center-block">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Target change action seemed to be incorrect. Try again.
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <?php
                include './DBCon.php';
                $result = mysqli_query($con, "SELECT * FROM cricketmatch WHERE status='1'");
                if (mysqli_num_rows($result) == 0) {
                    ?>
                    <div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>No Ongoing Match Found !</strong><br/><br/>
                        <a href="register.php"><button type="button" class="btn btn-danger">Register Teams</button></a>
                    </div>
                    <?php
                } else {
                    if ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $date = $row['date'];
                        $type = $row['type'];
                        $at = $row['at'];
                        $team1 = $row['team1'];
                        $team2 = $row['team2'];
                        $umpire1 = $row['umpire1'];
                        $umpire2 = $row['umpire2'];
                        $scorer1 = $row['scorer1'];
                        $scorer2 = $row['scorer2'];

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
                    ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6 col-sm-6">
                            <p><strong>Match Type :</strong> <?php echo $type_; ?></p>
                            <p><strong>Teams :</strong> <?php echo $university[$team1]; ?> vs. <?php echo $university[$team2]; ?></p>
                            <p class="text-muted"><strong>Umpires :</strong> <?php echo $umpire1; ?> and <?php echo $umpire2; ?></p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p><strong>Date :</strong> <?php echo $date; ?></p>
                            <p><strong>Place :</strong> <?php echo $university[$at]; ?></p>
                            <p class="text-muted"><strong>Scorers :</strong> <?php echo $scorer1; ?> and <?php echo $scorer2; ?></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12" style="text-align: center;">
                        <h3 class="text-primary">
                            <strong><?php echo $university[$team1]; ?></strong>
                            <img src="img/university/<?php echo $team1; ?>.png" style="height: 100px;"/>
                            vs.
                            <img src="img/university/<?php echo $team2; ?>.png" style="height: 100px;"/>
                            <strong><?php echo $university[$team2]; ?></strong>
                        </h3>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <?php
                    if ($_GET != NULL) {
                        if ($_GET["msg"] == "error") {
                            ?>
                            <div class="col-md-12 center-block">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong> Some of your data seemed to be incorrect. Try again.
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <?php
                    $res = mysqli_query($con, "SELECT * FROM inning WHERE matchid='$id'");
                    if (mysqli_num_rows($res) == 0) {
                        ?>
                        <form id="inning_form" class="form-horizontal" onsubmit="validateInningForm(this);
                                return false;" action="db/save_inning.php" method="POST">
                            <div class="col-md-12">
                                <label class="col-md-1 control-label" style="text-align: center;">1<sup>st</sup> Innings</label>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/bat.png" style="height: 25px;"/></label>
                                    <div id="divbat1" class="col-md-11">
                                        <select id="bat1" name="bat1" class="form-control" onchange="loadTeam('bat1');">
                                            <option value="select" selected="" disabled="">-- Select --</option>
                                            <option value="1"> <?php echo $university[$team1]; ?></option>
                                            <option value="2"> <?php echo $university[$team2]; ?></option>
                                        </select>
                                        <span id="spanbat1" class="" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/ball.png" style="height: 25px;"/></label>
                                    <div id="divball1" class="col-md-11">
                                        <select id="ball1" name="ball1" class="form-control" onchange="loadTeam('ball1');">
                                            <option value="select" selected="" disabled="">-- Select --</option>
                                            <option value="1"> <?php echo $university[$team1]; ?></option>
                                            <option value="2"> <?php echo $university[$team2]; ?></option>
                                        </select>
                                        <span id="spanball1" class="" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-1 control-label" style="text-align: center;">2<sup>nd</sup> Innings</label>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/bat.png" style="height: 25px;"/></label>
                                    <div id="divbat2" class="col-md-11">
                                        <select id="bat2" name="bat2" class="form-control" onchange="loadTeam('bat2');">
                                            <option value="select" selected="" disabled="">-- Select --</option>
                                            <option value="1"> <?php echo $university[$team1]; ?></option>
                                            <option value="2"> <?php echo $university[$team2]; ?></option>
                                        </select>
                                        <span id="spanbat2" class="" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/ball.png" style="height: 25px;"/></label>
                                    <div id="divball2" class="col-md-11">
                                        <select id="ball2" name="ball2" class="form-control" onchange="loadTeam('ball2');">
                                            <option value="select" selected="" disabled="">-- Select --</option>
                                            <option value="1"> <?php echo $university[$team1]; ?></option>
                                            <option value="2"> <?php echo $university[$team2]; ?></option>
                                        </select>
                                        <span id="spanball2" class="" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary pull-right">FIX</button>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        if ($row = mysqli_fetch_array($res)) {
                            $inning1 = $row['inning1'];
                            $inning2 = $row['inning2'];
                            $status = $row['status'];
                            ?>
                            <div class="col-md-12">
                                <label class="col-md-1 control-label" style="text-align: center;">1<sup>st</sup> Innings</label>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/bat.png" style="height: 25px;"/></label>
                                    <div class="col-md-11">
                                        <select class="form-control" disabled="">
                                            <option selected=""> <?php echo $university[$inning1]; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/ball.png" style="height: 25px;"/></label>
                                    <div class="col-md-11">
                                        <select class="form-control" disabled="">
                                            <option selected=""> <?php echo $university[$inning2]; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-1 control-label" style="text-align: center;">2<sup>nd</sup> Innings</label>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/bat.png" style="height: 25px;"/></label>
                                    <div class="col-md-11">
                                        <select class="form-control" disabled="">
                                            <option selected=""> <?php echo $university[$inning2]; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="col-md-1"><img src="img/ball.png" style="height: 25px;"/></label>
                                    <div class="col-md-11">
                                        <select class="form-control" disabled="">
                                            <option selected=""> <?php echo $university[$inning1]; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary pull-right disabled">FIX</button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <?php
                    $res = mysqli_query($con, "SELECT * FROM inning ORDER BY id DESC LIMIT 1");
                    if ($row = mysqli_fetch_array($res)) {
                        $matchid = $row['matchid'];
                        $inning1 = $row['inning1'];
                        $inning2 = $row['inning2'];
                        $status = $row['status'];
                        if ($status == '1') {
                            //--------------------------------------1st Inning----------------------------------------------------------------
                            ?>
                            <div id="score" class="col-md-12">
                                <p class="lead">
                                    <strong>1<sup>st</sup> Innings : &nbsp;</strong>
                                    <img src="img/bat.png" style="height: 20px;"/> <?php echo $university[$inning1]; ?> &nbsp;|&nbsp; 
                                    <img src="img/ball.png" style="height: 20px;"/> <?php echo $university[$inning2]; ?>
                                </p>
                            </div>

                            <table class="table table-bordered table-condensed" style="margin-top: 15px; font-size: 12px;">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;"><img src="img/batsman.png" height="25"/></th>
                                        <th style="text-align: center;"><img src="img/jersey.png" height="23"/></th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$matchid' AND inning='$inning1'");
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($res)) {
                                        $batsman = $row['batsman'];
                                        $jersey = $row['jersey'];
                                        $score = $row['score'];
                                        $batsman_status = $row['status'];
                                        if ($batsman != 'Extra') {
                                            $count++;
                                            if ($batsman_status == '1') {
                                                ?>
                                                <tr class="bg-primary" style="font-weight: bold;">
                                                <?php } elseif ($batsman_status == '2') { ?>
                                                <tr style="font-weight: bold;">
                                                <?php } elseif ($batsman_status == '0') { ?>
                                                <tr class="bg-danger">
                                                <?php } else { ?>
                                                <tr>
                                                <?php } ?>
                                                <td style="text-align: center;"><?php echo $count; ?></td>
                                                <td style="min-width: 125px;"><?php echo $batsman; ?></td>
                                                <td style="text-align: center;"><b><?php echo $jersey; ?></b></td>
                                                <td style="min-width: 500px;"><?php echo $score; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-condensed" style="margin-top: 15px; font-size: 12px;">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;"><img src="img/bowler.png" height="25"/></th>
                                        <th style="text-align: center;"><img src="img/jersey.png" height="23"/></th>
                                        <th style="text-align: center;">1</th>
                                        <th style="text-align: center;">2</th>
                                        <th style="text-align: center;">3</th>
                                        <th style="text-align: center;">4</th>
                                        <th style="text-align: center;">5</th>
                                        <th style="text-align: center;">6</th>
                                        <th style="text-align: center;">7</th>
                                        <th style="text-align: center;">8</th>
                                        <th style="text-align: center;">9</th>
                                        <th style="text-align: center;">10</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $current_res = mysqli_query($con, "SELECT bowler FROM bowler WHERE matchid='$matchid' AND status='1' AND inning='$inning1'");
                                    $current_bowler = '';
                                    if ($row = mysqli_fetch_array($current_res)) {
                                        $current_bowler = $row['bowler'];
                                    }
                                    $res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$matchid' AND inning='$inning1' GROUP BY bowler");
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($res)) {
                                        $bowler = $row['bowler'];
                                        $jersey = $row['jersey'];
                                        $score = $row['score'];
                                        $count++;
                                        if ($bowler == $current_bowler) {
                                            ?>
                                            <tr class="bg-primary">
                                            <?php } else { ?>
                                            <tr>
                                            <?php } ?>
                                            <td style="text-align: center;"><?php echo $count; ?></td>
                                            <td style="min-width: 50px;"><?php echo $bowler; ?></td>
                                            <td style="text-align: center;"><b><?php echo $jersey; ?></b></td>
                                            <?php
                                            $inner_res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$matchid' AND bowler='$bowler'");
                                            $inner_count = 0;
                                            while ($row = mysqli_fetch_array($inner_res)) {
                                                $inner_count++;
                                                $score = $row['score'];
                                                ?>
                                                <td style="max-width: 60px; min-width: 20px; white-space: nowrap;"><?php echo $score; ?></td>
                                                <?php
                                            }
                                            while ($inner_count < 10) {
                                                $inner_count++;
                                                ?>
                                                <td style="max-width: 30px; min-width: 30px;"></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else if ($status == '2') {
                            //--------------------------------------2nd Inning----------------------------------------------------------------
                            ?>
                            <div id="score" class="col-md-12">
                                <p class="lead">
                                    <strong>2<sup>nd</sup> Innings : &nbsp;</strong>
                                    <img src="img/bat.png" style="height: 20px;"/> <?php echo $university[$inning2]; ?> &nbsp;|&nbsp; 
                                    <img src="img/ball.png" style="height: 20px;"/> <?php echo $university[$inning1]; ?>
                                </p>
                            </div>

                            <table class="table table-bordered table-condensed" style="margin-top: 15px; font-size: 12px;">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;"><img src="img/batsman.png" height="25"/></th>
                                        <th style="text-align: center;"><img src="img/jersey.png" height="23"/></th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$matchid' AND inning='$inning2'");
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($res)) {
                                        $batsman = $row['batsman'];
                                        $jersey = $row['jersey'];
                                        $score = $row['score'];
                                        $batsman_status = $row['status'];
                                        if ($batsman != 'Extra') {
                                            $count++;
                                            if ($batsman_status == '1') {
                                                ?>
                                                <tr class="bg-primary" style="font-weight: bold;">
                                                <?php } elseif ($batsman_status == '2') { ?>
                                                <tr style="font-weight: bold;">
                                                <?php } elseif ($batsman_status == '0') { ?>
                                                <tr class="bg-danger">
                                                <?php } else { ?>
                                                <tr>
                                                <?php } ?>
                                                <td style="text-align: center;"><?php echo $count; ?></td>
                                                <td style="min-width: 125px;"><?php echo $batsman; ?></td>
                                                <td style="text-align: center;"><b><?php echo $jersey; ?></b></td>
                                                <td style="min-width: 500px;"><?php echo $score; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-condensed" style="margin-top: 15px; font-size: 12px;">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;"><img src="img/bowler.png" height="25"/></th>
                                        <th style="text-align: center;"><img src="img/jersey.png" height="23"/></th>
                                        <th style="text-align: center;">1</th>
                                        <th style="text-align: center;">2</th>
                                        <th style="text-align: center;">3</th>
                                        <th style="text-align: center;">4</th>
                                        <th style="text-align: center;">5</th>
                                        <th style="text-align: center;">6</th>
                                        <th style="text-align: center;">7</th>
                                        <th style="text-align: center;">8</th>
                                        <th style="text-align: center;">9</th>
                                        <th style="text-align: center;">10</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $current_res = mysqli_query($con, "SELECT bowler FROM bowler WHERE matchid='$matchid' AND status='1' AND inning='$inning2'");
                                    $current_bowler = '';
                                    if ($row = mysqli_fetch_array($current_res)) {
                                        $current_bowler = $row['bowler'];
                                    }
                                    $res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$matchid' AND inning='$inning2' GROUP BY bowler");
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($res)) {
                                        $bowler = $row['bowler'];
                                        $jersey = $row['jersey'];
                                        $score = $row['score'];
                                        $count++;
                                        if ($bowler == $current_bowler) {
                                            ?>
                                            <tr class="bg-primary">
                                            <?php } else { ?>
                                            <tr>
                                            <?php } ?>
                                            <td style="text-align: center;"><?php echo $count; ?></td>
                                            <td style="min-width: 50px;"><?php echo $bowler; ?></td>
                                            <td style="text-align: center;"><b><?php echo $jersey; ?></b></td>
                                            <?php
                                            $inner_res = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$matchid' AND bowler='$bowler'");
                                            $inner_count = 0;
                                            while ($row = mysqli_fetch_array($inner_res)) {
                                                $inner_count++;
                                                $score = $row['score'];
                                                ?>
                                                <td style="max-width: 60px; min-width: 20px; white-space: nowrap;"><?php echo $score; ?></td>
                                                <?php
                                            }
                                            while ($inner_count < 10) {
                                                $inner_count++;
                                                ?>
                                                <td style="max-width: 30px; min-width: 30px;"></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>

                        <!--------------------------------------------------------Buttons-------------------------------------------->

                        <div class="col-md-12">
                            <?php if ($status != '0' && $status != '*' && $status != '3') { ?>
                                <a href="#" data-toggle="modal" data-target="#viewModal" 
                                   onclick="undoScore('<?php echo $id ?>', '<?php echo $status ?>', '<?php echo $inning1 ?>', '<?php echo $inning2 ?>')" style="text-decoration: none;">
                                    <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cog"></span></button>
                                </a>
                                <span style="padding-left:10px"></span>
                                <a href="#" data-toggle="modal" data-target="#viewModal" 
                                   onclick="changeOver('<?php echo $id ?>', '<?php echo $status ?>', '<?php echo $inning1 ?>', '<?php echo $inning2 ?>')" style="text-decoration: none;">
                                    <button type="button" class="btn btn-danger btn-lg">OVER</button>
                                </a>
                                <a href="db/shuffle_batsman.php?matchid=<?php echo $id; ?>">
                                    <button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-random" aria-hidden="true"></span></button>
                                </a>
                                <span style="padding-left:10px"></span>
                                <?php
                                $result = mysqli_query($con, "SELECT bowler FROM bowler WHERE matchid='$id' AND status='1'");
                                if (mysqli_num_rows($res) == 0) {
                                    ?>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">0</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">1</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">2</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">3</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">4</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">5</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">6</button>
                                    <button type="button" class="btn btn-success btn-lg" disabled="">7</button>
                                    <span style="padding-left:10px"></span>
                                    <button type="button" class="btn btn-warning btn-lg" disabled="">Wide</button>
                                    <button type="button" class="btn btn-warning btn-lg" disabled="">No Ball</button>
                                    <button type="button" class="btn btn-warning btn-lg" disabled="">Bye</button>
                                    <button type="button" class="btn btn-warning btn-lg" disabled="">Leg Bye</button>
                                    <span style="padding-left:10px"></span>
                                    <button type="button" class="btn btn-danger btn-lg" disabled="">Out</button>
                                <?php } else { ?>
                                    <?php if ($status == '1') { ?>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=0"><button type="button" class="btn btn-success btn-lg">0</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=1"><button type="button" class="btn btn-success btn-lg">1</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=2"><button type="button" class="btn btn-success btn-lg">2</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=3"><button type="button" class="btn btn-success btn-lg">3</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=4"><button type="button" class="btn btn-success btn-lg">4</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=5"><button type="button" class="btn btn-success btn-lg">5</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=6"><button type="button" class="btn btn-success btn-lg">6</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=7"><button type="button" class="btn btn-success btn-lg">7</button></a>
                                        <span style="padding-left:10px"></span>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Wide <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=0:wd">Wide</a></li>
                                                <li class="divider"></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=1:wd">Wide + 1 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=2:wd">Wide + 2 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=3:wd">Wide + 3 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=4:wd">Wide + 4 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=5:wd">Wide + 5 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=6:wd">Wide + 6 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=7:wd">Wide + 7 run (bye)</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                No Ball <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=0:nb">No Ball</a></li>
                                                <li class="divider"></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=1:nb">No Ball + 1 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=2:nb">No Ball + 2 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=3:nb">No Ball + 3 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=4:nb">No Ball + 4 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=5:nb">No Ball + 5 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=6:nb">No Ball + 6 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=7:nb">No Ball + 7 run (batsman)</a></li>
                                                <li class="divider"></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=1:nb">No Ball + 1 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=2:nb">No Ball + 2 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=3:nb">No Ball + 3 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=4:nb">No Ball + 4 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=5:nb">No Ball + 5 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=6:nb">No Ball + 6 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=7:nb">No Ball + 7 run (bye)</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Extra <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=1:ex">Extra 1 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=2:ex">Extra 2 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=3:ex">Extra 3 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=4:ex">Extra 4 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=5:ex">Extra 5 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=6:ex">Extra 6 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning1; ?>&score=7:ex">Extra 7 run (bye/leg bye)</a></li>
                                            </ul>
                                        </div>
                                    <?php } else if ($status == '2') { ?>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=0"><button type="button" class="btn btn-success btn-lg">0</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=1"><button type="button" class="btn btn-success btn-lg">1</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=2"><button type="button" class="btn btn-success btn-lg">2</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=3"><button type="button" class="btn btn-success btn-lg">3</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=4"><button type="button" class="btn btn-success btn-lg">4</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=5"><button type="button" class="btn btn-success btn-lg">5</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=6"><button type="button" class="btn btn-success btn-lg">6</button></a>
                                        <a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=7"><button type="button" class="btn btn-success btn-lg">7</button></a>
                                        <span style="padding-left:10px"></span>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Wide <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=0:wd">Wide</a></li>
                                                <li class="divider"></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=1:wd">Wide + 1 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=2:wd">Wide + 2 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=3:wd">Wide + 3 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=4:wd">Wide + 4 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=5:wd">Wide + 5 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=6:wd">Wide + 6 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=7:wd">Wide + 7 run (bye)</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                No Ball <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=0:nb">No Ball</a></li>
                                                <li class="divider"></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=1:nb">No Ball + 1 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=2:nb">No Ball + 2 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=3:nb">No Ball + 3 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=4:nb">No Ball + 4 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=5:nb">No Ball + 5 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=6:nb">No Ball + 6 run (batsman)</a></li>
                                                <li><a href="db/save_score_advanced.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=7:nb">No Ball + 7 run (batsman)</a></li>
                                                <li class="divider"></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=1:nb">No Ball + 1 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=2:nb">No Ball + 2 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=3:nb">No Ball + 3 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=4:nb">No Ball + 4 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=5:nb">No Ball + 5 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=6:nb">No Ball + 6 run (bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=7:nb">No Ball + 7 run (bye)</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Extra <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=1:ex">Extra 1 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=2:ex">Extra 2 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=3:ex">Extra 3 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=4:ex">Extra 4 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=5:ex">Extra 5 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=6:ex">Extra 6 run (bye/leg bye)</a></li>
                                                <li><a href="db/save_score.php?matchid=<?php echo $id; ?>&inning=<?php echo $inning2; ?>&score=7:ex">Extra 7 run (bye/leg bye)</a></li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <span style="padding-left:10px"></span>
                                    <a href="#" data-toggle="modal" data-target="#viewModal" 
                                       onclick="changeBatsman('<?php echo $id ?>', '<?php echo $status ?>', '<?php echo $inning1 ?>', '<?php echo $inning2 ?>')" style="text-decoration: none;">
                                        <button type="button" class="btn btn-danger btn-lg">OUT</button>
                                    </a>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <?php if ($status != '0') { ?>
                        <div class="col-md-12" id="success"></div>
                        <div class="col-md-12 bg-danger" id="error"></div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    <?php } ?>

                    <div class="col-md-12">
                        <?php if ($status == '0') { ?>
                            <a href="#" data-toggle="modal" data-target="#viewModal" 
                               onclick="startMatch('<?php echo $id ?>', '<?php echo $status ?>', '<?php echo $inning1 ?>', '<?php echo $inning2 ?>')" style="text-decoration: none;">
                                <button type="button" class="col-md-12 btn btn-danger btn-lg">START 1<sup>ST</sup> INNING</button>
                            </a>
                            <?php
                        }
                        if ($status == '*' || $status == '1') {
                            ?>
                            <a href="#" data-toggle="modal" data-target="#viewModal" 
                               onclick="startMatch('<?php echo $id ?>', '<?php echo $status ?>', '<?php echo $inning1 ?>', '<?php echo $inning2 ?>')" style="text-decoration: none;">
                                <button type="button" class="col-md-12 btn btn-danger btn-lg">START 2<sup>ND</sup> INNING</button>
                            </a>
                            <?php
                        }
                        if ($status == '2') {
                            ?>
                            <a href="#" data-toggle="modal" data-target="#viewModal" 
                               onclick="finishMatch('<?php echo $id ?>', '<?php echo $status ?>', '<?php echo $inning1 ?>', '<?php echo $inning2 ?>')" style="text-decoration: none;">
                                <button type="button" class="col-md-12 btn btn-danger btn-lg">FINISH MATCH</button>
                            </a>
                        <?php } ?>
                    </div>
                    <?php
                }
            }
            ?>

            <div class="col-md-12">
                <hr>
            </div>

        </div>

        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <?php include './footer.php'; ?>
        <script>
            $("#success").load("./scorecard.php?id=<?php echo $id ?> #summary_scoresheet", function (response, status) {
                if (status == "error") {
                    var msg = "<span class=\"glyphicon glyphicon-warning-sign\" aria-hidden=\"true\"></span><b> Sorry. There was an error while loading current scorecard.</b>";
                    $("#error").html(msg);
                }
            });
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/bootstrap.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/tab.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/modal.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/dropdown.js"></script>
        <script type="text/javascript" src="js/load.js"></script>
        <script type="text/javascript" src="js/validate_inning_form.js"></script>
        <script type="text/javascript" src="js/popup.js"></script>
        <script type="text/javascript" src="js/validate_start_match.js"></script>
        <script type="text/javascript" src="js/validate_change_over.js"></script>
        <script type="text/javascript" src="js/validate_wicket_form.js"></script>
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