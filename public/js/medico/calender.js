document.addEventListener('DOMContentLoaded', function () {

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        locale: 'pt-br',
        navLinks: true,
        selectable: true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function (arg) {
            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        },
        events: routeEvente('routeLoadAgenda'),
        eventClick: function (element) {
            console.log(element)
            resetForm("#formEvent")
            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Alterar Evento');
            $("#modalCalendar button.deletEvent").css("display", "flex")
            let title = element.event.title
            $("#modalCalendar input[name='titulo']").val(title);
            let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(start);
            let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(end);
            let intervalo = element.event.extendedProps.intervalo
            $("#modalCalendar input[name='intervalo']").val(intervalo);
            let descricao = element.event.extendedProps.description;
            $("#modalCalendar textarea[name='descricao']").val(descricao);
            let id = element.event.id;
            $("#modalCalendar input[name='id']").val(id);

            let preco = element.event.extendedProps.preco;
            $("#modalCalendar input[name='preco']").val(preco);
        },
        select: function (element) {
            resetForm("#formEvent")

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Adicionar Evento');
            $("#modalCalendar button.deletEvent").css("display", "none")

            let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(end);

            calendar.unselect()
        },
        eventDrop: function (element) {

            let start = moment(element.event.start).format('YYYY-MM-DD HH:mm:ss')
            let end = moment(element.event.end).format('YYYY-MM-DD HH:mm:ss')

            let newEvent = {
                _token:  $('meta[name="csrf-token"]').attr('content'),
                _method: 'PUT',
                id: element.event.id,
                intervalo: element.event.extendedProps.intervalo,
                start: start,
                end: end,
            }
            route = routeEvente('routeEventDropUpdate')
            sendEvent(route, newEvent)
        }
    });
    calendar.render();

});

console.log(routeEvente('routeLoadAgenda'))

