<?php

if(!auth()) {
    header('location: /login');
    exit();
}

$books = $db->query(
    query: "select * from books where user_id = :user_id",
    class: Book::class,
    params: [':user_id' => auth()->id]
)->fetchAll();



view('my-books', ['books' => $books]);
?>