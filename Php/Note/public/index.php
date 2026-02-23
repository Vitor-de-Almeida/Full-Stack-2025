<?php

$indexRoute = $_SERVER['REQUEST_URI'] ?? '/';

$routePath = parse_url($indexRoute, PHP_URL_PATH);

if($routePath == '/' || $routePath == '') {
    require '../controllers/index.controller.php';
} else {
    require '../controllers/404.controller.php';
}

?>