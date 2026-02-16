<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header('location:' . BASE_URL . 'inicio');
}
$ambienteControlador = new AmbienteController();
$ambienteControlador->registrarAmbienteControlador();
?>
<div class="container">
    <div class="row">
        <?php echo $_SESSION['nombreUsuario'] ?> 
    </div>
    <form method="post" onsubmit="return validarRegistroAmbiente();">
        <fieldset>
            <legend>Registrar Ambientes</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nombreRegistro" class="form-label">Nombre del Ambiente</label>
                        <input type="text" id="nombreRegistro" name="nombreRegistro"
                            class="form-control" pattern="[A-Za-z0-9\s]{1,50}" title="Por favor, digite máximo 50 caracteres (letras, números y espacios)." 
                            maxlength="50" placeholder="Nombre del Ambiente" required>
                        <div id="error-nombre" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="tipoRegistro" class="form-label">tipo de ambiente </label>
                        <input type="text" name="tipoRegistro" id="tipoRegistro" pattern="[A-Za-z\s]{1,30}"
                            class="form-control" placeholder="Tipo de Ambiente" 
                            title="Por favor, digite solo letras y espacios (máximo 30 caracteres)." required>
                        <div id="error-tipo" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="observacionesRegistro" class="form-label">Observaciones</label>
                        <textarea id="observacionesRegistro" name="observacionesRegistro"
                            class="form-control" maxlength="220" placeholder="Observaciones del ambiente"
                            title="Máximo 200 caracteres"></textarea>
                        <div id="error-observaciones" style="color:red; font-size:10px;"></div>
                    </div>
                </div>
            </div>
            
            <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registra el ambiente</button>
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

<script>
function validarRegistroAmbiente() {
    let nombre = document.getElementById('nombreRegistro').value;
    let tipo = document.getElementById('tipoRegistro').value;
    let observaciones = document.getElementById('observacionesRegistro').value;
    let terminos = document.getElementById('terminos').checked;
    
    let errorNombre = document.getElementById('error-nombre');
    let errorTipo = document.getElementById('error-tipo');
    let errorObservaciones = document.getElementById('error-observaciones');
    let errorTerminos = document.getElementById('error-terminos');
    
    // Limpiar errores anteriores
    errorNombre.textContent = '';
    errorTipo.textContent = '';
    errorObservaciones.textContent = '';
    errorTerminos.textContent = '';
    
    let valid = true;
    
    // Validar nombre (máximo 50 caracteres, letras, números y espacios)
    if (!/^[A-Za-z0-9\s]{1,50}$/.test(nombre)) {
        errorNombre.textContent = 'El nombre debe contener solo letras, números y espacios (máximo 50 caracteres).';
        valid = false;
    }
    
    // Validar tipo (máximo 30 caracteres, solo letras y espacios)
    if (!/^[A-Za-z\s]{1,30}$/.test(tipo)) {
        errorTipo.textContent = 'El tipo debe contener solo letras y espacios (máximo 30 caracteres).';
        valid = false;
    }
    
    // Validar observaciones (máximo 200 caracteres)
    if (observaciones.length > 200) {
        errorObservaciones.textContent = 'Las observaciones no pueden exceder los 200 caracteres.';
        valid = false;
    }
    
    // Validar términos
    if (!terminos) {
        errorTerminos.textContent = 'Debe confirmar que la información es correcta.';
        valid = false;
    }
    
    return valid;
}
</script>