function gravarDados() {

    var valor_01 = $('#slider_canal_01').slider('getValue');
    var valor_02 = $('#slider_canal_02').slider('getValue');
    var valor_03 = $('#slider_canal_03').slider('getValue');
    var valor_04 = $('#slider_canal_04').slider('getValue');
    var valor_05 = $('#slider_canal_05').slider('getValue');
    var valor_06 = $('#slider_canal_06').slider('getValue');
    var valor_07 = $('#slider_canal_07').slider('getValue');
    
    var potencia_maxima = $('#slider_potencia_maxima').slider('getValue');
    
    var tempestade_manual = $('#tempestade_forcar').val();

    var tempestade = $('#modo_tempestade').val();
    
    var modo = $('#modo_luminaria').val();
    




    var dados = "acao=atualizarLuzes&modo="+modo+"&tempestade="+tempestade+"&tempestade_manual="+tempestade_manual+"&canal_01="+valor_01+"&canal_02="+valor_02+"&canal_03="+valor_03+"&canal_04="+valor_04+"&canal_05="+valor_05+"&canal_06="+valor_06+"&canal_07="+valor_07+"&potencia_maxima="+potencia_maxima; 
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: dados,
        success: function(data, textStatus, jqXHR)
        {
           
        },
        error: function(jqXHR, textStatus, errorThrown)
        {

        }
    });


}


function modoIluminacao(modo, confirmacao,gravar) {
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

            $('#modo_luminaria').val('1');
            
            
            /*Envia os dados para o banco*/
            if(gravar) {
                gravarDados();
            } 
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
            
            
            $('#modo_luminaria').val('2');
            
             /*Envia os dados para o banco*/
            if(gravar) {
                gravarDados();
            } 
        }


    }


}



function forcarTempestade(status,gravar) {

    if (status) {

        $("#btn_ftempestade_on").removeClass("btn-default btn-success");
        $("#btn_ftempestade_off").removeClass("btn-default btn-danger");

        $("#btn_ftempestade_on").addClass("btn-success");
        $("#btn_ftempestade_off").addClass("btn-default");

        $('#btn_ftempestade_on').prop("disabled", true);
        $('#btn_ftempestade_off').prop("disabled", false);
        $('#tempestade_forcar').val('1');
        
         /*Envia os dados para o banco*/
            if(gravar) {
                gravarDados();
            } 
    }
    else {

        $("#btn_ftempestade_on").removeClass("btn-default btn-success");
        $("#btn_ftempestade_off").removeClass("btn-default btn-danger");

        $("#btn_ftempestade_off").addClass("btn-danger");
        $("#btn_ftempestade_on").addClass("btn-default");

        $('#btn_ftempestade_on').prop("disabled", false);
        $('#btn_ftempestade_off').prop("disabled", true);
        $('#tempestade_forcar').val('0');
        
         /*Envia os dados para o banco*/
            if(gravar) {
                gravarDados();
            } 
    }
}



function modoTempestade(status,gravar) {

    if (status) {

        $("#btn_mtempestade_on").removeClass("btn-default btn-success");
        $("#btn_mtempestade_off").removeClass("btn-default btn-danger");

        $("#btn_mtempestade_on").addClass("btn-success");
        $("#btn_mtempestade_off").addClass("btn-default");

        $('#btn_mtempestade_on').prop("disabled", true);
        $('#btn_mtempestade_off').prop("disabled", false);
        $('#modo_tempestade').val('1');
        
         /*Envia os dados para o banco*/
            if(gravar) {
                gravarDados();
            } 
    }
    else {

        $("#btn_mtempestade_on").removeClass("btn-default btn-success");
        $("#btn_mtempestade_off").removeClass("btn-default btn-danger");

        $("#btn_mtempestade_off").addClass("btn-danger");
        $("#btn_mtempestade_on").addClass("btn-default");

        $('#btn_mtempestade_on').prop("disabled", false);
        $('#btn_mtempestade_off').prop("disabled", true);
        $('#modo_tempestade').val('0');
        
         /*Envia os dados para o banco*/
            if(gravar) {
                gravarDados();
            } 
    }
}



