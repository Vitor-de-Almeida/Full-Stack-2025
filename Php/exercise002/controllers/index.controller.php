<?php

$livros = (new DB)->livros($_GET['pesquisar'] ?? null);

view('index', compact('livros'));

?>
