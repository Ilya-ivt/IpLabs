<?php include_once "../templace/header.php";
session_start();
include_once "../class/db.class.php";
DB::getInstance();



    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = htmlspecialchars($_POST['user_login']);
        $pass1 = htmlspecialchars($_POST['user_pass']);
        $pass2 = htmlspecialchars($_POST['user_pass2']);
        $fio = htmlspecialchars($_POST['user_fio']);
        $error = "";

        if (empty($login))
            $error = "Логин не может быть пустым<br>";
        if (empty($pass1))
            $error .= "Пароль не может быть пустым";
        if ($pass1 != $pass2)
            $error .= "Пароли должны совпадать";

        if (empty($error)) {

            $query =   "INSERT INTO `users` (`login`, `fio`, `pass`) VALUES ('$login', '$fio', MD5('".$pass1."'))";

            DB::query($query);
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $login;
            $_SESSION['score'] = 0;
            header('location: /index1.php');
        }


         include_once "../templace/formregistr.php";
    }
include_once "../templace/footer.php";


