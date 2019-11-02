<?php 
class AdministradorController extends Login{

    private $Usuarios;
    public function __Construct(){
        $this->Usuarios = new Usuario();
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

    public function ViewReport(){
        $title = "Reportes | Empleados";
        $numero_documento = $_POST['numero_documento'];
        $user_exist = $this->Usuarios->validateUser($numero_documento);
        if($user_exist == true){
            print("si");
        }
        else{
            header("location:?class=Administrador&method=Reportes&ErrorUser=true");
        }
        require_once("views/administrador/verreporte.php");
    }
}
?>