<?php 
class Login extends database{
    public function CheckSessionAdmin(){
        try{
            if(!(isset($_SESSION['user_administrador']))){
                session_destroy();
                header("location:?class=Home&method=login");
            }
        }
        catch(Exception $error){
            die("Error found in file controllers/SecurityController.php");
        }
    }

    public function CheckSessionEmpleado(){
        try{
            if(!(isset($_SESSION['user_empleado']))){
                session_destroy();
                header("location:?class=Home&method=login");
            }
        }
        catch(Exception $error){
            die("Error found in file controllers/SecurityController.php");
        }
    }
}
?>