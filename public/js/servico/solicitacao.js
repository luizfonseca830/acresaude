$(document).ready(function ($) {
    //MASK
    $('#rg').mask('99.999.999-9')
    $('#telefone').mask('(99) 9999-9999')
    $('#celular').mask('(99) 99999-9999')
    //VAR GLOBAL
    var maxchars = 500
    $('#procedimento').keyup(function () {
        $(this).val($(this).val().substring(0, maxchars));
        var tlength = $(this).val().length;
        $('#total_textarea').text(maxchars - tlength)
        remain = maxchars - parseInt(tlength);
        $('#procedimento').text(remain);
    })


});
