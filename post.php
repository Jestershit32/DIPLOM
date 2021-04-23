<?PHP 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная - вход </title>
</head>
<body>
    <div class="wrapper">
    <?php
        require 'blocks/header.php';
        $post=$_GET['id'];
        require ("connect.php");
        $result_post= $mysql -> query(" SELECT * FROM `manuals`
        WHERE `id` = '$post'
        ");

        while($post_manual=$result_post->fetch_assoc()){
    ?>
    <div class="post-block">
        <div class="post">
            <div class="post-content">
                <h6 class="post-content-h6">Название</h6>
                <h2 class="post-content-h2"><?php echo $post_manual['name'] ?></h2>
                <h6 class="post-content-h2-age"><?php for($i=0;$i<=3;$i++){
                    echo $post_manual['age'][$i];
                }; 
                    echo "-год"?></h6>
                <h6 class="post-content-h6">Автор</h6>
                <div class="autor-content">
                    <h4 class="post-content-h4"><?php echo $post_manual['autor'] ?></h4>
                </div>
                <h6 class="post-content-h6">Номер группы</h6>
                <div class="autor-content">
                    <h4 class="post-content-h4"><?php echo $post_manual['number_gr'] ?></h4>
                </div>
                <h6 class="post-content-h6">Номер методической документации</h6>
                <div class="autor-content">
                    <h4 class="post-content-h4"><?php echo $post_manual['number_doc'] ?></h4>
                </div> 
                <h6 class="post-content-h6 description-post-name">Описание</h6>
                <p class="post-content-text"><?php echo $post_manual['description'] ?></p>
                <div class="content-redactor">
                    <h6 class="post-content-h6">Опубликованно:</h6>
                    <h6 class="post-content-h6"><?php echo $post_manual['autor_public'] ?></h6>
                </div>
            </div>
            <div class="post-button-menu">
                <?PHP
                    if($_SESSION["user"]["rule"]=="admin"){
                ?>
                <form action="update-form.php" method="post">
                    <input type="text" style="display:none" name="post-ID" value="<?php echo $post_manual['id']?>">
                    <button type="submit" class="post-button-menu-items"><img class="icon-post-menu-button" src="img/svg/update.svg" alt="">Изменить</button>
                </form>
                <?PHP
                    };
                ?>
                <!-- <form action="view.php" method="post">
                <input type="text" style="display:none" name="post-ID" value="<?php echo $post_manual['id']?>">
                <button class="post-button-menu-items"><img class="icon-post-menu-button" src="img/svg/eye.svg" alt="">Просмотреть</button>
                </form> -->
                
                <input type="text" style="display:none" name="post-ID" value="<?php echo $post_manual['id']?>">
                
                <button onclick="location.href='<?php echo$post_manual['file'] ?>';" class="post-button-menu-items"><img class="icon-post-menu-button" src="img/svg/download.svg" alt="">Скачать</button>
                <?PHP
                    if($_SESSION["user"]["rule"]=="admin"){
                ?>
                <form action="check-delete.php" method="post">
                <input type="text" style="display:none" name="post-ID" value="<?php echo $post_manual['id']?>">
                <button class="post-button-menu-items delete-button-post"><img class="icon-post-menu-button" src="img/svg/trash.svg" alt="">Удалить</button>
                </form>
                <?PHP
                    };
                ?>
            </div>
        </div>
    </div>

    <?php
        }
    require "blocks/footer.php";
    $mysql -> close();
    ?>
    
    </div>
    </html>