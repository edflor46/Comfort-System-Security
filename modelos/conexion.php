<?php

class Conexion{
    static public function conectar(){
        $con = new PDO('mysql:host=localhost;dbname=comfort_system_security', 'root', '');
        $con->exec('SET NAMES UTF8');

        return $con;
    }
}