import Calendar from 'js-year-calendar'
import 'js-year-calendar/dist/js-year-calendar.css'

const formatFecha = (date) => {
  let fecha = new Date(date)
  let dia = fecha.getDate()
  let mes = fecha.getMonth() + 1
  let anio = fecha.getFullYear()
  let fechaFormateada = `${dia}/${mes}/${anio} `
  return fechaFormateada
}
$(document).ready(function () {
  const calendar = new Calendar('#calendar', {
    language: 'es',
    clickDay: function (e) {
      $('#myModal').modal('show');
      let fecha = formatFecha(e.date);
      $('#fecha').val(fecha);
    },
    mouseOnDay: e=>{
        console.log(e)
    }
  });

  $('#close').click(function () {
    $('#myModal').modal('hide');
  });

  $.ajax({
    url: 'holidays/show',
    method: 'GET',
    success: function (response) {
      const dataSource = [];

      response.forEach(date => {
        if (date.recurrent) {
          let rango = [new Date().getFullYear() - 100, new Date().getFullYear() + 100];
          for (let year = rango[0]; year <= rango[1]; year++) {
            dataSource.push({
              startDate: new Date(year, date.month - 1, date.day),
              endDate: new Date(year, date.month - 1, date.day),
              color: 'green'
            });
          }
        } else {
          dataSource.push({
            startDate: new Date(date.year, date.month - 1, date.day),
            endDate: new Date(date.year, date.month - 1, date.day),
            color: 'green'
          });
        }
      });

      calendar.setDataSource(dataSource);
    },
    error: function (error) {
      console.error(error);
    }
  });
  calendar.render();
});
