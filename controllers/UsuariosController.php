<?php 
class UsuariosController extends Login{
    public function administrador(){
        require_once("views/administrador/index.php");
    }

    public function empleado(){
        require_once("views/empleado/index.php");
    }
}
?>