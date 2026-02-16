<?php

///IMPORTACION DE LA CONEXION A LA BASE DE DATOS///
include_once 'conexion.php';

class AmbienteModelo extends Conexion
{
    ///METODO PARA INSERTAR AMBIENTES (CREATE)///
    public function registrarAmbienteModelo($datos)
    {
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("INSERT INTO ambientes (ambientesnombre, tipoambientes, observaciones) VALUES (:nombre, :tipo, :observaciones)");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $stmt->bindParam(':observaciones', $datos['observaciones'], PDO::PARAM_STR);
        $resultado = $stmt->execute();
        ///CERRAR CONEXIONES
        $stmt = null;
        $pdo = null;
        if ($resultado) {
            return "success";
        } else {
            return "error";
        }
    }

    ///METODO PARA LISTAR AMBIENTES///
    public function listarAmbientesModelo()
    {
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('SELECT * FROM ambientes ORDER BY id desc');
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///METODO PARA LISTAR UN AMBIENTE POR ID
    public function listarAmbienteIdModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('SELECT * FROM ambientes WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///METODO PARA ACTUALIZAR AMBIENTE///
    public function actualizarAmbienteModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('UPDATE ambientes SET ambientesnombre = :nombre, tipoambientes = :tipo, observaciones = :observaciones WHERE id = :id');
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $stmt->bindParam(':observaciones', $datos['observaciones'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = 'success';
        }
        else{
            $resultado = 'error';
        }
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///METODO PARA ELIMINAR AMBIENTE
    public function eliminarAmbienteModelo($id)
    {
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('DELETE FROM ambientes WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            //VERIFICAR ELIMINAR REGISTRO//nnnnnnn
            if ($stmt->rowCount() > 0) {
                $respuesta = 'success';
            } else {
                $respuesta = 'error';
            }
        }
        $stmt = null;
        $pdo = null;
        return $respuesta;
    }
}