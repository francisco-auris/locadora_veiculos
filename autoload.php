<?php
function __autoload( $class ){
    
    $exp_class = explode( '/', str_replace('\\', '/', $class) );
    $path = strtolower( '_'.$exp_class[0] );
    $file = $exp_class[1];

    $uri = $path . DS . $file.'.php';

    if( file_exists( $uri ) )
    {
        require_once $uri;
    }
    else {
        throw new Exception( $uri." not include request namespace.." );
    }


}