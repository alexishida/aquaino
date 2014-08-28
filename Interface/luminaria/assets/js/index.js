function modoIluminacao(modo, confirmacao) {
    var resposta = false;

    if (confirmacao) {
        resposta = confirm("Deseja mesmo alterar o modo de iluminação?");
    }
    else {
        resposta = true;
    }

    if (modo == "manual") {

        if (resposta) {
            $("#btn_modo_automatico").removeClass("btn-default btn-primary");
            $("#btn_modo_manual").removeClass("btn-default btn-primary");

            $("#modo_automatico").removeClass("esconder");
            $("#modo_manual").removeClass("esconder");

            $("#btn_modo_automatico").addClass("btn-default");
            $("#btn_modo_manual").addClass("btn-primary");
            $("#modo_automatico").addClass("esconder");

            $('#btn_modo_manual').prop("disabled", true);
            $('#btn_modo_automatico').prop("disabled", false);
        }
    }

    if (modo == "automatico") {

        if (resposta) {
            $("#btn_modo_automatico").removeClass("btn-default btn-primary");
            $("#btn_modo_manual").removeClass("btn-default btn-primary");

            $("#modo_automatico").removeClass("esconder");
            $("#modo_manual").removeClass("esconder");

            $("#btn_modo_automatico").addClass("btn-primary");
            $("#btn_modo_manual").addClass("btn-default");
            $("#modo_manual").addClass("esconder");


            $('#btn_modo_manual').prop("disabled", false);
            $('#btn_modo_automatico').prop("disabled", true);
        }


    }


}




function forcarTempestade(status) {
   
    if (status) {

            $("#btn_ftempestade_on").removeClass("btn-default btn-success");
            $("#btn_ftempestade_off").removeClass("btn-default btn-danger");
        
            $("#btn_ftempestade_on").addClass("btn-success");
             $("#btn_ftempestade_off").addClass("btn-default");

            $('#btn_ftempestade_on').prop("disabled", true);
            $('#btn_ftempestade_off').prop("disabled", false);
    }
    else {
        
            $("#btn_ftempestade_on").removeClass("btn-default btn-success");
            $("#btn_ftempestade_off").removeClass("btn-default btn-danger");
        
            $("#btn_ftempestade_off").addClass("btn-danger");
            $("#btn_ftempestade_on").addClass("btn-default");

            $('#btn_ftempestade_on').prop("disabled", false);
            $('#btn_ftempestade_off').prop("disabled", true);
    }
}



function modoTempestade(status) {
   
    if (status) {

            $("#btn_mtempestade_on").removeClass("btn-default btn-success");
            $("#btn_mtempestade_off").removeClass("btn-default btn-danger");
        
            $("#btn_mtempestade_on").addClass("btn-success");
             $("#btn_mtempestade_off").addClass("btn-default");

            $('#btn_mtempestade_on').prop("disabled", true);
            $('#btn_mtempestade_off').prop("disabled", false);
    }
    else {
        
            $("#btn_mtempestade_on").removeClass("btn-default btn-success");
            $("#btn_mtempestade_off").removeClass("btn-default btn-danger");
        
            $("#btn_mtempestade_off").addClass("btn-danger");
            $("#btn_mtempestade_on").addClass("btn-default");

            $('#btn_mtempestade_on').prop("disabled", false);
            $('#btn_mtempestade_off').prop("disabled", true);
    }
}