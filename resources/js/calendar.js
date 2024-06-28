import Calendar from 'js-year-calendar'
import 'js-year-calendar/dist/js-year-calendar.css'
import {actualizarCalendar,createEventRow} from './func'
const formatFecha = (event) => {
    let fecha = new Date(event)
    let dia = fecha.getDate()
    let mes = fecha.getMonth() + 1
    let anio = fecha.getFullYear()
    return `${dia}/${mes}/${anio}`
}
const calendar = new Calendar('#calendar', {
    language: 'es',
    clickDay: function (e) {
        const eventosContainer = $('#info').find('[data-eventos]')
        eventosContainer.empty()
        if (e.events.length) {
            $('#info').modal('show')
            e.events.forEach(evento => eventosContainer.append(createEventRow(evento)))
        } else {
            $('#myModal').modal('show')
        }
        $('#fecha').val(formatFecha(e.date))
        $('#data_date').val(formatFecha(e.date))
    }
})
$(document).ready(()=>{
    actualizarCalendar(calendar)
})
export {
    calendar
}
