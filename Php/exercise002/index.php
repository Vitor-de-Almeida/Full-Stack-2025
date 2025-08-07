<?php

$uri = $_SERVER['PATH_INFO'] ?? '/'; // se não existir, define como "/"
$uri = trim($uri, '/');              // remove barras só do início/fim

$controller = $uri ?: 'index';       // se vazio, cai para 'index'

var_dump($controller);

require "controllers/{$controller}.controller.php";

?>

