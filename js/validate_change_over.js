/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateChangeOverForm(myform) {
    var bowler = myform["bowler"].value;
    var bool = new Boolean();
    bool = true;

    resetBowler();

    if (bowler === 'select') {
        bool = false;
        bowlerErrorComboWithSymbol('bowler');
    }

    if (bool === true) {
        document.forms("bowler_form").submit();
    }
}

function resetBowler() {
    document.getElementById('divbowler').className = 'col-sm-12 has-success has-feedback-combo';
    document.getElementById('spanbowler').className = 'glyphicon glyphicon-ok form-control-feedback';
}

function bowlerErrorComboWithSymbol(field) {
    document.getElementById('div' + field).className += ' has-error has-feedback-combo';
    document.getElementById('span' + field).className = 'glyphicon glyphicon-remove form-control-feedback';
}