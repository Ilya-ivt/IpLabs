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
    <script type="text/javascript" src="jquery-3.6.0.js"></script>
    <script type="text/javascript" src="gallery.js"></script>


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
<section id="gallery">

    <div class="container position">
        <div class="g-txt-block">
            <div class="g-txt-1">Мои любимые фото</div>
            <div class="g-txt-2">Здесь собраны мои самые любимые фотографии!</div>
        </div>
        <div class="gallery-block">

            <div class="next">
                <div class="next" onclick="leftChangeImage()"><img src="img/nextl.png"></div>


                <div id ="mainImage">

                </div>



                <div class="next" onclick="rightChangeImage()"><img src="img/nextr.png"></div>
            </div>
        </div>



    </div>

    </div>

    </div>
</section>
<footer>
    <div class="footer container position">
        <div class="footer-txt">
            <div class="left-part">Дата создания: 10.03.2022<br>
                Автор: Галацков И.А.</div>
        </div>
        <div class="right-part">Мой телефон:<br> + 7 888 111 11 11</div>


    </div></footer>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        $("a.link").click(function(){
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top + "px"
            }, {
                duration: 1000,
                easing: "swing"
            });
            return false;
        });
    });
</script>




</body>
</html>
