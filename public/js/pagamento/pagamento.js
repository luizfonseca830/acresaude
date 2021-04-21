$(document).ready(function($){
    //MASK
    $('#cep').mask('99999-999')
    $('#cpf').mask('999.999.999-99')
    $('#celular').mask('(99) 99999-9999')
    $('#cc-numero').mask('9999 9999 9999 9999')
    $('#cc-expiracao').mask('99/9999')
    $('#cc-cvv').mask('999')

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

    $('#preencher').click(function (){
        console.log(1)
    })

    $('#credito').click(function (){
        $('#sumir-boleto').attr('hidden', true)
        $('#sumir-cartao').removeAttr('hidden')

    })
});

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('estado').value=(conteudo.uf);
        document.getElementById('municipio').value=(conteudo.localidade);
        document.getElementById('endereco').value=(conteudo.bairro + ', ' + conteudo.logradouro);
    } //end if.
    else {

    }
}
