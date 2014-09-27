function callBackSliders() {
    
    $('#slider_canal_01').slider().on('slideStop', function() {
        atualizaValores();
    });
    
    $('#slider_canal_02').slider().on('slideStop', function() {
       atualizaValores();
    });
    
     $('#slider_canal_03').slider().on('slideStop', function() {
        atualizaValores();
    });
    
     $('#slider_canal_04').slider().on('slideStop', function() {
        atualizaValores();
    });
    
     $('#slider_canal_05').slider().on('slideStop', function() {
       atualizaValores();
    });
    
     $('#slider_canal_06').slider().on('slideStop', function() {
        atualizaValores();
    });
    
     $('#slider_canal_07').slider().on('slideStop', function() {
       atualizaValores();
    });

}


function atualizaValores() {
        $('#slider_canal_01').val($('#slider_canal_01').slider('getValue'));
        $('#slider_canal_02').val($('#slider_canal_02').slider('getValue'));
        $('#slider_canal_03').val($('#slider_canal_03').slider('getValue'));
        $('#slider_canal_04').val($('#slider_canal_04').slider('getValue'));
        $('#slider_canal_05').val($('#slider_canal_05').slider('getValue'));
        $('#slider_canal_06').val($('#slider_canal_06').slider('getValue'));
        $('#slider_canal_07').val($('#slider_canal_07').slider('getValue'));
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