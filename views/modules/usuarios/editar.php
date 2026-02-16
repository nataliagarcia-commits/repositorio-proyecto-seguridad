<?php
session_start();
if(!$_SESSION['usuarioValido']) {
    header('location:'. BASE_URL. 'inicio');
}
$usuarioControlador = new UsuarioController();
$usuarioControlador->actualizarUsuarioControlador();
$usuario = $usuarioControlador->listarUsuarioIdControlador();
?>
<div class="container">
    <div class="row">
        Usuario: <?php echo $_SESSION['nombreUsuario'] ?>
    </div>
    <form method="post">
        <fieldset>
            <legend>Actualizar Usuarios</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="editarnombre" class="form-label">Nombre Completo del Usuario</label>
                        <input type="text" id="editarnombre" name="editarnombre" class="form-control" placeholder="Nombre Completo" value="<?php echo $usuario['nombre'] ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo $usuario['id'] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="editaremail" class="form-label">Correo Electronico del Usuario</label>
                        <input type="email" name="editaremail" id="editaremail" class="form-control" placeholder="Correo Electronico" value="<?php echo $usuario['email'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="editarclave" class="form-label">Contraseña del Usuario</label>
                        <input type="password" id="editarclave" name="editarclave" class="form-control" placeholder="Contraseña">
                    </div>
                </div>
            </div>
            <button type="submit" name="registrar" id="actualizar" class="btn btn-primary">Actualizar</button>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['op'] == 'ok-usu') {
            $msg = 'Usuario Registrado Correctamente';
            $clase = 'alert-success';
        } elseif ($_GET['op'] == 'ins-e') {
            $msg = 'Error al Registrar el Usuario';
            $clase = 'alert-warning';
        }
    ?>
        <div class="alert <?php echo $clase ?> mt-2" role="alert">
            <?php echo (isset($msg)) ? $msg : ''; ?>
        </div>

    <?php
    }
    ?>
</div>