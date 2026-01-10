<?php

require __DIR__ . '/../Validation.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

$validation = Validation::validate([
    'email' => ['required', 'email'],
    'password' => ['required'],
], $_POST);

if($validation->hasErrors('login')) {
    header('location: /login');
    exit();
}

$user = $db->query(
    query:"select * from users where email = :email",
    class: User::class,
    params: [
        ':email'=>$email,
        ]
    )->fetch();

if($user) {

    if(!password_verify($_POST['password'], $user->password)) {
        flash()->push('validations_login', ['Email or password not found or incorrect.']);
        header('location: /login');
        exit();
    }

    $_SESSION['authenticated'] = $user;
    flash()->push('message', 'Welcome ' . $user->name . '!');

    header('location: /');
    exit();
} else {
    header('location: /');
    exit();
}
}

view('login');

?>