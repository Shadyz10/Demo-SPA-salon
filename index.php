<?php
session_start();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPA-salon</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sometype+Mono:ital@1&family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="body"> 
        <nav class="container">
            <nav class="nav-bar">
                <a class="nav-item" href="">Услуги</a> 
                <a class="nav-item" href="">Контакты</a> 
                <a class="nav-item" href="registration.php">Регистрация</a> 
                <a class="nav-item" href="">Выход</a> 
            </nav>
            <p class="brand">Добро пожаловать, <?php echo $_SESSION['user']; ?> в PARADISE
            </p>
        </nav>
    <div class="discount-sales">
        <div>
            <div class="sale">
                <p>Только для Вас дарим скидку 10% на весь ассортимент в течение 24 часов!</p>
                <p>Время до окончания акции:
                    <?php echo "$hours часов, $minutes минут, $seconds секунд"; ?>
                </p>
            </div>
            <div class="birthday">
                <?php if ($daysUntilBirthday !== null) { ?>
                    <p>
                        <?php echo $discountMessage; ?>
                    </p>
                <?php } ?>
                <form method="POST" action="">
                    <label for="birthday">Хотите персональное предложение? Внесите дату своего рождения:</label><br>
                    <br><input type="date" id="birthday" name="birthday" required>
                    <input type="submit" value="Ввести">
                </form>
            </div>
        </div>
    </div>    
    <div class="service">
        <div class="service-container">
            <div class="container-body">
                <div class="services">
                    <h3>Наши услуги</h3>
                </div>
                <div class="description-holder">
                    <span class="description">Потрясающая сауна</span>
                    <span class="description">Расслабляющий массаж</span>
                    <span class="description">Массаж-интенсив</span>
                </div>
                <div class="prise-holder">
                    <span class="prise" type="prise">2000 р</span>
                    <span class="prise" type="prise">1000 р</span>
                    <span class="prise" type="prise">1200 р</span>
                </div>
                <div class="images">
                    <img src="./images/bath.jpg" alt="bath" width= "600px" height = "360px">
                    <img src="./images/spa.jpg" alt="spa" width= "600px" height = "360px">
                    <img src="./images/massage.jpg" alt="massage" width= "600px" height = "360px">
                </div>
            </div>  
        </div>
    </div>
</body>
</html>