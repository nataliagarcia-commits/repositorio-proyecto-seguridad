<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$usuarioControlador = new UsuarioController();
$usuarioControlador->registrarUsuarioControlador();
?>
<div class="container">
    <div class="row">
        <?php echo $_SESSION['nombreUsuario'] ?> 
    </div>
    <form method="post" onsubmit="return validarRegistroUsuario();">
        <fieldset>
            <legend>Registrar Usuarios</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nombreRegistro" class="form-label">Nombre Completo del Usuario</label>
                        <input type="text" id="nombreRegistro" name="nombreRegistro"
                            class="form-control" pattern="[A-Za-z]{,18}" title="Por favor, digite maximo 18 caracteres." 
                            maxlength="18" placeholder="Nombre Completo" required>
                        <div id="error-nombre" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="emailRegistro" class="form-label">Correo Electronico del Usuario</label>
                        <input type="text" name="emailRegistro" id="emailRegistro" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                            class="form-control" placeholder="Correo Electronico" required>
                        <div id="error-email" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="claveRegistro" class="form-label">Contraseña del Usuario</label>
                        <input type="text" id="claveRegistro" name="claveRegistro"
                            class="form-control" minlength="6" placeholder="Contraseña" 
                            title="Por favor, debe contener al menos un numero y una letra mayuscula y minuscula, 
                            y al menos 6 o mas caracteres." required>
                        <div id="error-clave" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="form-check">
                        <input type="checkbox" name="terminos" id="terminos" class="for-check-input">
                        <label for="terminos" class="form check-label">
                            Acepto los <a href="terminos" target="blank"> Terminos y Condiciones</a>
                        </label>
                        <div id="error-terminos" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
            </div>
            <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['action'])) {
        if(isset($_GET['dato']) && $_GET['dato'] == 'fal') {
            $msg = '¡ERROR: Faltan datos en el Formulario!';
            $clase = 'alert-danger';
        }
        elseif(isset($_GET['dato']) && $_GET['dato'] == 'fal-prg') {
            $msg = '¡ERROR: Ingreso de datos errados en el Formulario!';
            $clase = 'alert-danger';
        }
    ?>
        <div class="alert <?php echo (isset($clase)) ? $clase : ''; ?> mt-2" role="alert">
            <?php echo (isset($msg)) ? $msg : ''; ?>
        </div>

    <?php
    }
    ?>

</div>