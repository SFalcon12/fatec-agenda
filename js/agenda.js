
function showMessage(titulo, texto) {
    swal( {title: titulo,
    type: 'success',
    text: texto,
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonClick: "#DD6B55",
    confirmButtonText: 'OK',
    closeOnConfirm: false,
    closeOnEsc: false,
    timer: 10000,
    html: true } );
}