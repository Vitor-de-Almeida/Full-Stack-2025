<?php

$pesquisa = $_GET['pesquisar'] ?? null;
$livros = (new DB)->livros($pesquisa);

view('index', compact('livros'));

?>
