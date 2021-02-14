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
                setTimeout(function(){
                    $("#card").animate({height: "-0px"});
                    $("#card").animate({height: "77px"});
                }, 10   );
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
                if (data.length >= 1){
                    console.log(data)
                    adicionarNoSelect(data)
                }
                else {
                    $('#horario').prop("disabled", true);
                    $('#horario').empty()
                    $('#horario').append($('<option>', {
                        value:  '',
                        text: 'Não Selecionado'
                    }));
                }
            }
        });
    })

    function adicionarNoSelect(data){
        $('#horario').removeAttr('disabled')
        $('#horario').empty()
        $('#horario').append($('<option>', {
            value:  '',
            text: 'Não Selecionado'
        }));
        data.forEach(function (item){
            $('#horario').append($('<option>', {
                value: item.id,
                text: moment(item.data_consulta, 'YYYY/MM/DD HH:mm').format('DD-MM-YYYY HH:mm')
            }));
        })

        $('#confirma_pagamento').removeAttr('hidden')
    }


    //PAGAMETO
    // $("#confirma_pagamento").click(function (){
    //     const rota_pagamento = $('#rota_pagamento').val()
    //     const agenda_id = $('#horario option:selected').val()
    //     const _token = $("input[name='_token']").val();
    //     $.ajax({
    //         url: rota_pagamento,
    //         type: 'POST',
    //         data: {
    //             _token: _token,
    //            agenda_id: agenda_id,
    //         },
    //         success: function (data) {
    //             const page = data.url
    //             console.log(data)
    //             // window.open(page, '_blank')
    //             // verificar_status(data.id)
    //             const rotas_minhas_compras = $('#rota_minha_compras').val()
    //             // window.location.replace(rotas_minhas_compras);
    //             console.log(1)
    //         },
    //         failed: function (data){
    //             console.log(data)
    //         }
    //     });
    // })

    function verificar_status(id){
        $('#processando').removeAttr('hidden')
        $('#horario').attr('disabled', true)
        $('#medico').attr('disabled', true)
        $('#confirma_pagamento').attr('hidden', true)
    }


});
