function mostrar(){
    $('#borregos1').toggle();
    $('#borregos2').toggle();
}

function mostrar2(){
    $('#alpacas1').toggle();
    $('#alpacas2').toggle();
}

function mostrar3(){
    $('#vacunos1').toggle();
    $('#vacunos2').toggle();
}

function ver_borregos(){
    $('#box_borregos').show();
    $('#box_borregosb').hide();
    $('#box_alpacas').hide();
    $('#box_alpacasb').hide();
    $('#box_vacunos').hide();
    $('#box_vacunosb').hide();
}
function ver_borregosb(){
	$('#box_borregos').hide();
    $('#box_borregosb').show();
    $('#box_alpacas').hide();
    $('#box_alpacasb').hide();
    $('#box_vacunos').hide();
    $('#box_vacunosb').hide();
}
function ver_alpacas(){
    $('#box_borregos').hide();
    $('#box_borregosb').hide();
    $('#box_alpacas').show();
    $('#box_alpacasb').hide();
    $('#box_vacunos').hide();
    $('#box_vacunosb').hide();
}
function ver_alpacasb(){
	$('#box_borregos').hide();
    $('#box_borregosb').hide();
    $('#box_alpacas').hide();
    $('#box_alpacasb').show();
    $('#box_vacunos').hide();
    $('#box_vacunosb').hide();
}
function ver_vacunos(){
    $('#box_borregos').hide();
    $('#box_borregosb').hide();
    $('#box_alpacas').hide();
    $('#box_alpacasb').hide();
    $('#box_vacunos').show();
    $('#box_vacunosb').hide();
}
function ver_vacunosb(){
	$('#box_borregos').hide();
    $('#box_borregosb').hide();
    $('#box_alpacas').hide();
    $('#box_alpacasb').hide();
    $('#box_vacunos').hide();
    $('#box_vacunosb').show();
}

function mostrarEmp(){
    $('#empadre1').toggle();
    $('#empadre2').toggle();
    $('#empadre3').toggle();
    $('#empadre4').toggle();
}

function ver_empadre(){
    $('#box_empadre1').show();
    $('#box_empadre2').hide();
    $('#box_empadre3').hide();
    $('#box_empadre4').hide();
}
function ver_empadreb(){
    $('#box_empadre1').hide();
    $('#box_empadre2').show();
    $('#box_empadre3').hide();
    $('#box_empadre4').hide();
}
function ver_empadrec(){
    $('#box_empadre1').hide();
    $('#box_empadre2').hide();
    $('#box_empadre3').show();
    $('#box_empadre4').hide();
}
function ver_empadred(){
    $('#box_empadre1').hide();
    $('#box_empadre2').hide();
    $('#box_empadre3').hide();
    $('#box_empadre4').show();
}