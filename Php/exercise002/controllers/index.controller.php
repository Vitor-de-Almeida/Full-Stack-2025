<?php

$pesquisar = $_GET['pesquisar'] ?? null;

if(is_numeric($pesquisar)) {
    $livros = $db->query(
        query: "select * from livros where id = :id", 
        class: Livro::class, 
        params: [':id' => (int) $pesquisar]
    )->fetchAll();
    
} else {
    $livros = $db->query(
        query: "select * from livros where (titulo LIKE :texto or descricao LIKE :texto or autor LIKE :texto)", 
        class: Livro::class, 
        params: [':texto' => "%{$pesquisar}%"]
    )->fetchAll();
}

view('index', ['livros' => $livros]);

?>
