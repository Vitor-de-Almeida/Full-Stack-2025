<?php

$message = $_GET['message'] ?? null;

// 1. Receive the form with email and password
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
//2. Check the database for the email and password
$user = $db->query(
    query:"select * from users where email = :email and password = :password",
    params: [
        ':email'=>$email,
        ':password'=>$password
        ]
    )->fetch();
//3. If the user is found, add that the users is authenticated
if($user) {
    $_SESSION['authenticated'] = $user;
    $_SESSION['message'] = 'Welcome ' . $user['name'] . '!';
    header('location: /');
    exit();
} else {
    header('location: /');
    exit();
}
}
//4. Change the info in the navigation bar to show the user name

view('login', ['message' => $message]);

?>