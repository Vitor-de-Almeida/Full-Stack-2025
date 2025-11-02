<?php

$id = (int) $_GET['id'];

$livro = (new DB)->livro($id);

view('livro', ['livro' => $livro]);

?>
