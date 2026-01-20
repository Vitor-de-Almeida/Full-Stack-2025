<?php

require __DIR__ . '/../Validation.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location:/');
    exit();
}

if(!auth()) {
    header('location: /login');
    exit();
}

$validation = Validation::validate([
    'comment' => ['required'],
    'rating' => ['required'],
], $_POST);

if($validation->hasErrors('avaliation')) {
    header('location: /book?id=' . $_POST['book_id']);
    exit();
}

$db->query(
    query: "insert into comments (user_id, book_id, comment, rating) values (:user_id, :book_id, :comment, :rating)",
    params:[
        ':user_id' => auth()->id,
        ':book_id' => $_POST['book_id'],
        ':comment' => $_POST['comment'],
        ':rating' => $_POST['rating'],
    ]
);

flash()->push('message', "Comment registered successfully");
header('location: /book?id=' . $_POST['book_id']);
exit();

?>
