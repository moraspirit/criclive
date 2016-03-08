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
        <title>MoraSpirit | CricLive</title>
        <link rel="shortcut icon" href="img/moraspirit_logo.png">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">-->
        <link rel="stylesheet" type="text/css" href="css/hover.css">
        <style type="text/css">
            #box{
                margin-top: 10px;
                margin-bottom: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
            }
        </style>
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

        <div class="container" style="padding-bottom: 50px;">

            <?php
            include './DBCon.php';
            $result = mysqli_query($con, "SELECT * FROM cricketmatch");
            if (mysqli_num_rows($result) == 0) {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>No Ongoing Match Found !</strong><br/><br/>
                    <a href="register.php"><button type="button" class="btn btn-danger">Register Teams</button></a>
                </div>
                <?php
            } else {
                while ($row = mysqli_fetch_array($result)) {
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
                    $cricketmatch_status = $row['status'];

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

                    if ($cricketmatch_status != '2') {
                        ?>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hvr-underline-from-center" id="box">
                            <a href="scorecard.php?id=<?php echo $id; ?>" class="hvr-float-shadow" style="text-decoration: none;">
                                <div class="col-md-12 col-sm-12 text-center" style="padding-top: 10px; background-color: rgb(240,40, 40); color: white; border-radius: 1em;">
                                    <p><strong>Match Type :</strong> <?php echo $type_; ?></p>
                                    <p><strong>Date :</strong> <?php echo $date; ?></p>
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: center;">
                                    <h4 class="text-primary"><?php echo $university[$team1]; ?></h4>
                                    <img src="img/university/<?php echo $team1; ?>.png" height="100"/>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: center;"></div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: center;">
                                    <h4 class="text-primary"><?php echo $university[$team2]; ?></h4>
                                    <img src="img/university/<?php echo $team2; ?>.png" height="100"/>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
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
        <script type="text/javascript" src="bootstrap/javascript/dropdown.js"></script>
        <script type="text/javascript" src="bootstrap/javascript/tab.js"></script>
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