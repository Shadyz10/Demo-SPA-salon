<?php
require 'funcs.php';
$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if(null !== $username || null !== $password) {
    $check = checkPassword($username, $password);
    if($check){
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['password'] = $password;
        header('location: index.php');
        exit();

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
    <title>Document</title>
</head>
    <body>
        <h2>Вход</h2>
        <?php if(isset($error)){ ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <form action="login.php" method="POST">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Войти">
        </form>
    </body>
</html>
<?php } ?>