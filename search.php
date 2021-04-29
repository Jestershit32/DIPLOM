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
    <title>Главная</title>
</head>
<body>
    <div class="wrapper">
    <?php require 'blocks/header.php'?>

    <!-- Форма поиска -->
    <div class="block-search">
        <div class="block-form-search">
            <h1 class="form-label-h1">Поиск по критериям</h1>
            <form action="result.php" method="GET" class="form-search">
                <h4 for="" class="form-search-label-h4">Название</h4>
                <input type="text" name="doc_name" class="input-search" placeholder="Название методички">
                <h4  class="form-search-label-h4">Год написания сетодички</h4>
                <input type="date" name="year_create" class="input-search" placeholder="Год написания методички">
                <h4 for="" class="form-search-label-h4">Номер профессии</h4>
                <input type="text" name="group_num" class="input-search"placeholder="Название профессии">
                <h4 for="" class="form-search-label-h4">Основной номер методической документации</h4>
                <input type="text" name="doc_num" class="input-search"placeholder="Основной номер методической документации">
                <h4 for="" class="form-search-label-h4">Автор</h4>
                <input type="text" name="autor" class="input-search"placeholder="Введите имя автора">
                <input type="text" style="display:none;" name="window" value="1">
                <input type="text" style="display:none;" name="num_rows" value="5">
                <button type="submit" class="my-button">Поиск</button>
                <button type="reset" class="my-button" >Сброс</button>
            </form>
        </div>
    </div>
    </html>