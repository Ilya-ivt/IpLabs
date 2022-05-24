<?php include_once "../templace/header.php";
include_once "../class/db.class.php";
DB::getInstance();
session_start();

?>



    <section id="main" >
    <div class="container position">
        <div class="works-txtbox">
            <div class="works-txt-1"><h1>Список пользователей</h1></div>
            <div class="works-txt-2">
<table class = list>
    <tr>
        <td>id</td>
        <td>Логин</td>
        <td>ФИО</td>
        <td>Тип пользователя</td>
        <td>Изображение</td>
        <td>Файл</td>
        <td></td>
    </tr>





<?php
$query = "SELECT * FROM `users`";

$res = DB::query($query);

while (($item = DB::fetch_array($res)) != false)
{ ?>
    <tr>
        <td><?=$item['id']?></td>
        <td><?=$item['login']?></td>
        <td><?=$item['fio']?></td>
        <td><?=$item['user_type']?></td>
        <td><img src="..<?=$item['avatar_name']?>" class="avatarimg" alt="Аватарка"></td>
        <td><?=$item['avatar_name']?></td>
        <td>
            <a href="../admin/edituser.php?id=<?=$item['id']?>">
                <img class="icon" scr="../img/edit.png" title="Редактировать">
            </a>
            <a href="../admin/deleteuser.php?id=<?=$item['id']?>">
                <img class="icon" scr="../img/delete.png" title="Удалить">
            </a>
        </td>

    </tr>
    <?php
}
?>
</table>
            </div>
        </div>
    </div>
    </section>
<?php
include_once "../templace/footer.php";
?>