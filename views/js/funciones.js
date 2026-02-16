//Constante url //
const base_url = "http://localhost/proyectoseguridad/";

function eliminarUsuario(id) {
    //COSTANTE URL///
    const base_url = "http://localhost/proyectoseguridad/";
    Swal.fire({
        title: "¿Estas seguro de eliminar este usuario?",
        text: "¡Esta accion no se puede recuperar!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = base_url + 'usuarios/usuarios/' + id;
        }
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const botones = document.querySelectorAll(".btn-eliminar");

    botones.forEach(boton => {
        boton.addEventListener('click', function (e) {
            e.preventDefault();
            let id = this.getAttribute('data_id');

            Swal.fire({
                title: "¿Estas seguro de eliminar este usuario?",
                text: "¡Esta accion no se puede recuperar!",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = base_url + 'usuarios/usuarios/' + id;
                }
            });
        })
    })
})