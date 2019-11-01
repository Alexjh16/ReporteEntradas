<?php 
class LogoutController{
    public function exit(){
        session_destroy();
        header("location:?class=Home&method=login");
    }
}
?>