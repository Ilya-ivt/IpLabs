<?php
include_once "../class/db.class.php";
DB::getInstance();
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $login = htmlspecialchars($_POST['login']);
    $pas1 = htmlspecialchars($_POST['pas']);
    $error = "";

    if (empty($login) || empty($pas1))
        $error = "Ошибка авторизации!<br>";

    if(empty($error))
    {
        $query = "SELECT * FROM `users` WHERE `login` = '$login' and `pass` = MD5('$pas1')";

        $res = DB::query($query);

        if (($item = DB::fetch_array($res)) != false)
        {
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $item['fio'];
            $_SESSION['type'] = $item['user_type'];
            $_SESSION['id'] = $item['id'];
        }

        if ($item['login'] != $login)
        {
            $_SESSION['auth'] = false;
            $error = "Ошибка авторизации!<br>";
            include_once "../index1.php";
        }
        else
        {
            header('location: /index1.php');
        }
    }

    include_once "../index1.php";
}

//include_once "../templace/footer.php";