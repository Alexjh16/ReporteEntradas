<?php 
class LoginController extends Login{
    private $usuario;

    public function __construct(){
        try{
            $this->usuario = new Usuario();
        }
        catch(Exception $error){
            die("Error found in file controllers/LoginController.php:: ".$error->getMessage());
        }
    }

    public function login(){
        $title = "Home | Login";
        require_once("views/home/login.php");
    }

    public function register(){
        //form register
    }

    public function auth(){
        $identificacion_usuario = $_POST['identificacion_usuario'];
        $clave_usuario = $_POST['clave_usuario'];
        $usuario = $this->usuario->validateUser($identificacion_usuario);
            
        if (((@$usuario->numero_documento == $identificacion_usuario) || (@$usuario->correo_usuario == $identificacion_usuario)) && (@$usuario->clave_usuario == $clave_usuario)){

            if(@$usuario->fk_rol == 2){
                global $title;
                $title = "Administrador | Home";
                $_SESSION['user_administrador'] = $usuario;
                require_once("views/administrador/index.php");
            }            
            else{
                global $title;
                $title = "Empleado | Home";
                $_SESSION['user_empleado'] = $usuario;
                require_once("views/empleado/index.php");
            }            
        }
        else{
            header("location:?class=Home&method=login&errorLogin=true");
        }
    }
}
?>