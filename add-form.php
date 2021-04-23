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
    <?php require "blocks/header.php"?>
    
    <div class="block-update">
        <div class="window-update">
            <h1 for="" class="form-label-h1">Добавление Методички</h1>
            <form action="check-bd-add.php" method="post" enctype="multipart/form-data" class="form-grid">

                <div class="form-grid-field field-1">
                    <h4 class="field-name">Автор</h4>
                    <button class="butten-reset">
                        <img src="img/svg/close.svg" alt="" class="reset-svg">
                    </button>
                    <input class="field-text" name="aut_name" type="text" placeholder="Введите имя автора">
                </div>
                <div class="form-grid-field field-2">
                    <h4 class="field-name">Год создания</h4>
                    <button class="butten-reset">
                        <img src="img/svg/close.svg" alt="" class="reset-svg">
                    </button>
                    <input class="field-text" name="year_create" type="date" placeholder="Год создания методички">
                </div>
                <div class="form-grid-field field-3">
                    <h4 class="field-name">Название</h4>
                    <button class="butten-reset">
                        <img src="img/svg/close.svg" alt="" class="reset-svg">
                    </button>
                    <input class="field-text" name="doc_name" type="text" placeholder="Название методички">
                </div>
                <div class="form-grid-field field-4">
                    <h4 class="field-name">Номер группы</h4>
                    <button class="butten-reset">
                        <img src="img/svg/close.svg" alt="" class="reset-svg">
                    </button>
                    <input class="field-text" name="group_num" type="text" placeholder="Номер группы">
                </div>
                <div class="form-grid-field field-5">
                    <h4 class="field-name">Номер методической документации</h4>
                    <button class="butten-reset">
                        <img src="img/svg/close.svg" alt="" class="reset-svg">
                    </button>
                    <input class="field-text" name="doc_num" type="text" placeholder="Введите номер методички">
                </div>
                <div class="form-grid-area field-6">
                    <h4 class="field-name">Описание</h4>
                    <button class="butten-reset">
                        <img src="img/svg/close.svg" alt="" class="reset-svg">
                    </button>
                    <textarea  name="description" id="" cols="30" rows="10" class="field-text-area" placeholder="Введите описание для методички"></textarea>
                    
                </div>
                <div class="my-button field-7">
                    <h4 class="field-7-string">Вставьте фаил</h4>
                    <input class="field-file" name="file" type="file" >
                </div>
                <button type="reset" class="my-button" >Сброс</button>
                <button type="submit" class="my-button">Добавить</button>
            </form>
        </div>
    </div>


    <?php require "blocks/footer.php"?>
    </div>
    </html>