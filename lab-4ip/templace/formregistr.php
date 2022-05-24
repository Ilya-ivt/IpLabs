<section id="works">
    <?php if(!isset($error) || (isset($error) && !empty($error))) {   ?>
    <div class="container position">
        <div class="works-txtbox">
            <div class="works-txt-1">Регистрация пользователя</div>
            <div class="works-txt-2">
                <form action="/core/user.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Ваш Логин</td>
                            <td>
                                <input type="text" name="user_login" value="<?=$login?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>ФИО</td>
                            <td>
                                <input type="text" name="user_fio" value="<?=$fio?>"/>
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
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Аватарка пользователя</td>
                            <td>
                                <input type="file" name="user_avatar"/>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Зарегистрироваться" >
                </form>

                <?php } else
                    if(empty($error))
                    {
                        ?>
                        <div class="works-txt-1">
                             Пользователь зарегистрирован
                        </div>

                 <?php } ?>



                <?php
                if (isset($error) && !empty($error))
                {

                    ?>
                    <div>
                        <?=$error?>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>


</section>

