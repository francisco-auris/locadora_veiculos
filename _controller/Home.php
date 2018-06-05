<?php
namespace Controller;

class home {

    function __construct(){

        $this->mountWindow();

    }

    private function mountWindow(){
        require_once '_view/home.php';
    }

}