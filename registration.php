<?php

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

require "funcs.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login    = $_POST["login"];
    $password = $_POST["password"];
    if (existsUser($login)) {
        $error = "Такой пользователь уже зарегистрирован";
    }
    if(null !== $login || null !== $password){
        addUser($login, $password);
        header("location: login.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Регистрация</h2>
    <?php if (isset($error)) { ?>
        <p>
            <?php echo $error; ?>
        </p>
    <?php } ?>
    <form action="registration.php" method="POST">
        <label for="login">Логин:</label>
        <input type="text" login="login" name="login" required>

        <label for="password">Пароль:</label>
        <input type="password" password="password" name="password" required>

        <input type="submit" value="Зарегистрироваться">
    </form>
    <p>Уже есть аккаунт? <a href="/login.php">Войти</a></p>
</body>

</html>