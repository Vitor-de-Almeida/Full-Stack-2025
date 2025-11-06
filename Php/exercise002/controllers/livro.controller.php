<?php

$db = new DB();

$livro = $db->query(
    query: "select * from livros where id = :id", 
    class: Livro::class, 
    params: [':id' => (int) $_GET['id']]
    )->fetch();

if (!$livro) {
    abort(404);
}

view('livro', ['livro' => $livro]);

?>
