<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$ambienteControlador = new AmbienteController();
///VALIDAR ELIMINAR AMBIENTE///
if (isset($_GET['op']) && is_numeric($_GET['op'])) {
    $ambienteControlador->eliminarAmbienteControlador();
}
$datos = $ambienteControlador->listarAmbientesControlador();
///SWEETALERT///
if (isset($_GET['op']) && $_GET['op'] == 'success') {
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: "<?php echo ($_GET['op'] == 'success') ? 'success' : 'error'; ?>",
                title: "<?php echo ($_GET['op'] == 'success') ? 'Ambiente Eliminado' : 'Error';  ?>",
                text: "<?php echo ($_GET['op'] == 'success') ? '¡Ambiente Eliminado Correctamente' : 'Error al eliminar el Ambiente'; ?>",
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
                    $msg = '¡Ambiente Registrado Correctamente!';
                    $estado = 'success';
                    break;
                case 'err-ins':
                    $msg = '¡ERROR: Ambiente NO Registrado!';
                    $estado = 'danger';
                    break;
                case 'ok-up':
                    $msg = '¡Ambiente Actualizado Correctamente!';
                    $estado = 'success';
                    break;
                case 'err-up':
                    $msg = '¡El ambiente NO se actualizó!';
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
            <h1>LISTADO DE AMBIENTES</h1>
        </div>
        <div class="col text-end">
            <?php echo $_SESSION['nombreUsuario'] ?>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre Ambiente</th>
                <th scope="col">Tipo de Ambiente</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos as $ambiente) {
            ?>
                <tr>
                    <th scope="row"><?php echo $ambiente['ambientesnombre'] ?></th>
                    <td><?php echo $ambiente['tipoambientes'] ?></td>
                    <td><?php echo $ambiente['observaciones'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>ambientes/editar/<?php echo $ambiente['id']; ?>"><i class="bi bi-pencil-square"></i>Editalo</a>
                        |
                        <a href="#" onclick="eliminarAmbiente(<?php echo $ambiente['id'] ?>)"><i class="bi bi-trash3-fill"></i>Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function eliminarAmbiente(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgba(216, 204, 207, 1)',
        cancelButtonColor: '#99a935ff',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?php echo BASE_URL; ?>ambientes/ambientes/' + id;
        }
    })
}
</script>