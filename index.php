<?php
//var init system
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
session_start();

include_once "conf.php";
include_once "autoload.php";

//vars superglobal
$_class;

//logic system initial
/*$_SESSION[SS_LOGIN] = 'auris';
$_SESSION[SS_NAME] = 'auris maciel';
$_SESSION[SS_ID] = base64_encode('1');*/

if( isset( $_SESSION[SS_LOGIN] ) and strlen( $_SESSION[SS_LOGIN] ) > 0 )
{
   
    Controller\Html::getHeader( 'Locadora' );
    Controller\Html::getTopo();
    Controller\Html::getMenu();

    if( isset( $_GET['window'] ) and strlen( str_replace( " ", "", $_GET['window'] ) ) > 0 ){
        $_class = 'Controller\\'.ucfirst( $_GET['window'] );
    }
    else {
        $_class = 'Controller\\Home';
    }

    Controller\Html::getRPFooter();
    Controller\Html::getFooter();

}
else {
    
    $_class = 'Controller\\Login';

}

//init class
$init = new $_class;
