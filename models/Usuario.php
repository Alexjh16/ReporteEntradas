<?php 
class Usuario extends database{
    public function read(){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM usuarios");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FECTH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }

    public function Insert($data){
        try{
            $id_rol = "1";
            $stm = parent::Connect()->prepare("INSERT INTO usuarios(fk_tipo_documento, fk_cargo, fk_rol, numero_documento, nombres_usuario, apellidos_usuario, correo_usuario, clave_usuario) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $stm->bindParam(1, $data['fk_tipo_documento'], PDO::PARAM_INT);
            $stm->bindParam(2, $data['fk_cargo'], PDO::PARAM_INT);
            $stm->bindParam(3, $id_rol, PDO::PARAM_INT);
            $stm->bindParam(4, $data['numero_documento'], PDO::PARAM_STR);
            $stm->bindParam(5, $data['nombres'], PDO::PARAM_STR);
            $stm->bindParam(6, $data['apellidos'], PDO::PARAM_STR);
            $stm->bindParam(7, $data['email'], PDO::PARAM_STR);
            $stm->bindParam(8, $data['clave'], PDO::PARAM_STR);
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }

    public function ValidarReporte($fk_documento_usuario, $fecha_reporte){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM reportes WHERE fk_documento_usuario = $fk_documento_usuario AND fecha_reporte = '$fecha_reporte'");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;            
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }

    public function InsertarReporteEntrada($fk_documento_usuario, $fecha_reporte, $dato_entrada){
        try{
            $stm = parent::Connect()->prepare("INSERT INTO reportes (fk_documento_usuario, fecha_reporte, hora_entrada) VALUES(?, ?, ?)");
            $stm->bindParam(1, $fk_documento_usuario, PDO::PARAM_INT);
            $stm->bindParam(2, $fecha_reporte, PDO::PARAM_STR);
            $stm->bindParam(3, $dato_entrada, PDO::PARAM_STR);
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Usuarios.php::".$error->getMessage());
        }
    }

    public function InsertarReporteSalida($dato_salida, $fecha_reporte, $fk_documento_usuario){
        try{
            $stm = parent::Connect()->prepare("UPDATE reportes set hora_salida = '$dato_salida' WHERE fecha_reporte = '$fecha_reporte' AND fk_documento_usuario = $fk_documento_usuario");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Usuarios.php::".$error->getMessage());
        }
    }

    public function validateUser($identificacion_usuario){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM usuarios WHERE correo_usuario = '$identificacion_usuario' OR numero_documento = '$identificacion_usuario'");
            $stm->execute();
            $data = $stm->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }

    public function TipoDocumentos(){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM tipo_documento");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }

    public function Cargos(){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM cargos");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }
}
?>