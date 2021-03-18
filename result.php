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
    <div class="search-block">
            <div class="search-content">
                <div class="search-content-nav">
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">1</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">2</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">3</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link nav-item-activ">4</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">5</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">...</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">16</a></button>
                </div>
                <div class="search-content-block">
                    <!--блок новости -->
                    <?php 
                    $doc_name = filter_var(trim($_POST['doc_name']),FILTER_SANITIZE_STRING);
                    $group_num=filter_var(trim($_POST['group_num']),FILTER_SANITIZE_STRING);
                    $doc_num=filter_var(trim($_POST['doc_num']),FILTER_SANITIZE_STRING);
                    $year_create=$_POST['year_create'];
                    $autor=$_POST['autor'];
                
                    require ("connect.php");
                    $result= $mysql -> query(" SELECT * FROM `manuals`
                    WHERE `name` = '$doc_name' 
                    OR `number_gr` = '$group_num' 
                    OR `number_doc` ='$doc_num' 
                    OR  `age` ='$year_create'
                    OR  `autor` ='$autor'
                    ");
                    if($result->num_rows==0){
                        echo  "<h3 class='no-items'>Результатов не найдено</h3>";
                    }
                    
                    while($post = $result->fetch_assoc()) {
                    ?>
                    <div class="search-content-block-item ">
                        <h6 class="post-content-h6">Название</h6>
                        <h2 class="post-content-h2"><?php echo $post["name"]; ?></h2>
                        <h6 class="post-content-h6 age-h4">Год</h6>
                        <h4 class="post-content-h4"><?php echo $post["age"]; ?></h4>
                        <br>
                        <h6 class="post-content-h6">Автор</h6>
                        <div class="autor-content">
                            <h4 class="post-content-h4"><?php echo $post["autor"]; ?></h4>
                        </div>
                        <form action="post.php" method="post">
                            <input type="text" style="display:none" name="post_manual" value="<?php echo $post['id']?>">
                            <button class="search-content-block-item-link-details" type="submit" >
                                Подробнее
                        </button>
                        </form>
                    </div>
                    
                    <?php 
                    };
                    ?>
                </div>
                <div class="search-content-nav">
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">1</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">2</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">3</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link nav-item-activ">4</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">5</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">...</a></button>
                    <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">16</a></button>
                </div>
        </div>
    </div>

    <?php 
    require "blocks/footer.php";
    $mysql -> close();
    ?>
    </div>