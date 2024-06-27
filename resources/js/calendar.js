import Calendar from 'js-year-calendar'
import 'js-year-calendar/dist/js-year-calendar.css'

const formatFecha = (event) => {
    let fecha = new Date(event)
    let dia = fecha.getDate()
    let mes = fecha.getMonth() + 1
    let anio = fecha.getFullYear()
    return `${dia}/${mes}/${anio}`
}

const createEventRow = (evento) => {
    const eventoData = JSON.stringify(evento);
    return /*html*/`
        <tr>
            <td>${evento.name}</td>
            <td>${formatFecha(evento.startDate)}</td>
            <td>
                <button class="btn btn-secondary edit-btn" data-id="${evento.id}" onclick='open_editar(${eventoData})'>Editar</button>
            </td>
        </tr>
    `
}


$(document).ready(function () {
    const calendar = new Calendar('#calendar', {
        language: 'es',
        clickDay: function (e) {
            const eventosContainer = $('#info').find('[data-eventos]')
            eventosContainer.empty()
            if (e.events.length) {
                $('#info').modal('show')
                e.events.forEach(evento => {
                    eventosContainer.append(createEventRow(evento))
                })
            } else {
                $('#myModal').modal('show')
            }
            $('#fecha').val(formatFecha(e.date))
        }
    })



    $('#close_edit').click(function () {
        $('#edit').modal('hide')
    })

    $.ajax({
        url: 'holidays/show',
        method: 'GET',
        success: function (response) {
            const dataSource = []
            if (response.length) {
                response.forEach(event => {
                    if (event.recurrent) {
                        const rango = [new Date().getFullYear() - 100, new Date().getFullYear() + 100]
                        for (let year = rango[0]; year <= rango[1]; year++) {
                            dataSource.push({
                                id: event.id,
                                name: event.name,
                                startDate: new Date(year, event.month - 1, event.day),
                                endDate: new Date(year, event.month - 1, event.day),
                                color: event.color,
                                recurrent: true
                            })
                        }
                    } else {
                        dataSource.push({
                            id: event.id,
                            name: event.name,
                            startDate: new Date(event.year, event.month - 1, event.day),
                            endDate: new Date(event.year, event.month - 1, event.day),
                            color: event.color,
                            recurrent: false
                        })
                    }
                })
            }
            calendar.setDataSource(dataSource)
        },
        error: function (error) {
            console.error(error)
        }
    })
})

