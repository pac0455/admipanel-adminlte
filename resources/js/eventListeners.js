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
$('#edit_info').click(function () {
    $('#info').modal('hide')
    $('#edit').modal('show')
})
window.open_editar = (evento) => {
    $('#nombre_edit').val(evento.name)
    $('#edit_color').val(evento.color)
    $('#edit_recurrent').prop('checked', evento.recurrent || false)
    $('#edit').modal('show')
}
$('#edit_save').click(function(){
    const id= $('[data-id]').data()
    console.log(id)
})
