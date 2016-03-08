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
    </head>
    <body style="padding-top: 70px;">

        <?php include './header.php'; ?>

        <div class="container text-center" >

            <form id="signin_form" class="form-horizontal center-block" action="db/search.php" method="POST">
                <div class="form-group">
                    <img class="img-circle center-block" src="img/user.png" width="200"/>
                </div>

                <div class="form-group">
                    <input type="text" name="username" class="form-control center-block" style="width: 300px" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control center-block" style="width: 300px" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" value="SIGN IN" class="btn btn-primary btn-sm"/>
                </div>
                <div class="form-group">
                    <span class="a-btn-text">Not a member yet?</span> 
                    <span class="a-btn-slide-text">
                        <a href="#" class="a-btn">Contact Administrator</a>
                    </span>
                    <span class="a-btn-icon-right"><span></span></span>
                </div>
            </form>

        </div>

        <?php include './footer.php'; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            //Dropdown Menu
            $('.dropdown-toggle').dropdown();
        </script>
    </body>
</html>
