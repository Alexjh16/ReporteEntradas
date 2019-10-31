<<<<<<< HEAD
<?php 
class Usuario extends database{
    public function read(){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM usuarios");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FECTH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }
}
=======
<?php 
class Usuario extends database{
    public function read(){
        try{
            $stm = parent::Connect()->prepare("SELECT * FROM usuarios");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FECTH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }
}
>>>>>>> 98c877f3bce33b32f97c40ef632d3ccacccbde58
?>