function callBackSliders() {

    /*
     * slideStart
     * slide
     * slideStop
     $('#slider_canal_01').slider().on('slideStop', function(ev){
     var valor_01 = $('#slider_canal_01').slider('getValue');
     alterarKnob('#knob_canal_01',valor_01);
     });
     */


    $('#slider_canal_01').slider().on('slide', function() {
        var valor = $('#slider_canal_01').slider('getValue');
        alterarKnob('#knob_canal_01', valor);
    });
 
    $('#slider_canal_01').slider().on('slideStop', function() {
        gravarDados();
    });
    
   
    $('#slider_canal_02').slider().on('slide', function() {
        var valor = $('#slider_canal_02').slider('getValue');
        alterarKnob('#knob_canal_02', valor);
    });
    $('#slider_canal_02').slider().on('slideStop', function() {
        gravarDados();
    });


    $('#slider_canal_03').slider().on('slide', function() {
        var valor = $('#slider_canal_03').slider('getValue');
        alterarKnob('#knob_canal_03', valor);
    });
    $('#slider_canal_03').slider().on('slideStop', function() {
        gravarDados();
    });


    $('#slider_canal_04').slider().on('slide', function() {
        var valor = $('#slider_canal_04').slider('getValue');
        alterarKnob('#knob_canal_04', valor);
    });
    $('#slider_canal_04').slider().on('slideStop', function() {
        gravarDados();
    });
    
    
    $('#slider_canal_05').slider().on('slide', function() {
        var valor = $('#slider_canal_05').slider('getValue');
        alterarKnob('#knob_canal_05', valor);
    });
    $('#slider_canal_05').slider().on('slideStop', function() {
        gravarDados();
    });
    

    $('#slider_canal_06').slider().on('slide', function() {
        var valor = $('#slider_canal_06').slider('getValue');
        alterarKnob('#knob_canal_06', valor);
    });
    $('#slider_canal_06').slider().on('slideStop', function() {
        gravarDados();
    });


    $('#slider_canal_07').slider().on('slide', function() {
        var valor = $('#slider_canal_07').slider('getValue');
        alterarKnob('#knob_canal_07', valor);
    });
    $('#slider_canal_07').slider().on('slideStop', function() {
        gravarDados();
    });
    
    
     $('#slider_potencia_maxima').slider().on('slideStop', function() {
        gravarDados();
    });



}

function alteraSliderPotencia(valor) {
    alteraSlider('#slider_potencia_maxima', valor);
}

function alteraTodosSliders(canal_01, canal_02, canal_03, canal_04, canal_05, canal_06, canal_07) {

    alteraSlider('#slider_canal_01', canal_01);
    alteraSlider('#slider_canal_02', canal_02);
    alteraSlider('#slider_canal_03', canal_03);
    alteraSlider('#slider_canal_04', canal_04);
    alteraSlider('#slider_canal_05', canal_05);
    alteraSlider('#slider_canal_06', canal_06);
    alteraSlider('#slider_canal_07', canal_07);
}


function alteraSlider(id, valor) {
    $(id).slider('setValue', valor);
}



function alterarTodosKnobs(canal_01, canal_02, canal_03, canal_04, canal_05, canal_06, canal_07) {
    alterarKnob('#knob_canal_01', canal_01);
    alterarKnob('#knob_canal_02', canal_02);
    alterarKnob('#knob_canal_03', canal_03);
    alterarKnob('#knob_canal_04', canal_04);
    alterarKnob('#knob_canal_05', canal_05);
    alterarKnob('#knob_canal_06', canal_06);
    alterarKnob('#knob_canal_07', canal_07);
}




function alterarKnob(id, valor) {
    $(id).val(valor).trigger('change');
}

