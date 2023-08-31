<?php
session_start();
require_once('../connection/connect.php');
if (isset($_POST['login'])) {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $query = "SELECT id, first_name, last_name, email, pwd, is_admin FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['pwd'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];

        header("Location: ../dashboard.php"); 
        exit();
    } 
}
}




