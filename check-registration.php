<?php
session_start();
require ("connect.php");
$login=filter_var(trim($_POST['login']));
$password=filter_var(trim($_POST['password']));
$name=$_POST['name'];
$avatar = 'avatars/'.date("d.m.y - H.i.s").'-'.basename($_FILES['avatar']['name']);
$rule='user';
// print_r($login);
// echo("<br>");
// print_r($password);
// echo("<br>");
// print_r($name);
// echo("<br>");
// print_r($avatar);
// echo("<br>");
if ($name != '' && $login != '' && $password != '' && $_FILES != '') {

    $check_admin = mysqli_query($mysql, "SELECT * FROM `admins`");
    while ($users = mysqli_fetch_assoc($check_admin)) {
        if ($users['login'] === $login) {
            $_SESSION['message'] = 'Данная учетная запись уже зарегистрировна!';
            header ('Location: registration.php');
            die();
        }
    }

    


    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar)) {
        $_SESSION['message'] = 'Ошибка при загрузке файла';
        header ('Location: registration.php');
        die();
    }

    $mysql -> query("INSERT INTO `admins` (`name`, `login`, `pass`, `avatar`,`rule`) VALUES ('$name', '$login', '$password', '$avatar','$rule')");
    

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header ('Location: registration.php');
} else {
    $_SESSION['message'] = 'Заполните все поля!';
    header ('Location: registration.php');
}


?>