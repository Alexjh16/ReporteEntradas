<?php 
class EmpleadoController extends Login{
    public function DiligenciarReporte(){
        $title = "Empleados | Diligenciar Reporte";
        require_once("views/empleado/diligenciarreporte.php");
    }

    public function VerReportes(){
        $title = "Empleados | Ver Reporte";
        require_once("views/empleado/verreportes.php");
    }

    public function EnviarReporte(){
        $numero_documento = $_POST['numero_documento'];
        if(!empty($_POST['dato_entrada'])){
            $dato_entrada = $_POST['dato_entrada'];
            if($dato_entrada != $numero_documento){
                header("location:?class=Empleado&method=DiligenciarReporte&WrongDocument=true");
            }
        }   

        if(!empty($_POST['dato_salida'])){
            $dato_salida = $_POST['dato_salida'];
            if($dato_salida != $numero_documento){
                header("location:?class=Empleado&method=DiligenciarReporte&WrongDocument=true");
            }
        }          
        
    }
}
?>