<?php

require __DIR__ . '/../Validation.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: /my-books');
    exit();
}

$validation = Validation::validate([
    'title' => ['required', 'min:3'],
    'author' => ['required', 'min:3'],
    'description' => ['required', 'min:10', 'max:600'],
    'release_year' => ['required', 'min:4', 'max:4'],
], $_POST);

if($validation->hasErrors('my-books')) {
    header('location: /my-books');
    exit();
}

$db->query(
    query: "insert into books (title, author, description, release_year, user_id) values (:title, :author, :description, :release_year, :user_id)",
    params: [
        ':title' => $_POST['title'],
        ':author' => $_POST['author'],
        ':description' => $_POST['description'],
        ':release_year' => $_POST['release_year'],
        ':user_id' => auth()->id
    ]
);

flash()->push('message', "Book created successfully");
header('location: /my-books');
exit();

?>