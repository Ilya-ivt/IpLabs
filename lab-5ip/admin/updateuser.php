<?php
include_once $_SERVER['DOCUMENT_ROOT']."../class/db.class.php";
DB::getInstance();

$strQueryPass = "";
if(isset($_POST['user_pass2']) && !empty($_POST['user_pass2']))
    $strQueryPass = ", `pass` = MD5(".$_POST['user_pass2'].")";

$strQueryAvatar = "";
if(isset($_FILES['user_avatar']))
{
    $uploadTypeFile = "";
    if($_FILES['user_avatar']['type'] = 'image/jpeg')
        $uploadTypeFile=".jpg";

    $uploadNameFile = md5(time().$_FILES['user_avatar']['name']);
    $uploadNameDirection = $_SERVER['DOCUMENT_ROOT']."/upload/avatars/";

    $uploadAvatar = $uploadNameDirection.$uploadNameFile.$uploadTypeFile;
    if (move_uploaded_file($_FILES['user_avatar']['tmp_name'],
        $uploadAvatar
    )) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    $strQueryAvatar = ", `avatar_name` = '"."/upload/avatars/".$uploadNameFile.$uploadTypeFile."'";
}

$query = "UPDATE `users`
          SET `login`= '".$_POST['user_name']."',
              `fio` = '".$_POST['user_fio']."'"
    .$strQueryPass.$strQueryAvatar."        
          WHERE id=".$_POST['id'];
$res = DB::query($query);

header('location: /index1.php');
