$(document).ready(function ($) {
    $("#espe").keyup(function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var rota = $("#rota").val();
        console.log(rota)
        var especialidade = $("#espe").val();

        $.ajax({
            url: rota,
            type: 'POST',
            data: {
                _token: _token,
                especialidade: especialidade,
            },
            success: function (data) {
                setTimeout(function () {
                    $("#card").animate({height: "-0px"});
                    $("#card").animate({height: "77px"});
                }, 10);
                verificar(data)
            }
        });
    });

    function verificar(data) {
        if ($.isEmptyObject(data.error)) {
            if (data.length <= 0) {
                var container = $('#container').html('');
                html = '<h4 class="text-danger">Ops, nada foi encontrado</h4>';
                container.html(html)
            } else {
                var container = $('#container').html('');
                html = '<h4>Especialides Online</h4>';
                data.forEach(function (especialidade) {
                    html += ('<div><div class="card" id="card">\n' +
                        '                        <div class="card-body">\n' +
                        '                            <div class="row justify-content-center align-content-lg-center -align-center">\n' +
                        '                                <div class="col col-3">\n' +
                        '                                    <h6 style="font-weight: bold">' + especialidade.especialidade + '</h6>\n' +
                        '                                </div>\n' +
                        '                                <div class="col col-9">\n' +
                        '                                    <div class="text-right">\n' +
                        '                                        <i class="pe-7s-signal"></i>\n' +
                        '                                        <input type="button" class="btn btn-primary" value="Agendar">\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div></div>')
                })
                container.html(html)
            }
        }
    }

    $('#medico').click(function () {
        const medico_id = $('#medico option:selected').val()
        const especialidade_id = $('#especialidade_id').val()
        const route = $('#rota_busca').val()
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token: _token,
                especialidade_id: especialidade_id,
                medico_id: medico_id
            },
            success: function (data) {
                if (data.length >= 1) {
                    adicionarNoSelect(data)
                } else {
                    $('#horario').prop("disabled", true);
                    $('#horario').empty()
                    $('#horario').append($('<option>', {
                        value: '',
                        text: 'Não Selecionado'
                    }));
                }
            }
        });
    })

    function adicionarNoSelect(data) {
        $('#horario').removeAttr('disabled')
        $('#horario').empty()
        $('#horario').append($('<option>', {
            value: '',
            text: 'Não Selecionado'
        }));
        data.forEach(function (item) {
            $('#horario').append($('<option>', {
                value: item.id,
                text: moment(item.data_consulta, 'HH:mm').format('HH:mm')
            }));
        })

        $('#confirma_pagamento').removeAttr('hidden')
    }

    let price = 0;
    $('#confirma_pagamento[data-time]').click(async function () {
        if ($(this).attr('data-time') >= 1) {
            if ($('#logado').val() != true) { //logado
                $('#modal-login').addClass('show')
                $('#modal-login').css('display', 'block');
            }
            var price = await getPrice($(this).attr('data-time'))
            var priceString = price.toString().replace(',', '')//CONVERTION STRING REMOVE ,

            var checkout = new PagarMeCheckout.Checkout({
                encryption_key: $('#api_key_encryption').val(),
                success: function (data) {
                    $('#modal-confirm-pagament').css('display', 'block')
                    $('#modal-confirm-pagament').addClass('show')
                    $('#dataToken').val(data.token)
                    $('#dataPrice').val(priceString)
                },
                error: function (err) {
                    // console.log('erro')
                    window.location.assign($('#route_login_acess').val())
                },
                close: function () {
                    console.log('The modal has been closed.');
                }
            })

            checkout.open({
                amount: priceString,
                customerData: 'true',
                createToken: 'true',
                paymentMethods: 'credit_card',
                maxInstallments: 3,
                items: [{
                    id: $('id').attr('data-time'), //NUMERO NA LOJA
                    title: 'Consulta - Online',
                    unit_price: priceString,
                    quantity: 1,
                    tangible: 'false'
                }]
            })
        }
    })

    $('#confirm_login').click(function (){
        window.location.assign($('#route_login_acess').val())
    })

    function verificar_status(id) {
        $('#processando').removeAttr('hidden')
        $('#horario').attr('disabled', true)
        $('#medico').attr('disabled', true)
        $('#confirma_pagamento').attr('hidden', true)
    }

    async function getPrice(id) {
       try {
           const res = await getDataAgenda($('#route_price').val(), id)
           return res
       } catch (e) {
           console.log(e)
       }
    }

    function getData(routeReceive){
        const route = routeReceive
        return $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token: $("input[name='_token']").val(),
                id: $('#horario').val()
            }
        })
    }

    function getDataAgenda(routeReceive, id){
        const route = routeReceive
        return $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token: $("input[name='_token']").val(),
                id: id
            }
        })
    }

    async function sendTransaction(){

    }

    $('#modal-confirm-pagament').click(function () {
        $('#modal-confirm-pagament').css('display', 'none');
    })

    $('#close_login').click(function () {
        $('#modal-login').css('display', 'none');
    })

});
