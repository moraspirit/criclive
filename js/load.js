function loadTeamImage1() {
    var team1 = document.getElementById('team1').value;
    document.getElementById('teamimg1').innerHTML = '<img src="img/university/' + team1 + '.png" height="200"/>';
}

function loadTeamImage2() {
    var team1 = document.getElementById('team2').value;
    document.getElementById('teamimg2').innerHTML = '<img src="img/university/' + team1 + '.png" height="200"/>';
}

function loadTeamBall() {
    var bat = document.getElementById('bat').value;
    var ball = document.getElementById('ball');
    if (bat == '1') {
        ball.selectedIndex = "2";
    } else {
        ball.selectedIndex = "1";
    }
}

function loadTeamBat() {
    var ball = document.getElementById('ball').value;
    var bat = document.getElementById('bat');
    if (ball == '1') {
        bat.selectedIndex = "2";
    } else {
        bat.selectedIndex = "1";
    }
}

function loadTeam(id) {
    var s = document.getElementById(id).value;
    if (id == 'bat1') {
        if (s == '1') {
            document.getElementById('ball1').selectedIndex = "2";
            document.getElementById('bat2').selectedIndex = "2";
            document.getElementById('ball2').selectedIndex = "1";
        } else {
            document.getElementById('ball1').selectedIndex = "1";
            document.getElementById('bat2').selectedIndex = "1";
            document.getElementById('ball2').selectedIndex = "2";
        }
    } else if (id == 'ball1') {
        if (s == '1') {
            document.getElementById('bat1').selectedIndex = "2";
            document.getElementById('bat2').selectedIndex = "1";
            document.getElementById('ball2').selectedIndex = "2";
        } else {
            document.getElementById('bat1').selectedIndex = "1";
            document.getElementById('bat2').selectedIndex = "2";
            document.getElementById('ball2').selectedIndex = "1";
        }
    } else if (id == 'bat2') {
        if (s == '1') {
            document.getElementById('ball1').selectedIndex = "1";
            document.getElementById('bat1').selectedIndex = "2";
            document.getElementById('ball2').selectedIndex = "2";
        } else {
            document.getElementById('ball1').selectedIndex = "2";
            document.getElementById('bat1').selectedIndex = "1";
            document.getElementById('ball2').selectedIndex = "1";
        }
    } else if (id == 'ball2') {
        if (s == '1') {
            document.getElementById('ball1').selectedIndex = "2";
            document.getElementById('bat1').selectedIndex = "1";
            document.getElementById('bat2').selectedIndex = "2";
        } else {
            document.getElementById('ball1').selectedIndex = "1";
            document.getElementById('bat1').selectedIndex = "2";
            document.getElementById('bat2').selectedIndex = "1";
        }
    }
}

function loadCatchBlock() {
    var howout = document.getElementById('howout').value;
    if (howout == 'catch') {
        document.getElementById('catchblock').className = 'form-group';
    } else {
        document.getElementById('catchblock').className = 'form-group hidden';
    }
}