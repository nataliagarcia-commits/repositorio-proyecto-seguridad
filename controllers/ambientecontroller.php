<?php
class AmbienteController
{
    #METODO PARA REGISTRAR AMBIENTES
    public function registrarAmbienteControlador()
    {
        if (
            isset($_POST['nombreRegistro']) ||
            isset($_POST['tipoRegistro']) ||
            isset($_POST['observacionesRegistro'])
        ) {
            if (
                !empty($_POST['nombreRegistro']) &&
                !empty($_POST['tipoRegistro']) &&
                !empty($_POST['observacionesRegistro'])
            ) {


                $datos = array(
                    'nombre' => $_POST['nombreRegistro'],
                    'tipo' => $_POST['tipoRegistro'],
                    'observaciones' => $_POST['observacionesRegistro']
                );

                ///INSTANCIAR CLASE AMBIENTEMODELO///
                $respuesta = new AmbienteModelo();
                if ($respuesta->registrarAmbienteModelo($datos) == 'success') {
                    header('location:' . BASE_URL . 'ambientes/ambientes/ok-ins');
                    exit();
                } else {
                    header('location:' . BASE_URL . 'ambientes/ambientes/err-ins');
                    exit;
                }
            } else {
                header('location:' . BASE_URL . 'ambientes/registrar&/fal-prg');
                exit;
            }
        }
    }

    ///METODO PARA LISTAR AMBIENTES///
    public function listarAmbientesControlador()
    {
        $ambienteModelo = new AmbienteModelo();
        $resultado = $ambienteModelo->listarAmbientesModelo();
        return $resultado;
    }

    ///METODO PARA LISTAR UN SOLO AMBIENTE POR ID///
    public function listarAmbienteIdControlador()
    {
        if (isset($_GET['op'])) {
            $id = $_GET['op'];
            $ambienteModelo = new AmbienteModelo();
            $ambiente = $ambienteModelo->listarAmbienteIdModelo($id);
            return $ambiente;
        }
    }

    ///METODO PARA ACTUALIZAR AMBIENTE///
    public function actualizarAmbienteControlador()
    {
        if (isset($_POST['editarnombre']) && isset($_POST['editartipo']) && isset($_POST['editarobservaciones'])) {
            $datos = array(
                'nombre' => $_POST['editarnombre'],
                'tipo' => $_POST['editartipo'],
                'observaciones' => $_POST['editarobservaciones'],
                'id' => $_POST['id']
            );
            $ambienteModelo = new AmbienteModelo();
            $respuesta = $ambienteModelo->actualizarAmbienteModelo($datos);
            if ($respuesta == 'success') {
                header('location:' . BASE_URL . 'ambientes/ambientes/ok-up');
                exit();
            } else {
                header('location:' . BASE_URL . 'ambientes/ambientes/err-up');
                exit();
            }
        }
    }

    ///METODO PARA ELIMINAR UN AMBIENTE///
    public function eliminarAmbienteControlador()
    {
        if (isset($_GET['op'])) {
            $id = $_GET['op'];
            $ambienteModelo = new AmbienteModelo();
            $respuesta = $ambienteModelo->eliminarAmbienteModelo($id);
            header('location:' . BASE_URL . 'ambientes/ambientes/' . $respuesta);
            exit();
        }
    }
}
