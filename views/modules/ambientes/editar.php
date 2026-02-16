<?php
session_start();
if(!$_SESSION['usuarioValido']) {
    header('location:'. BASE_URL. 'inicio');
}
$ambienteControlador = new AmbienteController();
$ambienteControlador->actualizarAmbienteControlador();
$ambiente = $ambienteControlador->listarAmbienteIdControlador();
?>
<div class="container">
    <div class="row">
        Usuario: <?php echo $_SESSION['nombreUsuario'] ?>
    </div>
    <form method="post">
        <fieldset>
            <legend>Actualizar Ambiente</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="editarnombre" class="form-label">Nombre del Ambiente</label>
                        <input type="text" id="editarnombre" name="editarnombre" class="form-control" 
                               placeholder="Nombre del Ambiente" value="<?php echo $ambiente['ambientesnombre'] ?>" 
                               pattern="[A-Za-z0-9\s]{1,50}" title="Máximo 50 caracteres (letras, números y espacios)" required>
                        <input type="hidden" name="id" id="id" value="<?php echo $ambiente['id'] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="editartipo" class="form-label">Tipo de Ambiente</label>
                        <input type="text" name="editartipo" id="editartipo" class="form-control" 
                               placeholder="Tipo de Ambiente" value="<?php echo $ambiente['tipoambientes'] ?>"
                               pattern="[A-Za-z\s]{1,30}" title="Máximo 30 caracteres (solo letras y espacios)" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="editarobservaciones" class="form-label">Observaciones</label>
                        <textarea id="editarobservaciones" name="editarobservaciones" class="form-control" 
                                  placeholder="Observaciones del ambiente" maxlength="200"><?php echo $ambiente['observaciones'] ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['action'])) {
        if (isset($_GET['op'])) {
            if ($_GET['op'] == 'ok-up') {
                $msg = 'Ambiente Actualizado Correctamente';
                $clase = 'alert-success';
            } elseif ($_GET['op'] == 'err-up') {
                $msg = 'Error al Actualizar el Ambiente';
                $clase = 'alert-warning';
            }
    ?>
        <div class="alert <?php echo $clase ?> mt-2" role="alert">
            <?php echo (isset($msg)) ? $msg : ''; ?>
        </div>

    <?php
        }
    }
    ?>
</div>