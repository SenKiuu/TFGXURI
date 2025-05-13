<?php

session_start();

$error = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuri Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>"  id="login-form">
            <form action="login_register.php" method="post" name="login">
                <h2>Login</h2>
                <?= showError($error['login']); ?>
                <input type="hidden" name = "request" value="login">
                <input type="email" name="email" placeholder="* Insertar Email"  required>
                <input type="password" name="password" placeholder=" * Insertar Password" required>
                <button type="submit" name="login">login</button>
                <p>¿No tienes cuenta todavía? <a href="#" onclick="mostrarFormulario('register-form')"><br>Registrarse</a></p>
                <p style="font-size: 12px; color: gray;">campos con " * " son obligatorios</p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="login_register.php" method="post" name="register">
                <h2>Registrarse</h2>
                <?= showError($error['register']); ?>
                <input type="hidden" name = "request" value="register">
                <input type="text" name="name" placeholder="* Insertar Nombre" required>
                <input type="email" name="email" placeholder="* Insertar Email" required>
                <input type="password" name="password" placeholder="* Insertar Password" required>
                <select name="role" required>
                    <option value="">* Seleccionar rol</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Registrarse</button>
                <p>¿Ya tenías cuenta? <a href="#" onclick="mostrarFormulario('login-form')"><br>Login</a></p>
                <p style="font-size: 12px; color: gray;">campos con " * " son obligatorios</p>
            </form>
        </div>
    </div>
    
</body>

</html>