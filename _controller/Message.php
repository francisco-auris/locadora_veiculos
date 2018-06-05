<?php
namespace Controller;


class Message {

    public static function setMessage( $dados=array() )
    {
        //0 -> type
        //1 -> texto
        //2 -> controller
        $_SESSION[MCONTROLLER] = $dados[2];
        $_SESSION[MTEXTO] = $dados[1];
        $_SESSION[MTYPE] = $dados[0];

    }

    public static function getMessage( $ctrl ){

        if( isset($_SESSION[MCONTROLLER]) ){

            if( $_SESSION[MCONTROLLER] == $ctrl or $_SESSION[MCONTROLLER] == '*' ){

            echo '<div class="alert alert-'.$_SESSION[MTYPE].' text-center">'.$_SESSION[MTEXTO].'</div>';

            unset( $_SESSION[MCONTROLLER] );
            unset( $_SESSION[MTEXTO] );
            unset( $_SESSION[MTYPE] );

            }

        }

    }
    
}