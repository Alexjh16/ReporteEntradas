<?php 
class AdministradorController extends Login{

    private $Usuarios;
    private $Reporte;
    public function __Construct(){
        $this->Usuarios = new Usuario();
        $this->Reporte = new Reporte();
    }

    public function Registro(){
        $tipos_documentos = $this->Usuarios->TipoDocumentos();
        $cargos = $this->Usuarios->Cargos();
        $title = "Registro | Empleado";
        require_once("views/administrador/registro.php");
    }
    
    public function Reportes(){
        $title = "Reporte | Empleado";
        require_once("views/administrador/reportes.php");
    }

    public function ViewReportUsuario(){
        $title = "Reporte Fechas | Empleados";
        $fecha_inicial = $_POST['fecha_inicial'];
        $fecha_final = $_POST['fecha_final'];
        $fk_numero_documento = $_POST['fk_numero_documento'];
        if($fk_numero_documento != ''){
            $user_exist = $this->Usuarios->validateUser($fk_numero_documento);
            if($user_exist == true){
                $fk_numero_documento = $user_exist->id_usuario;
                $ReportesUsuarios = $this->Reporte->ViewReportDate($fecha_inicial, $fecha_final, $fk_numero_documento);
            }
            else{
                header("location:?class=Administrador&method=Reportes&ErrorUser=true");
            }
        }
        else{
            $ReportesUsuarios = $this->Reporte->ViewReportDate($fecha_inicial, $fecha_final);
        }

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
        // end function CalculateMonth()


        function CalculateHours($hora_entrada, $hora_salida){
            $hora_entrada = explode(":", $hora_entrada);
            $hora_entrada = $hora_entrada[0];

            $hora_salida = explode(":", $hora_salida);
            $hora_salida = $hora_salida[0];

            print($hora_entrada - $hora_salida);
        }        
        require_once("views/administrador/reportefechas.php");
    }

    public function ViewReport(){
        $title = "Reportes | Empleados";
        $numero_documento = $_POST['numero_documento'];
        $user_exist = $this->Usuarios->validateUser($numero_documento);
        if($user_exist == true){
            $fk_numero_documento = $user_exist->id_usuario;
            $ReportesUsuarios = $this->Reporte->ViewReport($fk_numero_documento);

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
            // end function CalculateMonth()

            function CalculateHours($hora_entrada, $hora_salida){
                $hora_entrada = explode(":", $hora_entrada);
                $hora_entrada = $hora_entrada[0];

                $hora_salida = explode(":", $hora_salida);
                $hora_salida = $hora_salida[0];

                print($hora_entrada - $hora_salida);
            }
            
        }
        else{
            header("location:?class=Administrador&method=Reportes&ErrorUser=true");
        }
        require_once("views/administrador/verreporte.php");
    }
}
?>