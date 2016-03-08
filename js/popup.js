function startMatch(id, status, inning1, inning2) {
    var obj;

    if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Browser Doesn't Support AJAX!");
    }

    if (confirm("Press OK to Continue !") == true) {
        if (obj !== null) {
            obj.onreadystatechange = function () {
                if (obj.readyState < 4) {
                    // progress
                } else if (obj.readyState === 4) {
                    var res = obj.responseText;
                    document.getElementById('viewModal').innerHTML = res;
                }
            }

            obj.open("POST", "ctrl/start_match.php", true);
            obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            obj.send("id=" + id + "&status=" + status + "&inning1=" + inning1 + "&inning2=" + inning2);
        }
    }
}

function finishMatch(id, status, inning1, inning2) {
    var obj;

    if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Browser Doesn't Support AJAX!");
    }

    if (obj !== null) {
        obj.onreadystatechange = function () {
            if (obj.readyState < 4) {
                // progress
            } else if (obj.readyState === 4) {
                var res = obj.responseText;
                document.getElementById('viewModal').innerHTML = res;
            }
        }

        obj.open("POST", "ctrl/finish_match.php", true);
        obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        obj.send("id=" + id + "&status=" + status + "&inning1=" + inning1 + "&inning2=" + inning2);
    }
}

function changeBatsman(id, status, inning1, inning2) {
    var obj;

    if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Browser Doesn't Support AJAX!");
    }

    if (obj !== null) {
        obj.onreadystatechange = function () {
            if (obj.readyState < 4) {
                // progress
            } else if (obj.readyState === 4) {
                var res = obj.responseText;
                document.getElementById('viewModal').innerHTML = res;
            }
        }

        obj.open("POST", "ctrl/change_batsman.php", true);
        obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        obj.send("id=" + id + "&status=" + status + "&inning1=" + inning1 + "&inning2=" + inning2);
    }
}

function changeOver(id, status, inning1, inning2) {
    var obj;

    if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Browser Doesn't Support AJAX!");
    }

    if (obj !== null) {
        obj.onreadystatechange = function () {
            if (obj.readyState < 4) {
                // progress
            } else if (obj.readyState === 4) {
                var res = obj.responseText;
                document.getElementById('viewModal').innerHTML = res;
            }
        }

        obj.open("POST", "ctrl/change_over.php", true);
        obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        obj.send("id=" + id + "&status=" + status + "&inning1=" + inning1 + "&inning2=" + inning2);
    }
}

function enterExtra(id, status, inning1, inning2) {
    var obj;

    if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Browser Doesn't Support AJAX!");
    }

    if (obj !== null) {
        obj.onreadystatechange = function () {
            if (obj.readyState < 4) {
                // progress
            } else if (obj.readyState === 4) {
                var res = obj.responseText;
                document.getElementById('viewModal').innerHTML = res;
            }
        }

        obj.open("POST", "ctrl/enter_extra.php", true);
        obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        obj.send("id=" + id + "&status=" + status + "&inning1=" + inning1 + "&inning2=" + inning2);
    }
}

function undoScore(id, status, inning1, inning2) {
    var obj;

    if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Browser Doesn't Support AJAX!");
    }

    if (obj !== null) {
        obj.onreadystatechange = function () {
            if (obj.readyState < 4) {
                // progress
            } else if (obj.readyState === 4) {
                var res = obj.responseText;
                document.getElementById('viewModal').innerHTML = res;
            }
        }

        obj.open("POST", "ctrl/undo_score.php", true);
        obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        obj.send("id=" + id + "&status=" + status + "&inning1=" + inning1 + "&inning2=" + inning2);
    }
}