<?php 
class LogoutController{
    public function __construct(){
        session_destroy();
        header("location:?class=Home&method=login");
    }
}
?>