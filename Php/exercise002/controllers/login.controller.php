<?php

$message = $_GET['message'] ?? null;

view('login', ['message' => $message]);

?>