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

            <?php if ($permission) { ?>
                <form id="reg_form" class="form-horizontal" onsubmit="validateRegisterForm(this);
                        return false;" action="db/save_team.php" method="POST">

                    <?php
                    if ($_GET != NULL) {
                        if ($_GET["msg"] == "error") {
                            ?>
                            <div class="center-block">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong> Some of your data seemed to be incorrect. Try again.
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label class="col-sm-4"> Match Details :</label>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-1 control-label"> Date</label>
                            <div id="divdate" class="col-sm-2">
                                <input id="date" type="date" class="form-control" name="date">
                                <span id="spandate" class="" aria-hidden="true"></span>
                            </div>
                            <label class="col-sm-2 control-label"> Match Type</label>
                            <div id="divtype" class="col-sm-2">
                                <select id="type" name="type" class="form-control">
                                    <option value="select" selected="" disabled=""> --Select --</option>
                                    <option value="oneday"> One Day Match</option>
                                    <option value="test" disabled=""> Test Match</option>
                                </select>
                                <span id="spantype" class="" aria-hidden="true"></span>
                            </div>
                            <label class="col-sm-2 control-label"> Played At</label>
                            <div id="divat" class="col-sm-3">
                                <select id="at" name="at" class="form-control">
                                    <option value="select" selected="" disabled=""> --Select --</option>
                                    <option value="cmb"> University of Colombo</option>
                                    <option value="pera"> University of Peradeniya</option>
                                    <option value="jpura"> University of Sri Jayawardenepura</option>
                                    <option value="kel"> University of Kelaniya</option>
                                    <option value="mora"> University of Moratuwa</option>
                                    <option value="jaff"> University of Jaffna</option>
                                    <option value="ruh"> University of Ruhuna</option>
                                    <option value="ousl"> The Open University of Sri Lanka</option>
                                    <option value="eusl"> Eastern University of Sri Lanka </option>
                                    <option value="seusl"> South Eastern University of Sri Lanka</option>
                                    <option value="rusl"> Rajarata University of Sri Lanka</option>
                                    <option value="susl"> Sabaragamuwa University of Sri Lanka</option>
                                    <option value="wusl"> Wayamba University of Sri Lanka</option>
                                    <option value="uwu"> Uva Wellassa University</option>
                                    <option value="uvpa"> University of the Visual & Performing Arts</option>
                                </select>
                                <span id="spanat" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4"> Team Details :</label>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div id="divteam1" class="col-md-12">
                                <select id="team1" name="team1" class="form-control" onchange="loadTeamImage1();">
                                    <option value="select" selected="" disabled=""> --Select --</option>
                                    <option value="cmb"> University of Colombo</option>
                                    <option value="pera"> University of Peradeniya</option>
                                    <option value="jpura"> University of Sri Jayawardenepura</option>
                                    <option value="kel"> University of Kelaniya</option>
                                    <option value="mora"> University of Moratuwa</option>
                                    <option value="jaff"> University of Jaffna</option>
                                    <option value="ruh"> University of Ruhuna</option>
                                    <option value="ousl"> The Open University of Sri Lanka</option>
                                    <option value="eusl"> Eastern University of Sri Lanka </option>
                                    <option value="seusl"> South Eastern University of Sri Lanka</option>
                                    <option value="rusl"> Rajarata University of Sri Lanka</option>
                                    <option value="susl"> Sabaragamuwa University of Sri Lanka</option>
                                    <option value="wusl"> Wayamba University of Sri Lanka</option>
                                    <option value="uwu"> Uva Wellassa University</option>
                                    <option value="uvpa"> University of the Visual & Performing Arts</option>
                                </select>
                                <span id="spanteam1" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div id="teamimg1" class="form-group" style="text-align: center;"></div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div id="divteam2" class="col-md-12">
                                <select id="team2" name="team2" class="form-control" onchange="loadTeamImage2();">
                                    <option value="select" selected="" disabled=""> --Select --</option>
                                    <option value="cmb"> University of Colombo</option>
                                    <option value="pera"> University of Peradeniya</option>
                                    <option value="jpura"> University of Sri Jayawardenepura</option>
                                    <option value="kel"> University of Kelaniya</option>
                                    <option value="mora"> University of Moratuwa</option>
                                    <option value="jaff"> University of Jaffna</option>
                                    <option value="ruh"> University of Ruhuna</option>
                                    <option value="ousl"> The Open University of Sri Lanka</option>
                                    <option value="eusl"> Eastern University of Sri Lanka </option>
                                    <option value="seusl"> South Eastern University of Sri Lanka</option>
                                    <option value="rusl"> Rajarata University of Sri Lanka</option>
                                    <option value="susl"> Sabaragamuwa University of Sri Lanka</option>
                                    <option value="wusl"> Wayamba University of Sri Lanka</option>
                                    <option value="uwu"> Uva Wellassa University</option>
                                    <option value="uvpa"> University of the Visual & Performing Arts</option>
                                </select>
                                <span id="spanteam2" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div id="teamimg2" class="form-group" style="text-align: center;"></div>
                    </div>

                    <!-------------------------Team1------------------------------------------------------------------------- -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-9" style="text-align: center;">
                                <img src="img/players.png" height="40"/>
                            </div>
                            <div class="col-sm-2" style="text-align: center;">
                                <img src="img/jersey.png" height="40"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 1.</label>
                            </div>
                            <div id="divteam1player1" class="col-sm-9">
                                <input id="team1player1" type="text" class="form-control" placeholder="" name="team1player1">
                                <span id="spanteam1player1" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey1" class="col-sm-2">
                                <input id="team1jersey1" type="text" class="form-control" placeholder="" name="team1jersey1">
                                <span id="spanteam1jersey1" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 2.</label>
                            </div>
                            <div id="divteam1player2" class="col-sm-9">
                                <input id="team1player2" type="text" class="form-control" placeholder="" name="team1player2">
                                <span id="spanteam1player2" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey2" class="col-sm-2">
                                <input id="team1jersey2" type="text" class="form-control" placeholder="" name="team1jersey2">
                                <span id="spanteam1jersey2" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 3.</label>
                            </div>
                            <div id="divteam1player3" class="col-sm-9">
                                <input id="team1player3" type="text" class="form-control" placeholder="" name="team1player3">
                                <span id="spanteam1player3" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey3" class="col-sm-2">
                                <input id="team1jersey3" type="text" class="form-control" placeholder="" name="team1jersey3">
                                <span id="spanteam1jersey3" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 4.</label>
                            </div>
                            <div id="divteam1player4" class="col-sm-9">
                                <input id="team1player4" type="text" class="form-control" placeholder="" name="team1player4">
                                <span id="spanteam1player4" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey4" class="col-sm-2">
                                <input id="team1jersey4" type="text" class="form-control" placeholder="" name="team1jersey4">
                                <span id="spanteam1jersey4" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 5.</label>
                            </div>
                            <div id="divteam1player5" class="col-sm-9">
                                <input id="team1player5" type="text" class="form-control" placeholder="" name="team1player5">
                                <span id="spanteam1player5" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey5" class="col-sm-2">
                                <input id="team1jersey5" type="text" class="form-control" placeholder="" name="team1jersey5">
                                <span id="spanteam1jersey5" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 6.</label>
                            </div>
                            <div id="divteam1player6" class="col-sm-9">
                                <input id="team1player6" type="text" class="form-control" placeholder="" name="team1player6">
                                <span id="spanteam1player6" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey6" class="col-sm-2">
                                <input id="team1jersey6" type="text" class="form-control" placeholder="" name="team1jersey6">
                                <span id="spanteam1jersey6" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 7.</label>
                            </div>
                            <div id="divteam1player7" class="col-sm-9">
                                <input id="team1player7" type="text" class="form-control" placeholder="" name="team1player7">
                                <span id="spanteam1player7" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey7" class="col-sm-2">
                                <input id="team1jersey7" type="text" class="form-control" placeholder="" name="team1jersey7">
                                <span id="spanteam1jersey7" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 8.</label>
                            </div>
                            <div id="divteam1player8" class="col-sm-9">
                                <input id="team1player8" type="text" class="form-control" placeholder="" name="team1player8">
                                <span id="spanteam1player8" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey8" class="col-sm-2">
                                <input id="team1jersey8" type="text" class="form-control" placeholder="" name="team1jersey8">
                                <span id="spanteam1jersey8" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 9.</label>
                            </div>
                            <div id="divteam1player9" class="col-sm-9">
                                <input id="team1player9" type="text" class="form-control" placeholder="" name="team1player9">
                                <span id="spanteam1player9" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey9" class="col-sm-2">
                                <input id="team1jersey9" type="text" class="form-control" placeholder="" name="team1jersey9">
                                <span id="spanteam1jersey9" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 10.</label>
                            </div>
                            <div id="divteam1player10" class="col-sm-9">
                                <input id="team1player10" type="text" class="form-control" placeholder="" name="team1player10">
                                <span id="spanteam1player10" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey10" class="col-sm-2">
                                <input id="team1jersey10" type="text" class="form-control" placeholder="" name="team1jersey10">
                                <span id="spanteam1jersey10" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 11.</label>
                            </div>
                            <div id="divteam1player11" class="col-sm-9">
                                <input id="team1player11" type="text" class="form-control" placeholder="" name="team1player11">
                                <span id="spanteam1player11" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey11" class="col-sm-2">
                                <input id="team1jersey11" type="text" class="form-control" placeholder="" name="team1jersey11">
                                <span id="spanteam1jersey11" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 12.</label>
                            </div>
                            <div id="divteam1player12" class="col-sm-9">
                                <input id="team1player12" type="text" class="form-control" placeholder="" name="team1player12">
                                <span id="spanteam1player12" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey12" class="col-sm-2">
                                <input id="team1jersey12" type="text" class="form-control" placeholder="" name="team1jersey12">
                                <span id="spanteam1jersey12" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 13.</label>
                            </div>
                            <div id="divteam1player13" class="col-sm-9">
                                <input id="team1player13" type="text" class="form-control" placeholder="" name="team1player13">
                                <span id="spanteam1player13" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey13" class="col-sm-2">
                                <input id="team1jersey13" type="text" class="form-control" placeholder="" name="team1jersey13">
                                <span id="spanteam1jersey13" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 14.</label>
                            </div>
                            <div id="divteam1player14" class="col-sm-9">
                                <input id="team1player14" type="text" class="form-control" placeholder="" name="team1player14">
                                <span id="spanteam1player14" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey14" class="col-sm-2">
                                <input id="team1jersey14" type="text" class="form-control" placeholder="" name="team1jersey14">
                                <span id="spanteam1jersey14" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 15.</label>
                            </div>
                            <div id="divteam1player15" class="col-sm-9">
                                <input id="team1player15" type="text" class="form-control" placeholder="" name="team1player15">
                                <span id="spanteam1player15" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam1jersey15" class="col-sm-2">
                                <input id="team1jersey15" type="text" class="form-control" placeholder="" name="team1jersey15">
                                <span id="spanteam1jersey15" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <!-------------------------Team2------------------------------------------------------------------------- -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-9" style="text-align: center;">
                                <img src="img/players.png" height="40"/>
                            </div>
                            <div class="col-sm-2" style="text-align: center;">
                                <img src="img/jersey.png" height="40"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 1.</label>
                            </div>
                            <div id="divteam2player1" class="col-sm-9">
                                <input id="team2player1" type="text" class="form-control" placeholder="" name="team2player1">
                                <span id="spanteam2player1" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey1" class="col-sm-2">
                                <input id="team2jersey1" type="text" class="form-control" placeholder="" name="team2jersey1">
                                <span id="spanteam2jersey1" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 2.</label>
                            </div>
                            <div id="divteam2player2" class="col-sm-9">
                                <input id="team2player2" type="text" class="form-control" placeholder="" name="team2player2">
                                <span id="spanteam2player2" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey2" class="col-sm-2">
                                <input id="team2jersey2" type="text" class="form-control" placeholder="" name="team2jersey2">
                                <span id="spanteam2jersey2" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 3.</label>
                            </div>
                            <div id="divteam2player3" class="col-sm-9">
                                <input id="team2player3" type="text" class="form-control" placeholder="" name="team2player3">
                                <span id="spanteam2player3" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey3" class="col-sm-2">
                                <input id="team2jersey3" type="text" class="form-control" placeholder="" name="team2jersey3">
                                <span id="spanteam2jersey3" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 4.</label>
                            </div>
                            <div id="divteam2player4" class="col-sm-9">
                                <input id="team2player4" type="text" class="form-control" placeholder="" name="team2player4">
                                <span id="spanteam2player4" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey4" class="col-sm-2">
                                <input id="team2jersey4" type="text" class="form-control" placeholder="" name="team2jersey4">
                                <span id="spanteam2jersey4" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 5.</label>
                            </div>
                            <div id="divteam2player5" class="col-sm-9">
                                <input id="team2player5" type="text" class="form-control" placeholder="" name="team2player5">
                                <span id="spanteam2player5" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey5" class="col-sm-2">
                                <input id="team2jersey5" type="text" class="form-control" placeholder="" name="team2jersey5">
                                <span id="spanteam2jersey5" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 6.</label>
                            </div>
                            <div id="divteam2player6" class="col-sm-9">
                                <input id="team2player6" type="text" class="form-control" placeholder="" name="team2player6">
                                <span id="spanteam2player6" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey6" class="col-sm-2">
                                <input id="team2jersey6" type="text" class="form-control" placeholder="" name="team2jersey6">
                                <span id="spanteam2jersey6" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 7.</label>
                            </div>
                            <div id="divteam2player7" class="col-sm-9">
                                <input id="team2player7" type="text" class="form-control" placeholder="" name="team2player7">
                                <span id="spanteam2player7" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey7" class="col-sm-2">
                                <input id="team2jersey7" type="text" class="form-control" placeholder="" name="team2jersey7">
                                <span id="spanteam2jersey7" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 8.</label>
                            </div>
                            <div id="divteam2player8" class="col-sm-9">
                                <input id="team2player8" type="text" class="form-control" placeholder="" name="team2player8">
                                <span id="spanteam2player8" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey8" class="col-sm-2">
                                <input id="team2jersey8" type="text" class="form-control" placeholder="" name="team2jersey8">
                                <span id="spanteam2jersey8" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 9.</label>
                            </div>
                            <div id="divteam2player9" class="col-sm-9">
                                <input id="team2player9" type="text" class="form-control" placeholder="" name="team2player9">
                                <span id="spanteam2player9" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey9" class="col-sm-2">
                                <input id="team2jersey9" type="text" class="form-control" placeholder="" name="team2jersey9">
                                <span id="spanteam2jersey9" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 10.</label>
                            </div>
                            <div id="divteam2player10" class="col-sm-9">
                                <input id="team2player10" type="text" class="form-control" placeholder="" name="team2player10">
                                <span id="spanteam2player10" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey10" class="col-sm-2">
                                <input id="team2jersey10" type="text" class="form-control" placeholder="" name="team2jersey10">
                                <span id="spanteam2jersey10" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 11.</label>
                            </div>
                            <div id="divteam2player11" class="col-sm-9">
                                <input id="team2player11" type="text" class="form-control" placeholder="" name="team2player11">
                                <span id="spanteam2player11" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey11" class="col-sm-2">
                                <input id="team2jersey11" type="text" class="form-control" placeholder="" name="team2jersey11">
                                <span id="spanteam2jersey11" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 12.</label>
                            </div>
                            <div id="divteam2player12" class="col-sm-9">
                                <input id="team2player12" type="text" class="form-control" placeholder="" name="team2player12">
                                <span id="spanteam2player12" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey12" class="col-sm-2">
                                <input id="team2jersey12" type="text" class="form-control" placeholder="" name="team2jersey12">
                                <span id="spanteam2jersey12" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 13.</label>
                            </div>
                            <div id="divteam2player13" class="col-sm-9">
                                <input id="team2player13" type="text" class="form-control" placeholder="" name="team2player13">
                                <span id="spanteam2player13" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey13" class="col-sm-2">
                                <input id="team2jersey13" type="text" class="form-control" placeholder="" name="team2jersey13">
                                <span id="spanteam2jersey13" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 14.</label>
                            </div>
                            <div id="divteam2player14" class="col-sm-9">
                                <input id="team2player14" type="text" class="form-control" placeholder="" name="team2player14">
                                <span id="spanteam2player14" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey14" class="col-sm-2">
                                <input id="team2jersey14" type="text" class="form-control" placeholder="" name="team2jersey14">
                                <span id="spanteam2jersey14" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="col-sm-1"> 15.</label>
                            </div>
                            <div id="divteam2player15" class="col-sm-9">
                                <input id="team2player15" type="text" class="form-control" placeholder="" name="team2player15">
                                <span id="spanteam2player15" class="" aria-hidden="true"></span>
                            </div>
                            <div id="divteam2jersey15" class="col-sm-2">
                                <input id="team2jersey15" type="text" class="form-control" placeholder="" name="team2jersey15">
                                <span id="spanteam2jersey15" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3"> Umpire Details :</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <label class="col-sm-1"> 1.</label>
                                </div>
                                <div id="divumpire1" class="col-sm-11">
                                    <input id="umpire1" type="text" class="form-control" placeholder="" name="umpire1">
                                    <span id="spanumpire1" class="" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <label class="col-sm-1"> 2.</label>
                                </div>
                                <div id="divumpire2" class="col-sm-11">
                                    <input id="umpire2" type="text" class="form-control" placeholder="" name="umpire2">
                                    <span id="spanumpire2" class="" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3"><font class="text-danger"></font> Scorer Details :</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <label class="col-sm-1"> 1.</label>
                                </div>
                                <div id="divscorer1" class="col-sm-11">
                                    <input id="scorer1" type="text" class="form-control" placeholder="" name="scorer1">
                                    <span id="spanscorer1" class="" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <label class="col-sm-1"> 2.</label>
                                </div>
                                <div id="divscorer2" class="col-sm-11">
                                    <input id="scorer2" type="text" class="form-control" placeholder="" name="scorer2">
                                    <span id="spanscorer2" class="" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary pull-right">Register</button>
                        </div>
                    </div>
                </form>
            <?php } ?>

        </div>

        <?php include './footer.php'; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/dropdown.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/alert.js"></script>
        <script type="text/javascript" src="js/load.js"></script>
        <script type="text/javascript" src="js/validate_reg_form.js"></script>
    </body>
</html>