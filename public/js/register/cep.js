$(document).ready(function($){
    //MASK
    $('#cep').mask('99999-999')

    $("#cep").keyup(function() {
        var cepInput = $('#cep').val();
        var cepClear = cepInput.replace(/\D/g, '');
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if(validacep.test(cepClear)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            console.log(1)
            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cepClear + '/json/?callback=meu_callback';
            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        }
    });


});


function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('uf').value=(conteudo.uf);
        document.getElementById('municipio').value=(conteudo.localidade);
        document.getElementById('bairro').value=(conteudo.bairro);
    } //end if.
    else {

    }
}
