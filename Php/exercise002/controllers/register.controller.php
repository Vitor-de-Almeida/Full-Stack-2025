<?php

require 'validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $validation = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:users'],
        'password' => ['required', 'min:8', 'max:18', 'strong'],
    ], $_POST);

    if($validation->hasErrors('register')) {
        header('location: /login');
        exit(); 
    }

        $db->query(
            query: "insert into users (name, email, password) values (:name, :email, :password)",
            params: [
                ':name' => $_POST['name'], 
                ':email' => $_POST['email'], 
                ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]
        );
    flash()->push('message', 'User created sucessfully');
    header('location: /login');
    exit();
    
}

header('location: /login');
exit();

?>