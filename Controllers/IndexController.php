<?php 


class IndexController{
    
    public function index(){
        require_once('views/Index/Index.php');
        //require_once('views/Layouts/footer.php');
    }
    public function acercaDeNosotros(){
        require_once('views/Index/AcercaDeNosotros.php');
    }
    public function contactos(){
        require_once('views/Index/Contactos.php');
    }
}

?>