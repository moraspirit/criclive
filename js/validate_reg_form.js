/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateRegisterForm(myform) {
    var date = myform["date"].value;
    var type = myform["type"].value;
    var at = myform["at"].value;
    var team1 = myform["team1"].value;
    var team2 = myform["team2"].value;
    var umpire1 = myform["umpire1"].value;
    var umpire2 = myform["umpire2"].value;
    var scorer1 = myform["scorer1"].value;
    var scorer2 = myform["scorer2"].value;

    var bool = new Boolean();
    bool = true;

    resetReg();

    if (date === "") {
        bool = false;
        errorComboWithSymbol('date');
    }
    if (type === "select") {
        bool = false;
        errorComboWithSymbol('type');
    }
    if (at === "select") {
        bool = false;
        errorComboWithSymbol('at');
    }
    if (team1 === "select") {
        bool = false;
        errorComboWithSymbol('team1');
    }
    if (team2 === "select") {
        bool = false;
        errorComboWithSymbol('team2');
    }
    if (umpire1 === "") {
        bool = false;
        errorTextWithSymbol('umpire1');
    }
    if (umpire2 === "") {
        bool = false;
        errorTextWithSymbol('umpire2');
    }
    if (scorer1 === "") {
        bool = false;
        errorTextWithSymbol('scorer1');
    }
    if (scorer2 === "") {
        bool = false;
        errorTextWithSymbol('scorer2');
    }

    for (i = 1; i < 12; i++) {
        if (myform["team1player" + i].value === "") {
            bool = false;
            errorWithSymbol('team1player' + i);
        }

        if (myform["team1jersey" + i].value === "") {
            bool = false;
            errorWithoutSymbol('divteam1jersey' + i);
        } else if (isNaN(myform["team1jersey" + i].value)) {
            bool = false;
            errorWithoutSymbol('divteam1jersey' + i);
        } else if (myform["team1jersey" + i].value.length > 2) {
            bool = false;
            errorWithoutSymbol('divteam1jersey' + i);
        }
    }

    for (i = 12; i < 16; i++) {
        if (myform["team1player" + i].value === "") {
        } else {
            if (myform["team1jersey" + i].value === "") {
                bool = false;
                errorWithoutSymbol('divteam1jersey' + i);
            } else if (isNaN(myform["team1jersey" + i].value)) {
                bool = false;
                errorWithoutSymbol('divteam1jersey' + i);
            } else if (myform["team1jersey" + i].value.length > 2) {
                bool = false;
                errorWithoutSymbol('divteam1jersey' + i);
            }
        }
    }

    for (i = 1; i < 12; i++) {
        if (myform["team2player" + i].value === "") {
            bool = false;
            errorWithSymbol('team2player' + i);
        }

        if (myform["team2jersey" + i].value === "") {
            bool = false;
            errorWithoutSymbol('divteam2jersey' + i);
        } else if (isNaN(myform["team2jersey" + i].value)) {
            bool = false;
            errorWithoutSymbol('divteam2jersey' + i);
        } else if (myform["team2jersey" + i].value.length > 2) {
            bool = false;
            errorWithoutSymbol('divteam2jersey' + i);
        }
    }

    for (i = 12; i < 16; i++) {
        if (myform["team2player" + i].value === "") {
        } else {
            if (myform["team2jersey" + i].value === "") {
                bool = false;
                errorWithoutSymbol('divteam2jersey' + i);
            } else if (isNaN(myform["team2jersey" + i].value)) {
                bool = false;
                errorWithoutSymbol('divteam2jersey' + i);
            } else if (myform["team2jersey" + i].value.length > 2) {
                bool = false;
                errorWithoutSymbol('divteam2jersey' + i);
            }
        }
    }

    if (bool === true) {
        document.forms("reg_form").submit();
    }
}

function resetReg() {
    document.getElementById('divdate').className = 'col-sm-2 has-success has-feedback-combo';
    document.getElementById('spandate').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divtype').className = 'col-sm-2 has-success has-feedback-combo';
    document.getElementById('spantype').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divat').className = 'col-sm-3 has-success has-feedback-combo';
    document.getElementById('spanat').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divteam1').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanteam1').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divteam2').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanteam2').className = 'glyphicon glyphicon-ok form-control-feedback';

    for (i = 1; i < 16; i++) {
        document.getElementById('divteam1player' + i).className = 'col-sm-9 has-success has-feedback';
        document.getElementById('spanteam1player' + i).className = 'glyphicon glyphicon-ok form-control-feedback';
        document.getElementById('divteam1jersey' + i).className = 'col-sm-2 has-success';
    }

    for (i = 1; i < 16; i++) {
        document.getElementById('divteam2player' + i).className = 'col-sm-9 has-success has-feedback';
        document.getElementById('spanteam2player' + i).className = 'glyphicon glyphicon-ok form-control-feedback';
        document.getElementById('divteam2jersey' + i).className = 'col-sm-2 has-success';
    }

    document.getElementById('divumpire1').className = 'col-sm-11 has-success has-feedback';
    document.getElementById('spanumpire1').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divumpire2').className = 'col-sm-11 has-success has-feedback';
    document.getElementById('spanumpire2').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divscorer1').className = 'col-sm-11 has-success has-feedback';
    document.getElementById('spanscorer1').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divscorer2').className = 'col-sm-11 has-success has-feedback';
    document.getElementById('spanscorer2').className = 'glyphicon glyphicon-ok form-control-feedback';
}

function errorWithSymbol(field) {
    document.getElementById('div' + field).className = 'col-sm-9 has-error has-feedback';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}

function errorTextWithSymbol(field) {
    document.getElementById('div' + field).className = 'col-sm-11 has-error has-feedback';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}

function errorComboWithSymbol(field) {
    document.getElementById('div' + field).className += ' has-error has-feedback-combo';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}

function errorWithoutSymbol(field) {
    document.getElementById(field).className += ' has-error';
}