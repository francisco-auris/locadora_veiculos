<?php
namespace Controller;

use \PDO as PDO;

class Connect {

    protected function connLocal()
    {
        
        try {

            $conn = new PDO('mysql:host='.DBHOST.';dbname='.DB, DBUSER, DBPSWD );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } 
        catch(PDOException $e) {

            Controller\Message::setMessage( ['danger', 'Error:' . $e->getMessage(), '*'] );

        }

    }

}