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
}
?>