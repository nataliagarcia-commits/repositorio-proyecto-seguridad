<?php
require_once '../../controllers/usuariocontroller.php';
require_once '../../models/usuariomodelo.php';

class Ajax
{
    public $usuarioValidar;
    public $emailValidar;

    public function validarUsuarioAjax()
    {
        $datos = $this->usuarioValidar;
        $usuarioControlador = new UsuarioController();
        $respuesta = $usuarioControlador->validarUsuarioControlador($datos);
        return $respuesta;
    }
    public function validarEmailAjax()
    {
        $dato = $this->emailValidar;
        $usuarioControlador = new UsuarioController;
        $respuesta = $usuarioControlador->validarUsuarioEmailControlador($dato);
        echo $respuesta;
    }
}

///creacion de objetos tipo ajax//
$ajax = new ajax();
if (isset($_POST['varusuario'])) {
    $ajax->usuarioValidar = $_POST['varusuario'];
    $ajax->validarUsuarioAjax();
} elseif (isset($_POST['email'])) {
    $ajax->emailValidar = $_POST['email'];
    $ajax->validarEmailAjax();
}
