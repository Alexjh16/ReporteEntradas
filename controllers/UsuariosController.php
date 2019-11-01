<?php 
class UsuariosController extends Login{
    private $Usuario;

    public function __Construct(){
        try{
            $this->Usuario = new Usuario;
        }
        catch(Exception $error){
            die("Error found in file controllers/UsuariosController.php:: ".$error->getMessage());
        }
    }
    public function administrador(){
        require_once("views/administrador/index.php");
    }

    public function empleado(){
        require_once("views/empleado/index.php");
    }

    public function RegistrarEmpleado(){
        if($_POST['clave'] == $_POST['confirmar_clave']){

            $data = array(
                "fk_tipo_documento" => $_POST['fk_tipo_documento'],
                "fk_cargo" => $_POST['fk_cargo'],
                "numero_documento" => $_POST['numero_documento'],
                "nombres" => $_POST['nombres'],
                "apellidos" => $_POST['apellidos'],
                "email" => $_POST['email'],
                "clave" => $_POST['clave']
            ); 

            $this->Usuario->Insert($data);
            header("location:?class=Administrador&method=Registro&Inserted=true");
        }
        else{
            header("location:?class=Administrador&method=Registro&PasswordError=true");
        }        
    }
}
?>