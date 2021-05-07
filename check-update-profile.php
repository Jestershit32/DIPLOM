<?php
session_start();
require ("connect.php");
$idProfile=$_POST["idProfile"];
$name=$_POST['name'];

if($idProfile==$_SESSION['user']['id']||$_SESSION['user']['rule']=="superadmin"){
if($_FILES['avatar']['name']!=""){
    $avatar = 'avatars/'.date("d.m.y - H.i.s").'-'.basename($_FILES['avatar']['name']);
    } else{
        $avatar=$_POST['avatar_url'];
    }
if ($name != '') {
    if(mb_strlen($name) >25){
        $_SESSION['message'] = 'Имя превышает 25 символов';
        header ('Location: update-profile-form.php?idProfile='.$idProfile);
    }


    move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);

    $mysql -> query("UPDATE `admins` SET `name`='$name', `avatar`='$avatar' WHERE `id`='$idProfile'");
    $_SESSION['user']['name']=$name;
    $_SESSION['user']['avatar']=$avatar;
    header ('Location: profile.php?idProfile='.$idProfile.'&window=1&num_rows=2');
} else {
    $_SESSION['message'] = 'Заполните все поля!';
    header ('Location: update-profile-form.php?idProfile='.$idProfile);
}
}else {
    header("Location: index.php");
}
?>