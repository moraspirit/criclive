<?php
header("Location: summary.php");
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
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
    </head>
    <body>
        <?php include './header.php'; ?>

        <div class="container">

            <blockquote style="margin-bottom: 0px;">
                <p>
                    This pages are only for check the design only. Layouts can be slightly change when implementing. 
                    As these pages are not designed for responsive for all devices and any browser there may be 
                    some errors in alignments.
                </p>
                <footer>Chanaka Lakmal</footer>
            </blockquote>
            <hr/>
            <ul>
                <li><a href="register.php" target="_blank">Register Team</a></li>
                <li><a href="score.php" target="_blank">Enter Score</a></li>
                <li><a href="scorecard.php" target="_blank">Summary</a></li>
            </ul>
        </div>

        <?php include './footer.php'; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </body>
</html>