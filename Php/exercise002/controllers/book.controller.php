<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    abort(404);
}

$book = $db->query(
    query: "select * from books where id = :id", 
    class: Book::class, 
    params: [':id' => (int) $id]
)->fetch();

if (!$book) {
    abort(404);
}

view('book', ['book' => $book]);

?>

