<?php

function view($view, $data = []) {
    extract($data);
    require "../views/template/app.php";
}

?>