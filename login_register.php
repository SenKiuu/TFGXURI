<?php

session_start();
require_once 'config.php';
$request = $_POST['request'];

if(($_POST['request']) == 'register'){
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM usuarios WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = ' Este correo ya existe ';
        $_SESSION['active_from'] = ' register ';
    } else {
        $conn->query("INSERT INTO usuarios (nombre, email, password, role) VALUES ('$nombre', '$email', '$password', '$role')");
    }

    header("Location: login.php");
    exit();
}

if(($_POST['request']) == 'login'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");
            }
            exit();
        }
    }
    $_SESSION['login_error'] = 'Email incorrecto';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}
?>
