<?php

$livro = (new DB)->livro((int) $_GET['id']);

if (!$livro) {
    abort(404);
}

view('livro', ['livro' => $livro]);

?>
