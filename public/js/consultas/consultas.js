$(document).ready(function () {
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
});
