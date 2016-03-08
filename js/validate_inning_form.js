function validateInningForm(myform) {
    var bat1 = myform["bat1"].value;
    var ball1 = myform["ball1"].value;
    var bat2 = myform["bat2"].value;
    var ball2 = myform["ball2"].value;

    var bool = new Boolean();
    bool = true;

    resetInning();

    if (bat1 === "select") {
        bool = false;
        inningErrorComboWithSymbol('bat1');
    }
    if (ball1 === "select") {
        bool = false;
        inningErrorComboWithSymbol('ball1');
    }
    if (bat2 === "select") {
        bool = false;
        inningErrorComboWithSymbol('bat2');
    }
    if (ball2 === "select") {
        bool = false;
        inningErrorComboWithSymbol('ball2');
    }

    if (bool === true) {
        document.forms("inning_form").submit();
    }
}

function resetInning() {
    document.getElementById('divbat1').className = 'col-md-11 has-success has-feedback-combo';
    document.getElementById('spanbat1').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divball1').className = 'col-md-11 has-success has-feedback-combo';
    document.getElementById('spanball1').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divbat2').className = 'col-md-11 has-success has-feedback-combo';
    document.getElementById('spanbat2').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divball2').className = 'col-md-11 has-success has-feedback-combo';
    document.getElementById('spanball2').className = 'glyphicon glyphicon-ok form-control-feedback';
}

function inningErrorComboWithSymbol(field) {
    document.getElementById('div' + field).className += ' has-error has-feedback-combo';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}