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
    <title>Главная</title>
</head>
<body>
    <div class="wrapper">
    <?php 
    $idProfile=$_GET['idProfile'];
        require 'blocks/header.php';
        require ("connect.php");
        $resultProfile= $mysql -> query(" SELECT * FROM `admins`
            WHERE `id` = '$idProfile'
    ");
    $profile=$resultProfile->fetch_assoc();
    ?>
        <div class="block-window-warning">
            <div class="window-warning">
                <h1 class="form-label-h1">Внимание</h1>
                <p class="warning-inscription">Вы действительно хотите удалить пользователя с именем <br> "<?php echo $profile['name'] ?>"</p>
                <div class="button-warning-menu">
                    <a href="check-delete-profile.php?idProfile=<?php echo $idProfile ?>"><button class="post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/trash.svg" alt="">Да</button></a>
                    <button onclick="history.go(-2); return false;" class="post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/update.svg" alt="">Вернуться</button>
                </div>
            </div>
        </div>
    </div>