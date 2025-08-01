<?php

require 'dados.php';

$view = 'index';

$uri =($_SERVER['REQUEST_URI']);

$view = str_replace('/', '', $uri );



require "views/template/app.php";

?>

