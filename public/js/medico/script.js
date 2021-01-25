$(document).ready(function ($) {
    $(".date-time").mask('00/00/0000 00:00:00');
    $('#inputPreco').mask('#,##0,00', {reverse: true});
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".saveEvent").click(function () {

        let id = $("#modalCalendar input[name='id']").val();
        let title = $("#modalCalendar input[name='titulo']").val();
        let especialidade = $("#modalCalendar select option:selected").val();
        let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format('YYYY-MM-DD HH:mm:ss');
        let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format('YYYY-MM-DD HH:mm:ss');
        let intervalo = $("#modalCalendar input[name='intervalo']").val();
        let descricao = $("#modalCalendar textarea[name='descricao']").val();
        let preco = $("#modalCalendar input[name='preco']").val();

        let Event = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            titulo: title,
            start: start,
            end: end,
            description: descricao,
            intervalo: intervalo,
            auxEspecialidade: especialidade,
            preco: preco,
        }
        let route;
        if (id == '') {
            route = routeEvente("routeEventStore")
            Event._method = 'POST'
        } else {
            route = routeEvente('routeEventUpdate')
            Event.id = id
            Event._method = 'PUT'
        }
        $retorno = sendEvent(route, Event)
    })

    $(".deletEvent").click(function () {
        let id = $("#modalCalendar input[name='id']").val();
        let Event = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            _method: 'PUT',
        }
        let route = routeEvente("routeEventDelete")
        sendEvent(route, Event)
    })

})

function routeEvente(route) {
    return document.getElementById('calendar').dataset[route];
}

function resetForm(form) {
    $(form)[0].reset()
}

function sendEvent(route, data_) {
    $.ajax({
        url: route,
        data: data_,
        method: "POST",
        async: false,
        dataType: 'json',
        success: function (json) {
            if (json) {
                location.reload()
            }

        },
        error: function (errors) {

            if (errors.responseJSON.errors.titulo && $("#modalCalendar #erro-title").length == 0) {
                $('#form-title').append("<div class='alert alert-danger' id='erro-title'>" + errors.responseJSON.errors.titulo + "</div>")
            }

            if (errors.responseJSON.errors.auxEspecialidade && $("#modalCalendar #erro-especilidade").length == 0) {
                $('#form-especialidade').append("<div class='alert alert-danger' id='erro-especilidade'>" + errors.responseJSON.errors.auxEspecialidade + "</div>")
            }

            if (errors.responseJSON.errors.start && $("#modalCalendar #erro-start").length == 0) {
                $('#form-start').append("<div class='alert alert-danger' id='erro-start'>" + errors.responseJSON.errors.start + "</div>")
            }

            if (errors.responseJSON.errors.end && $("#modalCalendar #erro-end").length == 0) {
                $('#form-end').append("<div class='alert alert-danger' id='erro-end'>" + errors.responseJSON.errors.end + "</div>")
            }

            if (errors.responseJSON.errors.intervalo && $("#modalCalendar #erro-intervalo").length == 0) {
                $('#form-intervalo').append("<div class='alert alert-danger' id='erro-intervalo'>" + errors.responseJSON.errors.intervalo + "</div>")
            }

            if (errors.responseJSON.errors.description && $("#modalCalendar #erro-description").length == 0) {
                $('#form-descricao').append("<div class='alert alert-danger' id='erro-description'>" + errors.responseJSON.errors.description + "</div>")
            }

            if (errors.responseJSON.errors.preco && $("#modalCalendar #erro-preco").length == 0) {
                $('#form-preco').append("<div class='alert alert-danger' id='erro-preco'>" + errors.responseJSON.errors.preco + "</div>")
            }
        }
    })
}
