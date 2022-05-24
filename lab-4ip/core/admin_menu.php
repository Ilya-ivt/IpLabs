<?php

    if (!isset($_SESSION['auth']))
{
    exit;
}

if($_SESSION['type'] == 0) {
?>
<li><a href="../admin/listusers.php">Список пользователей</a></li>

<?php }



//if (($item = DB::fetch_array($res)) != false)

    if($_SESSION['type'] == 1) {?>

    <li> <a href="../admin/edituser.php?id=<?=$_SESSION['id']?>">Редактировать</a></li>
<?php }

?>
