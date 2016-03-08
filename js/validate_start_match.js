/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateBatsmanOpenForm(myform) {
    var batsman1 = myform["batsman1"].value;
    var batsman2 = myform["batsman2"].value;

    var bool = new Boolean();
    bool = true;

    resetBatsman();

    if (batsman1 == batsman2) {
        bool = false;
        BatsmanErrorComboWithSymbolWarning('batsman1');
        BatsmanErrorComboWithSymbolWarning('batsman2');
    }
    if (batsman1 === "select") {
        bool = false;
        BatsmanErrorComboWithSymbol('batsman1');
    }
    if (batsman2 === "select") {
        bool = false;
        BatsmanErrorComboWithSymbol('batsman2');
    }

    if (bool === true) {
        document.forms("batsman_open_form").submit();
    }
}

function resetBatsman() {
    document.getElementById('divbatsman1').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanbatsman1').className = 'glyphicon glyphicon-ok form-control-feedback';

    document.getElementById('divbatsman2').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanbatsman2').className = 'glyphicon glyphicon-ok form-control-feedback';
}

function BatsmanErrorComboWithSymbol(field) {
    document.getElementById('div' + field).className += ' has-error has-feedback-combo';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}

function BatsmanErrorComboWithSymbolWarning(field) {
    document.getElementById('div' + field).className += ' has-warning has-feedback-combo';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-warning-sign form-control-feedback';
}