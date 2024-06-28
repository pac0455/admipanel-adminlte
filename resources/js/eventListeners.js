import { calendar } from "./calendar"
import { actualizarCalendar, createEventRow } from "./func"
$('#close_add').click(function () {
    $('#myModal').modal('hide')
})
$('#close_info').click(function () {
    $('#info').modal('hide')
})
$('#add_info').click(function () {
    $('#info').modal('hide')
    $('#myModal').modal('show')
})
$('#edit_save').click(function () {
    const id = $('[data-id]').data('id');
    console.log(id);
    $.ajax({
        url: `/holidays/${id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'PUT', // Aquí utilizamos PUT para la actualización
        data: {
            name: $('#nombre_edit').val(),
            color: $('#color_edit').val(),
            fecha : $('#fecha_edit').val(),
            recurrent: $('#recurrent').is(':checked') ? 1 : 0
        },
        async success(response) {
            await actualizarCalendar(calendar)
            const eventosContainer = $('#info').find('[data-eventos]')
            eventosContainer.empty()
            const [dia, mes, anio] = $('#data_date').val().split('/')
            const eventos = calendar.getDataSource().filter(event => event.fecha == `${dia}/${mes}/${anio}`)
            eventos.forEach(evento => eventosContainer.append(createEventRow(evento)))
            $('#info').modal('hide')
        },
        error(error) {
            console.log(error)
        }
    });
});

$('#close_edit').click(function () {
    $('#edit').modal('hide')
})
window.open_editar = (evento) => {
    $('#nombre_edit').val(evento.name)
    $('#edit_color').val(evento.color)
    $('#edit_recurrent').prop('checked', evento.recurrent || false)
    $('#fecha_edit').val($('#data_date').val())
    $('[data-id]').attr(String(evento.id))
    $('#edit').modal('show')
}
window.delete_editar = (id) => {
    $.ajax({
        url: `holidays/${id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'DELETE',
        success: async (response) => {
            await actualizarCalendar(calendar)
            const eventosContainer = $('#info').find('[data-eventos]')
            eventosContainer.empty()
            const [dia, mes, anio] = $('#data_date').val().split('/')
            const eventos = calendar.getDataSource().filter(event => event.fecha == `${dia}/${mes}/${anio}`)
            eventos.forEach(evento => eventosContainer.append(createEventRow(evento)))
            if (response.length) {
                $('#myModal').modal('hide')
                $('#info').modal('show')
            } else {
                $('#info').modal('hide')
                $('#myModal').modal('show')
            }
        }
    })
}
$('#edit_save').click(function () {
    const id = $('[data-id]').data()
    $.ajax({
        url: `holidays/${id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: $('#name').val(),
            date: $('#date').val(),
            color: $('#color').val(),
            recurrent: $('#recurrent').is(':checked') ? 1 : 0
        },
        method: 'POST',
        success: (response) => {
            actualizarCalendar(calendar)
            const eventosContainer = $('#info').find('[data-eventos]')
            eventosContainer.empty()
        }
    })
})
