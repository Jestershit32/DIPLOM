<?php
session_start();

require ("connect.php");
$idProfile=$_GET["idProfile"];
if($idProfile==$_SESSION['user']['id']||$_SESSION['user']['rule']=="superadmin"){

$result_user= $mysql -> query(" SELECT * FROM `admins`
        WHERE `id` = '$idProfile'
        ");
$user=$result_user->fetch_assoc();

if(file_exists($user['avatar'])){
unlink($user['avatar']);
}
$mysql -> query("DELETE FROM `admins` WHERE `id`='$idProfile'");
    if($idProfile==$_SESSION['user']['id']){

        header("Location: unlogin.php");
        
    } else {
        header("Location: index.php");
    }
    } else {
        header("Location: index.php");
    }
?>