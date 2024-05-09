document.addEventListener('DOMContentLoaded', function () {
 
    if (mensagemErro) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: mensagemErro,
        })
    }
    if(mensagemAlerta){
        Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: mensagemAlerta,
        })
    }
    if(mensagemSucesso){
        Swal.fire({
            icon: 'success',
            title: 'Sucesso',
            text: mensagemSucesso,
        })
    }
});