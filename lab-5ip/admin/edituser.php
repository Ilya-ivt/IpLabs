<?php include_once "../templace/header.php";
include_once "../class/db.class.php";
DB::getInstance();
session_start();

?>



<section id="works">
    <div class="container position">
        <div class="works-txtbox">
            <div class="works-txt-1"><h1>Редактирование пользователя</h1></div>

                    <?php
                    $query = "SELECT * FROM `users` WHERE id=".$_GET['id'];

                    $res = DB::query($query);

                    if (($item = DB::fetch_array($res)) != false)
                    { ?>
                        <div class="works-txt-2">
                            <form action="/admin/updateuser.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$item['id']?>">
                                <table>
                                    <tr>
                                        <td>Ваш логин</td>
                                        <td>
                                            <input type="text" name="user_name" value="<?=$item['login']?>" REQUIRED/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ваше ФИО</td>
                                        <td>
                                            <input type="text" name="user_fio" value="<?=$item['fio']?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Пароль</td>
                                        <td>
                                            <input type="password" name="user_pass"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Пароль повторно</td>
                                        <td>
                                            <input type="password" name="user_pass2"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Аватарка пользователя</td>
                                        <td>
                                            <input type="file" name="user_avatar"/>
                                        </td>
                                    </tr>
                                </table>
                                <input type="submit" value="Изменить" />
                            </form>
                        </div>
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
