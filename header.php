<nav class="navbar navbar-default navbar-fixed-top" style="background-color: rgb(240,40,40);">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<img src="img/logo.png" height="50"/>-->
            <a class="navbar-brand" href="#" style="color: white;">MoraSpirit CricLive</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./summary.php" style="color: white;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                <?php
                if ($_SESSION != NULL) {
                    if ($_SESSION['username'] = 'admin') {
                        ?>
                        <li><a href="./register.php" style="color: white;"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Register</a></li>
                        <li><a href="./score.php" style="color: white;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Score</a></li>
                        <?php
                    }
                } else {
                    ?>
                    <li><a href="./signin.php" style="color: white;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign In</a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>