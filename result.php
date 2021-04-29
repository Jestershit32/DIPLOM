<?PHP 
session_start();
$list=$_GET["window"]*10;
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
    <?php require 'blocks/header.php';
    $doc_name = filter_var(trim($_GET['doc_name']),FILTER_SANITIZE_STRING);
    $group_num=filter_var(trim($_GET['group_num']),FILTER_SANITIZE_STRING);
    $doc_num=filter_var(trim($_GET['doc_num']),FILTER_SANITIZE_STRING);
    $year_create=$_GET['year_create'];

    $autor=$_GET['autor'];
    require ("connect.php");
    $list_UP=$list-10;
    $result= $mysql -> query(" SELECT * FROM `manuals`
    WHERE `name` LIKE '%$doc_name%' 
    AND `number_gr` LIKE '%$group_num%' 
    AND `number_doc` LIKE'%$doc_num%' 
    AND  `age`  LIKE'%$year_create%'
    AND  `autor` LIKE '%$autor%'
    ORDER BY `name`
    LIMIT $list_UP, 10
    ");
    $result1= $mysql -> query(" SELECT * FROM `manuals`
    WHERE `name` LIKE '%$doc_name%' 
    AND `number_gr` LIKE '%$group_num%' 
    AND `number_doc` LIKE'%$doc_num%' 
    AND  `age` LIKE '%$year_create%'
    AND  `autor` LIKE '%$autor%'
    ORDER BY `name`
    ");
    $num_rows=ceil(($result1->num_rows)/10);

    
    
    ?>
    <div class="search-block">
            <div class="search-content">
            <div class="search-content-nav">
            <?php
            for($i=($list/10)-2;$i<=$num_rows;$i++){
                if($i>=1){
                ?>
            <button class="search-content-nav-item"><a href="result.php<?php echo "?doc_name=".$doc_name."&year_create=".$year_create."&group_num=".$group_num."&doc_num=".$doc_num."&autor=".$autor. "&window=". $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
            <!-- <button class="search-content-nav-item"><a href="index.php?window=<?php echo $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link"><?php echo $i ?></a></button> -->
                <?php
                if($i==($list/10)+3){
                ?> 
                <button class="search-content-nav-item"><a href="result.php<?php echo "?doc_name=".$doc_name."&year_create=".$year_create."&group_num=".$group_num."&doc_num=".$doc_num."&autor=".$autor. "?window=". $num_rows ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
                
            ?>
                </div>
                <div class="search-content-block">
                    <!--блок новости -->
                    <?php
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
                        <a class="search-content-block-item-link-details" href="post.php?id=<?php echo $post['id']?>">Подробнее</a>
                    </div>
                    
                    <?php 
                    };
                    ?>
                </div>
                <div class="search-content-nav">
            <?php
            for($i=($list/10)-2;$i<=$num_rows;$i++){
                if($i>=1){
                ?>
            <button class="search-content-nav-item"><a href="result.php<?php echo "?doc_name=".$doc_name."&year_create=".$year_create."&group_num=".$group_num."&doc_num=".$doc_num."&autor=".$autor. "&window=". $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
            <!-- <button class="search-content-nav-item"><a href="index.php?window=<?php echo $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link"><?php echo $i ?></a></button> -->
                <?php
                if($i==($list/10)+3){
                ?> 
                <button class="search-content-nav-item"><a href="result.php<?php echo "?doc_name=".$doc_name."&year_create=".$year_create."&group_num=".$group_num."&doc_num=".$doc_num."&autor=".$autor. "?window=". $num_rows ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
                
            ?>
                </div>
        </div>
    </div>

    <?php 
    require "blocks/footer.php";
    $mysql -> close();
    ?>
    </div>
    </html>