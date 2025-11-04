<?php

$id = (int) $_GET['id'];

$livro = (new DB)->livro($id);

if (!$livro) {
    abort(404);
}

view('livro', ['livro' => $livro]);

?>
