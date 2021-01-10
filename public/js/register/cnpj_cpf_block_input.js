$(document).ready(function($){
    //CAREGAR A PAGINA
    var cpf =  $('#cpf').val();
    var cnpj =  $('#cnpj').val();
    if (cpf) {
        $('#cnpj').prop('disabled', true)
    }
    else {
        $('#cnpj').prop('disabled', false)
    }

    if (cnpj) {
        $('#cpf').prop('disabled', true)
    }
    else {
        $('#cpf').prop('disabled', false)
    }

    //acoes do user
    $('#cpf').keyup(function (){
        var cpf =  $('#cpf').val();
        if (cpf) {
            $('#cnpj').prop('disabled', true)
        }
        else {
            $('#cnpj').prop('disabled', false)
        }
    });

    $('#cnpj').keyup(function (){
        var cnpj =  $('#cnpj').val();
        if (cnpj) {
            $('#cpf').prop('disabled', true)
        }
        else {
            $('#cpf').prop('disabled', false)
        }
    });


})
