/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateWicketForm(myform) {
    var howout = myform["howout"].value;
    var catchby = myform["catch"].value;
    var batsman = myform["batsman"].value;

    var bool = new Boolean();
    bool = true;

    resetWicket();

    if (howout === "select") {
        bool = false;
        wicketErrorComboWithSymbol('howout');
    }
    if (document.getElementById('catchblock').className == 'form-group') {
        if (catchby === "select") {
            bool = false;
            wicketErrorComboWithSymbol('catch');
        }
    }
    if (batsman === "select") {
        bool = false;
        wicketErrorComboWithSymbol('batsman');
    }

    if (bool === true) {
        document.forms("wicket_form").submit();
    }
}

function resetWicket() {
    document.getElementById('divhowout').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanhowout').className = 'glyphicon glyphicon-ok form-control-feedback';
    document.getElementById('divcatch').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spancatch').className = 'glyphicon glyphicon-ok form-control-feedback';
    document.getElementById('divbatsman').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanbatsman').className = 'glyphicon glyphicon-ok form-control-feedback';
}

function wicketErrorComboWithSymbol(field) {
    document.getElementById('div' + field).className += ' has-error has-feedback-combo';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}