<?php
namespace Controller;

class Html {

    public static function getHeader( $titulo ){
        require_once '_view/header.part.php';
    }

    public static function getFooter(){
        require_once '_view/footer.part.php';
    }

    public static function getTopo(){
        require_once '_view/topo.part.php';
    }

    public static function getMenu(){
        require_once '_view/main.part.php';
    }

    public static function getRPFooter(){
        require_once '_view/minfooter.part.php';
    }

    public static function incView( $file ){

        $uri = '_view/'.$file.'.php';

        if( file_exists( $uri ) ){
            require_once $uri;
        }
        else {
            throw new \Exception( '<b>' . $uri . '</b> not find view..' );
        }

    }

}