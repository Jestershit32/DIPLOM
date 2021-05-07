<?php
session_start();
require ("connect.php");
$login=filter_var(trim($_POST['login']));
$password=filter_var(trim($_POST['password']));
$name=$_POST['name'];
if($_FILES['avatar']['name']!=""){
$avatar = 'avatars/'.date("d.m.y - H.i.s").'-'.basename($_FILES['avatar']['name']);
} else{
    $avatar="";
}
$rule='user';
if ($name != '' && $login != '' && $password != '') {
    if(mb_strlen($name) >25){
        $_SESSION['message'] = 'Имя превышает 25 символов';
        header ('Location: registration.php');
    }
    if(mb_strlen($login) >25){
        $_SESSION['message'] = 'Логин превышает 25 символов';
        header ('Location: registration.php');
    }
    $check_admin = mysqli_query($mysql, "SELECT * FROM `admins`");
    while ($users = mysqli_fetch_assoc($check_admin)) {
        if ($users['login'] === $login) {
            $_SESSION['message'] = 'Данная учетная запись уже зарегистрировна!';
            header ('Location: registration.php');
            die();
        }
    }

    


    move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
    
    $mysql -> query("INSERT INTO `admins` (`name`, `login`, `pass`, `avatar`,`rule`) VALUES ('$name', '$login', '$password', '$avatar','$rule')");
    

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header ('Location: registration.php');
} else {
    $_SESSION['message'] = 'Заполните все поля!';
    header ('Location: registration.php');
}
?>