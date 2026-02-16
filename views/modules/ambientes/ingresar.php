<?php
$usuarioControlador = new UsuarioController();
$usuarioControlador->ingresarUsuarioControlador();
?>

<div class="container">
    <form method="post">
        <fieldset>
            <legend>Inicio de Sesión</legend>
            <div class="row">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo del Usuario</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña del Usuario</label>
                    <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
                </div>
            </div>
            <button type="submit" name="ingresar" class="btn btn-primary">Ingresar</button>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['action'])) {
        if (isset($_GET['op'])) {
            if ($_GET['op'] == 'err_usu') {
                $msg = '¡ERROR: Usuario o Contraseña INCORRECTA!';
            } elseif ($_GET['op'] == 'intentos') {
                $msg = "¡ERROR: Acabas de superar el número de intentos!";
            } elseif ($_GET['op'] == 'exist') {
                $msg = '¡ERROR: El Usuario NO Existe!';
            } else {
                $msg = '¡ERROR: Problema al iniciar sesión!';
            }
    ?>
            <div class="alert alert-danger mt-3" role="alert">
                <p><?php echo $msg; ?></p>
            </div>
    <?php
        }
    }
    ?>
</div>