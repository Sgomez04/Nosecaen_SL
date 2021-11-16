<?php

class Conexion{
    
    function getConexion(){
        $servername = "localhost";
        $database = "";
        $username = "root";
        $password = "";
        return new mysqli($servername, $username, $password, $database);
    }
    
    public static function getInstance() {
        return new self();
    }
    
}