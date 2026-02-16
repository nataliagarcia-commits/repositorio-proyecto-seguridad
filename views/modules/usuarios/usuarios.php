<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$usuarioControlador = new UsuarioController();
///VALIDAR ELIMINAR USUARIO///
if (isset($_GET['op']) && is_numeric($_GET['op'])) {
    $usuarioControlador->eliminarUsuarioControlador();
}
$datos = $usuarioControlador->listarUsuariosControlador();
///SWEETALERT///
if (isset($_GET['op']) && $_GET['op'] == 'success') {
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: "<?php echo ($_GET['op'] == 'success') ? 'success' : 'error'; ?>",
                title: "<?php echo ($_GET['op'] == 'success') ? 'Usuario Eliminado' : 'Error';  ?>",
                text: "<?php echo ($_GET['op'] == 'success') ? '¡Usuario Eliminado Correctamente' : 'Error al eliminar el Usuario'; ?>",
                confirmButtonText: 'Aceptar'
            })
        })
    </script>
<?php
}
?>
<div class="container">
    <div class="row">
        <?php
        if (isset($_GET['op'])) {
            switch ($_GET['op']) {
                case 'ok-ins':
                    $mg = '¡Usuario Registrado Correctamente!';
                    $estado = 'success';
                    break;
                case 'er-ins':
                    $mg = '¡ERROR: Usuario NO Registrado!';
                    $estado = 'danger';
                    break;
                case 'ok-up':
                    $mg = '¡Usuario Actualizado Correctamente!';
                    $estado = 'success';
                    break;
                case 'err-up':
                    $mg = '¡El usuario NO se actualizo!';
                    $estado = 'warning';
                    break;
            }
        }
        if (isset($msg)) {
        ?>
            <div class="alert alert-<?php echo $estado ?> mt-3" role="alert">
                <p><?php echo $msg; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col">
            <h1>LISTADO DE USUARIOS</h1>
        </div>
            <?php echo $_SESSION['nombreUsuario'] ?></div> 
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos as $usuarios) {
            ?>
                <tr>
                    <th scope="row"><?php echo $usuarios['nombre'] ?></th>
                    <td><?php echo $usuarios['email'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>usuarios/editar/<?php echo $usuarios['id']; ?>"><i class="bi bi-pencil-square"></i>Editar</a>
                        |
                        <a href="#" onclick="eliminarUsuario(<?php echo $usuarios['id'] ?>)"><i class="bi bi-trash3-fill"></i>Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>