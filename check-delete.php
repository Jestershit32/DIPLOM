<?PHP
session_start();
require 'blocks/protection.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная</title>
</head>
<body>
    <div class="wrapper">
<?PHP 
// require 'blocks/header.php';
require ("connect.php");
$update_ID=trim($_POST['post-ID']);

?>
<div class="block-window-warning">
        <div class="window-warning">
            <h1 class="form-label-h1">
            Внимание
            </h1>
            <p class="warning-inscription">
            Вы действительно хотите удалить запись?
            </p>
            <div class="button-warning-menu">
                    <form action="delete.php" method="post">
                    <input type="text" style="display:none" name="post-ID" value="<?php echo $update_ID ?>">
                    <button type="submite" class="delete-button-post post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/trash.svg" alt="">ДА, удалить</button>
                    </form>
                <button onclick="history.go(-2); return false;"  class="post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/update.svg" alt="">Нет вернуться</button>
            </div>
        </div>
    </div>
</div>
<?PHP
require 'blocks/footer.php';
$mysql -> close();
?>
</html>