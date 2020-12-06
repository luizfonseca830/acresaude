document.addEventListener('DOMContentLoaded', function() {
    $('#selectMedico').click(function () {
        var _token = $("input[name='_token']").val();
        var selectMedico = $('#selectMedico :selected').val();

        $('#selectAgenda').empty();
        $('#selectAgenda').append('<option value="">Não Selecionado</option>')

        $.ajax({
            url: "/ajax/busca",
            type:'POST',
            data: {_token:_token, medico_id:selectMedico},
            success: function(data) {
                console.log(data)
                if (data.length >= 1){
                   for (var i = 0; i < data.length; i++){
                       let data1 = new Date(data[i].data_consulta);
                       let dataFormatada = (data1.getDate() + "-" + ((data1.getMonth() + 1)) + "-" + ( data1.getFullYear()) + " " + ( data1.getHours() + ':' + data1.getMinutes()) );
                       $('#selectAgenda').append('<option value=" '+data[i].id+' ">'+dataFormatada+'</option>')
                   }
                }
            }
        });
    });
});
