<?PHP 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="/img/site-ico.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Изменение данных профиля</title>
</head>
<body>
<?php
$idProfile=$_GET['idProfile'];
    require ("connect.php");
    require "blocks/header.php";
    
    $resultProfile= $mysql -> query(" SELECT * FROM `admins`
            WHERE `id`='$idProfile' 
    ");
    $profile=$resultProfile->fetch_assoc();

?>
<div class="login-content">
        <form action="/check-update-profile.php" method="POST" enctype="multipart/form-data" class="login-form" >
            <label for="" class="login-h1">Изменение данных профиля</label>
            <div class="input-login">
                <img src="img/svg/Search.svg" class="input-icon " alt="иконочка">
                <label for="" class="input-label login">Имя</label>
                <input type="text" name="name" id="form-login" value="<?PHP echo $profile['name'] ?>" class="input-text">
            </div>
            <div class="my-button">
                    <h4 class="registr-file-string">Загрузите фотографию</h4>
                    <input class="button-file-registration " name="avatar" type="file" >
                    <input style="display:none;" name="avatar_url" value="<?PHP echo $profile['avatar'] ?>" type="text" >
                    <input style="display:none;" name="idProfile" value="<?PHP echo $idProfile; ?>" type="text" >
                </div>
            <button class="my-button" type="submit">Изменить</button>
            
        </form>
        
        </div>
        
<?PHP
require 'blocks/footer.php';
?>
</body>
</html>