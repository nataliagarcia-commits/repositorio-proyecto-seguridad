<?php
class EnlacesPaginasModelo{
    //METODO PARA GESTIONAR LOS ENLACES
    public function enlacesPaginas($enlace, $carpeta = null){
        ///RUTA BASE DE LAS VIEWS///
        $basePath = 'views/modules/';
        $ruta = "{$basePath}{$enlace}";

        ///VERIFICAR SI EXISTE CARPETA///
        if(isset($carpeta)){
            $ruta .= "/{$carpeta}";

        }
        $ruta .= '.php';

        ///VERIFICAR SI EXISTE LA RUTA///
        if(!file_exists($ruta)){
            $ruta = $basePath . "errorpagina.php";
        }
        return $ruta;
    }
}