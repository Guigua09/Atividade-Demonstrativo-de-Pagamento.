<?php
$servidor = "127.0.0.1";
$usuario  = "root";
$senha    = "usbw"; // 
$banco    = "Folha_Pagto"; // 
$conecta_db = new mysqli($servidor, $usuario, $senha, $banco);

if ($conecta_db->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conecta_db->connect_error);
}


$conecta_db->set_charset("utf8mb4");
?>

