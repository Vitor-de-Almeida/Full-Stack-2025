<?php

$search = $_GET['search'] ?? null;

if (is_numeric($search)) {
    $books = $db->query(
        query: "select * from books where id = :id", 
        class: Book::class, 
        params: [':id' => (int) $search]
    )->fetchAll();
} else {
    $books = $db->query(
        query: "select * from books where (title LIKE :text or description LIKE :text or author LIKE :text)", 
        class: Book::class, 
        params: [':text' => "%{$search}%"]
    )->fetchAll();
}

view('index', ['books' => $books]);

?>
