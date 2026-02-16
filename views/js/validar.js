var usuarioExiste = false;
var emailExiste = false;

//Constante url //
const base_url = "http://localhost/proyectoseguridad/";

// validar usuario unico con AJAX//
$("nombreRegistro".change(function () {
    var usuario = $("nombreRegistro").val();
    var datos = new FormData();
    datos.append('varusuario', usuario);

    $.ajax({
        url: base_url + 'views/modules/ajax.php',
        metodo: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if ($respuesta == 1) {
                usuarioExiste = true;
                $("#error-nombre").html('Este usuario ya Existe');
            }
            else {
                $("error-nombre").html('');

            }
        }
    });
}));

// Validar nombre de usuario único al editar con AJAX
$("#editarnombre").change(function () {
    var usuario = $("#editarnombre").val();
    var datos = new FormData();
    datos.append('varusuarioEditar', usuario);

    $.ajax({
        url: base_url + 'views/modules/ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            if (respuesta == 1) {
                $("#error-nombre").html('Este nombre de usuario ya existe');
            } else {
                $("#error-nombre").html('');
                usuarioExiste = false;
            }
        },
        error: function () {
            console.error("Error en la solicitud AJAX");
        }
    });
});

// validar email unico con Ajax
$("emailRegistro").change(function () {
    var email = $("emailRegistro").val();
    var dato = new FormData();
    dato.append('email', email);
    $.ajax({
        url: base_url + 'views/modules/ajax.php',
        metodo: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function ($respuesta) {
            emailExiste = true;
            if ($respuesta == 1) {
                $("#error-email").html('Este Correo Electronico ya Existe');
            }
            else {
                emailExiste = false;
                $("error-email").html('');
            }
        }
    });
});

///FUNCION PARA VALIDAR REGISTRO USUARIO///
function validarRegistroUsuario() {
    var nombre = document.querySelector('#nombreRegistro');
    var email = document.querySelector('#emailRegistro');
    var clave = document.querySelector('#claveRegistro');
    var terminos = document.querySelector('#terminos');

    ///EXPRESIONES///
    var nombreExpresion = /^[A-Za-z]{1,18}$/;
    var emailExpresion = /^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/;
    var claveExpresion = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

    ///VALIDAR NOMBRE USUARIO///
    if (nombre.value.trim() !== '') {
        if (nombre.value.length > 18) {
            document.querySelector('#error-nombre').innerHTML = 'Por favor, digite maximo 18 caracteres.';
            return false;
        }
        if (!nombreExpresion.test(nombre.value)) {
            document.querySelector('#error-nombre').innerHTML = 'Por favor, digite solo letras.'
            return false;
        }
    } else {
        document.querySelector("#error-nombre").innerHTML = '¡Este campo es OBLIGATORIO!';
    }

    ///VALIDAR EMAIL USUARIO///
    if (email.value.trim() == '') {
        document.querySelector("#error-email").innerHTML = '¡Este campo es OBLIGATORIO!';
    }
    else if (!emailExpresion.test(email.value)) {
        document.querySelector("#error-email").innerHTML = 'Por favor, ingrese una direccion de correo valida';
        return false;
    }

    ///VALIDAR CLAVE USUARIO///
    if (clave.value.trim() == '') {
        document.querySelector("#error-clave").innerHTML = '¡Este campo es OBLIGATORIO!';
        return false;
    }
    else if (clave.value.length < 6) {
        document.querySelector('#error-clave').innerHTML = 'Por favor, digite minimo 6 caracteres.';
        return false;
    }
    else if (!claveExpresion.test(clave.value)) {
        document.querySelector("#error-clave").innerHTML = 'Por favor, debe contener al menos un numero y una letra mayuscula y minuscula, y al menos 6 o mas caracteres.';
        return false;
    }

    ///VALIDAR TERMINOS Y CONDICIONES
    if (!terminos.checked) {
        document.querySelector("#error-terminos").innerHTML = 'Debe aceptar los terminos y condiciones.';
        return false;
    }

    ///return false;

}
///FIN FUNCION VALIDAR USUARIO///

///LIMPIAR CAJAS DE ERROR
document.querySelector("#nombreRegistro").addEventListener('input', function () {
    document.querySelector("#error-nombre").innerHTML = '';
})
document.querySelector("#emailRegistro").addEventListener('input', function () {
    document.querySelector("#error-email").innerHTML = '';
})
document.querySelector("#claveRegistro").addEventListener('input', function () {
    document.querySelector("#error-clave").innerHTML = '';
})