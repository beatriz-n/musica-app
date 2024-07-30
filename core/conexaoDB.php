<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "musicapp";

function conexaoDB($servername, $username, $password, $dbname)
{
    header("content-type:text/html; charset=utf-8;");

    $con = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$con) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    if (!mysqli_set_charset($con, "utf8")) {
        die("Erro ao definir o conjunto de caracteres UTF-8: " . mysqli_error($con));
    }

    return $con;
}

global $con;

$con = conexaoDB($servername, $username, $password, $dbname);


