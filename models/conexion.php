<?php
 class Conexion{

    public function conectar(){
        $pdo = new PDO("mysql:host=localhost;dbname=pruebamvc","root","190523");
        return $pdo; 
    }
 }