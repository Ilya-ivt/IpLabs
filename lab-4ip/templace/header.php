<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap" rel="stylesheet">


    <title>Мой сайт</title>
</head>
<body>

<header>
    <div class="container position">
        <div class="menu-box">
            <div class="logo"></div>

            <ul class="menu">
                <li><a href="../index1.php" >Главная</a></li>
                <li><a href="../gallery.php">Галерея</a></li>
                <li><a href="../works1.php">Выполненные работы</a></li>
                <li><a href="../about1.php" >О себе</a></li>
                <li><a href="../contacts1.php">Контакты</a></li>
                <li><a>

                        <?php
                        if(isset($_SESSION['auth'])) {
                            require_once PATH. "/core/admin_menu.php";
                            echo "Пользователь: " . $_SESSION['name'];
                            echo "<li class = ><a href='/exit.php'> Выход</a></li>";
                        }

                        else

                        {?>

                <li><a href="/registr.php">Регистрация</a></li>

                <? } ?>
                </a></li>

            </ul>

            <?php
            if(!isset($_SESSION['auth'])) { ?>
                <div class = "auth">
                    <?=$error?>
                    <form action="/core/auth.php" method="POST">
                        <label for="login">Логин</label>
                        <input name="login">
                        <label for="pas">Пароль</label>
                        <input type="password" name="pas"><br>

                        <input type="submit" value="Войти">

                    </form>
                </div>

            <?php } ?>



        </div>
    </div>
</header>
