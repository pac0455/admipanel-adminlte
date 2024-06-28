export const getDataSource = response => {
    const dataSource = []
    if (response.length) {
        response.forEach(event => {
            if (event.recurrent) {
                const rango = [new Date().getFullYear() - 100, new Date().getFullYear() + 100]
                for (let year = rango[0]; year <= rango[1]; year++) {
                    dataSource.push({
                        id: event.id,
                        name: event.name,
                        fecha: formatFecha(new Date(event.year, event.month -1, event.day)),
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
                    fecha: formatFecha(new Date(event.year, event.month -1, event.day)),
                    startDate: new Date(event.year, event.month - 1, event.day),
                    endDate: new Date(event.year, event.month - 1, event.day),
                    color: event.color,
                    recurrent: false
                })
            }
        })
    }
    return dataSource
}
export const actualizarCalendar = (calendar) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: 'holidays/show',
            method: 'GET',
            success: function(response) {
                calendar.setDataSource(getDataSource(response));
                resolve(response)
            },
            error: function(error) {
                console.error('Error al actualizar el calendario:', error)
                reject(error)
            }
        })
    })
}
export const createEventRow = (evento) => {

    const eventoData = JSON.stringify(evento)
    return /*html*/`
        <tr>
            <td>${evento.name}</td>
            <td>${formatFecha(evento.startDate)}</td>
            <td>
                <button class="btn btn-info edit-btn" data-id="${evento.id}" onclick='open_editar(${eventoData})'>
                    <i class="fa fas fa-wd fa-edit"></i>
                </button>
                <button class="btn btn-danger edit-btn"  onclick='delete_editar(${evento.id})'>
                    <i class="fa fas fa-wd fa-trash"></i>
                </button>
            </td>
        </tr>
    `
}
export const formatFecha = (event) => {

    let fecha = new Date(event)
    let dia = fecha.getDate()
    let mes = fecha.getMonth() + 1
    let anio = fecha.getFullYear()
    return `${dia}/${mes}/${anio}`
}
