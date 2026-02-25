<?php

function view($view, $data = []) {
    extract($data);
    require "../views/template/app.php";
}

function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}

?>