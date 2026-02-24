<?php

require '../functions.php';

$controller = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])["path"]);

if (!$controller || $controller == '') {
    view('index');
} else if (!file_exists("../controllers/{$controller}.controller.php")) {
    view('404');
} else {
    require "../controllers/{$controller}.controller.php";
}

?>