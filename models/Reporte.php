<?php 
class Reporte extends database{
    public function ViewReport($fk_documento_usuario){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM reportes WHERE fk_documento_usuario = $fk_documento_usuario");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Errour found in file controllers/Reporte.php:: ".$error->getMessage());
        }
    }    
}
?>