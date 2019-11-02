<?php 
date_default_timezone_set("America/Bogota");
class EmpleadoController extends Login{
    private $Usuario;
    private $Report;

    public function __Construct(){
        try{
            $this->Usuario = new Usuario();
            $this->Report = new Reporte();
        }
        catch(Exception $error){
            die("Error found in file controllers/EmpleadoController.php:: ".$error->getMessage());
        }
    }

    public function DiligenciarReporte(){
        $title = "Empleados | Diligenciar Reporte";
        $fecha_reporte = date("Y-m-d");
        $is_report_true = $this->Usuario->ValidarReporte($_SESSION['user_empleado']->id_usuario, $fecha_reporte);
        require_once("views/empleado/diligenciarreporte.php");
    }

    public function VerReportes(){
        $title = "Empleados | Ver Reporte";
        $ReportesUsuarios = $this->Report->ViewReport($_SESSION['user_empleado']->id_usuario);

        function CalculateMonth($month){
                switch($month){
                    case 1:
                        $month  = "Enero";
                        print ("Enero");
                        return $month;
                    break;
    
                    case 2:
                        $month  = "Febrero";
                        print("Febrero");
                        return $month;
                    break;
    
                    case 3:
                        $month  = "Enero";
                        print("Marzo");
                        return $month;
                    break;
                    
                    case 4:
                        $month  = "Abril";
                        print("Abril");
                        return $month;
                    break;
                    
                    case 5:
                        $month  = "Mayo";
                        print("Mayo");
                        return $month;
                    break;
    
                    case 6:
                        $month  = "Junio";
                        print("Junio");
                        return $month;
                    break;
    
                    case 7:
                        $month  = "Julio";
                        print("Julio");
                        return $month;
                    break;
    
                    case 8:
                        $month  = "Agosto";
                        print("Agosto");
                        return $month;
                    break;
    
                    case 9:
                        $month  = "Septiembre";
                        print("Septiembre");
                        return $month;
                    break;
    
                    case 10:
                        $month  = "Octubre";
                        print("Octubre");
                        return $month;
                    break;
    
                    case 11:
                        $month  = "Noviembre";
                        print("Noviembre");
                        return $month;
                    break;
    
                    case 12:
                        $month  = "Diciembre";                    
                        print("Diciembre");
                        return $month;
                    break;
                    
                }
        }
        require_once("views/empleado/verreportes.php");
    }

    public function EnviarReporte(){
        $numero_documento = $_POST['numero_documento'];
        if(!empty($_POST['dato_entrada'])){
            $dato_entrada = $_POST['dato_entrada'];
            if($dato_entrada != $numero_documento){
                header("location:?class=Empleado&method=DiligenciarReporte&WrongDocument=true");
            }
            else{
                $fk_documento_usuario = $_POST['fk_documento_empleado'];
                $fecha_reporte = date("Y-m-d");
                $dato_entrada = date("Y-m-d:H:i:s");
                $is_report_true = $this->Usuario->ValidarReporte($fk_documento_usuario, $fecha_reporte);
                if(count($is_report_true) == 0) {
                    $this->Usuario->InsertarReporteEntrada($fk_documento_usuario, $fecha_reporte, $dato_entrada);
                    header("location:?class=Empleado&method=DiligenciarReporte&DatoEntrada=true");
                }
            }
        }   

        if(!empty($_POST['dato_salida'])){
            $dato_salida = $_POST['dato_salida'];
            if($dato_salida != $numero_documento){
                header("location:?class=Empleado&method=DiligenciarReporte&WrongDocument=true");
            }
            else{
                $fk_documento_usuario = $_POST['fk_documento_empleado'];
                $dato_salida = date("Y-m-d:H:i:s");
                $fecha_reporte = date("Y-m-d");
                $this->Usuario->InsertarReporteSalida($dato_salida, $fecha_reporte, $fk_documento_usuario);
                header("location:?class=Empleado&method=DiligenciarReporte&DatoSalida=true");
            }
        }          
        
    }
}
?>