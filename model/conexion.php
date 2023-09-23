<?php


$usuario = 'postgres';
$password = 'bogota29';
$dbname = "technokey";

try{
    $bd = new PDO(
        'pgsql:host=localhost;
        dbname='.$dbname,$usuario,$password
    );

}catch(Exception $e){
    echo "error de conexion".$e->getMessage();
}