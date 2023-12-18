<?php
session_start();
require 'funcs.php';
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if(null !== $login || null !== $password) {
    if(checkPassword($login, $password)){
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['logtime'] = time();
        header('location: index.php');
    } else{
        $error = 'Неверный логин или пароль';
    }
}

$auth = $_SESSION['auth'];
?>




<?php
if(!$auth){ ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formStyle.css">
    <title>Document</title>
</head>
    <body>
        <div class="form-holder">
            <h2>Вход</h2>
            <?php if(isset($error)){ ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
        
            <form method="post" action="login.php">
                <div class="user-box">
                    <input type="text" name="login" id="login" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" required>
                    <label>Password</label>
                </div>
                <input type="submit" value="Войти">
            </form>
            <div>Нет аккаунта? <a href="registration.php">Зарегистрироваться</a>
        </div>
        <!-- <form action="login.php" method="POST">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Войти">
        </form>
        <p>Ещё нет аккаунта? <a href="/registration.php">Регистрация</a></p> -->
    </body>
</html>
<?php } ?>