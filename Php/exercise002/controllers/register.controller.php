<?php

require 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $validation = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'confirmed'],
        //'password' => ['required', 'min:8', 'max:18', 'contains:number', 'contains:special_char', 'strong'],
    ], $_POST);

    if($validation->hasErrors()) {
        $_SESSION['validations'] = $validation->validations;
        header('location: /login');
        exit(); 
    }
    else {
        $db->query(
            query: "insert into users (name, email, password) values (:name, :email, :password)",
            params: [
                ':name' => $_POST['name'], 
                ':email' => $_POST['email'], 
                ':password' => $_POST['password']
            ]
        );
    header('location: /login?message=User created successfully');
    exit();
    }
    
}

?>