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
    <?php 
        require 'blocks/header.php';
        $postID=$_POST['post-ID'];
        require ("connect.php");
        $post_ID= $mysql -> query(" SELECT * FROM `manuals`
        WHERE `id` = '$postID'
        ");
        while($post_ID_items=$post_ID->fetch_assoc()){
    ?>
    <div class="block-update">
        <div class="window-update">
            <h1 for="" class="form-label-h1">Изменение Методички</h1>
            <form action="check-db-update.php" enctype="multipart/form-data" method="POST" class="form-grid">

                <div class="form-grid-field field-1">
                    <h4 class="field-name">Автор</h4>
                    <input class="field-text" name="aut_name" value="<?php echo $post_ID_items['autor']?>" type="text" placeholder="Введите имя автора">
                </div>
                <div class="form-grid-field field-2">
                    <h4 class="field-name">Год создания</h4>
                    <input class="field-text" name="year_create" value="<?php echo $post_ID_items['age']?>" type="date" placeholder="Год создания методички">
                </div>
                <div class="form-grid-field field-3">
                    <h4 class="field-name">Название</h4>
                    <input class="field-text" name="doc_name" value="<?php echo $post_ID_items['name']?>" type="text" placeholder="Название методички">
                </div>
                <div class="form-grid-field field-4">
                    <h4 class="field-name">Номер группы</h4>
                    <input class="field-text" name="group_num" value="<?php echo $post_ID_items['number_gr']?>" type="text" placeholder="Номер группы">
                </div>
                <div class="form-grid-field field-5">
                    <h4 class="field-name">Номер методической документации</h4>
                    <input class="field-text" name="doc_num" value="<?php echo $post_ID_items['number_doc']?>" type="text" placeholder="Введите номер методички">
                </div>
                <div class="form-grid-area field-6">
                    <h4 class="field-name">Описание</h4>
                    <textarea name="description" id="" cols="30" rows="10" class="field-text-area" placeholder="Введите описание для методички"><?php echo $post_ID_items['description']?></textarea>
                    
                </div>
                <div class="my-button field-7">
                    <h4 class="field-7-string">Вставьте фаил (Обязательно)</h4>
                    <input class="field-file" name="file" type="file" >
                    <input style="display:none;" name="autor_public" value="<?php echo $post_ID_items['autor_public']?>" type="text" >
                </div>
                <button type="reset" class="my-button" >Сброс</button>
                <button type="submit" class="my-button">Изменить</button>
                <input type="text" style="display:none" name="post-ID" value="<?php echo $post_ID_items['id']?>">
            </form>
        </div>
    </div>
    <?php
        }
    require "blocks/footer.php";
    $mysql -> close();
    ?>
    </div>
    </html>