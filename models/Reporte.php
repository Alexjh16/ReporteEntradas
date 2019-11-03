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

    public function ViewReportDate($fecha_inicial, $fecha_final, $fk_numero_documento = ''){
        try{
            if($fk_numero_documento != ''){
                $stm = parent::Connect()->prepare("SELECT numero_documento, nombres_usuario, fecha_reporte, hora_entrada, hora_salida FROM reportes INNER JOIN usuarios ON fk_documento_usuario = usuarios.id_usuario AND fecha_reporte BETWEEN '$fecha_inicial' AND '$fecha_final' AND fk_documento_usuario = $fk_numero_documento");
            }
            else{
                $stm = parent::Connect()->prepare("SELECT numero_documento, nombres_usuario, fecha_reporte, hora_entrada, hora_salida FROM reportes INNER JOIN usuarios ON fk_documento_usuario = usuarios.id_usuario AND fecha_reporte BETWEEN '$fecha_inicial' AND '$fecha_final'");
            }

            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;            
        }
        catch(Exception $error){
            die("Error found in file models/Reporte.php:: ".$error->getMessage());
        }
    }
}
?>