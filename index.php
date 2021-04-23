<?PHP 
session_start();
$list=$_GET["window"]*10;
if($list==''){
    header("Location: index.php?window=1&num_rows=2");
}
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
    require ("connect.php");
    require 'blocks/header.php';
    
    $list_UP=$list-10;
    $result= $mysql -> query(" SELECT * FROM `manuals` LIMIT $list_UP, 10");
    $result1=$mysql -> query(" SELECT * FROM `manuals`");
    $num_rows=ceil(($result1->num_rows)/10);
    // print_r($num_rows);
    ?>
    <div class="search-block">
            <div class="search-content">
    <div class="search-content-nav">
            <?php
            for($i=($list/10)-2;$i<=$num_rows;$i++){
                if($i>=1){
                ?>
            <button class="search-content-nav-item"><a href="index.php?window=<?php echo $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
            <!-- <button class="search-content-nav-item"><a href="index.php?window=<?php echo $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link"><?php echo $i ?></a></button> -->
                <?php
                if($i==($list/10)+3||$i==($list/10)+5){
                ?> 
                <button class="search-content-nav-item"><a href="index.php?window=<?php echo $num_rows ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
                
            ?>
                    <!-- <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">1</a></button> -->
                </div>
    <div class="search-content-block">
    
                    <!--блок новости -->
                    <?php 
                    
                    if($result->num_rows==0){
                        echo  "<h3 class='no-items'>Результатов не найдено</h3>";
                    }
                    $item=0;
                    
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
                        <!-- <form action="post.php" method="post">
                            <input type="text" style="display:none" name="post_manual" value="<?php echo $post['id']?>">
                            <button class="search-content-block-item-link-details" type="submit" >
                                Подробнее
                        </button>
                        </form> -->
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
            <button class="search-content-nav-item"><a href="index.php?window=<?php echo $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
            <!-- <button class="search-content-nav-item"><a href="index.php?window=<?php echo $i ."&num_rows=".$num_rows?>" class="search-content-nav-item-link"><?php echo $i ?></a></button> -->
                <?php
                if($i==($list/10)+3||$i==($list/10)+5){
                ?> 
                <button class="search-content-nav-item"><a href="index.php?window=<?php echo $num_rows ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
                
            ?>
                    <!-- <button class="search-content-nav-item"><a href="" class="search-content-nav-item-link">1</a></button> -->
                </div>
                </div>
                </div>
</div>
    
    
</body>
</html> 