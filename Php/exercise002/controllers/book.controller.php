<?php


$book = $db->query(
    query: "select * from books where id = :id", 
    class: Book::class, 
    params: [':id' => (int) $_GET['id']]
)->fetch();

$comments = $db -> query(
    query: "select * from comments where book_id = :id",
    class: Comments::class,
    params: [':id' => $_GET['id']]
)->fetchAll();


view('book', ['book' => $book, 'comments' => $comments]);

?>

