<?PHP 
session_start();
if($_GET["idProfile"]==""){
    header("Location: index.php");
}
$list=$_GET["window"]*10;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="/img/site-ico.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Профиль</title>
</head>
<body>
            <?php 
            require ("connect.php");
            require 'blocks/header.php';
            
            $idProfile=$_GET["idProfile"];
            $resultProfile= $mysql -> query(" SELECT * FROM `admins`
            WHERE `id` = '$idProfile'
            
    ");
    $list_UP=$list-10;
    $profile=$resultProfile->fetch_assoc();
    $profileName=$profile["id"];
    $result= $mysql -> query(" SELECT * FROM `manuals` WHERE `autor_public` = '$profileName' LIMIT $list_UP, 10");
    $result1=$mysql -> query(" SELECT * FROM `manuals` WHERE `autor_public` = '$profileName' ");
    $num_rows=ceil(($result1->num_rows)/10);
            ?>
            
            <div class="profile-block content">
                <img src="<?php
                if($profile['avatar']!=""){
                    echo $profile['avatar'];
                }else{
                    echo "avatars\GOST.jpg";
                }
                
                ?>" alt="" class="profile-block-avatar">
                <div class="profile-block-info">
                    <h6 class="post-content-h6 profile-block-text">Имя</h6>
                    <h2 class="post-content-h2 profile-block-text"><?php echo $profile['name'] ?></h2>
                    <h6 class="post-content-h6 profile-block-text">Логин</h6>
                    <h2 class="post-content-h2 profile-block-text"><?php echo $profile['login'] ?></h2>
                    <h6 class="post-content-h6 profile-block-text">Права</h6>
                    <h2 class="post-content-h2 profile-block-text"><?php echo $profile['rule'] ?></h2>
                    <?php if($profile['id']===$_SESSION["user"]["id"]||$_SESSION["user"]["rule"]=="superadmin"){?>
                    <a href="update-profile-form.php?idProfile=<?php echo $profile['id'] ?>" class="button-profile-function-link">
                        <div class="button-profile-function">
                            <img src="img/svg/update.svg" alt="" class="profile-funcktion-icon">
                            Изменение данных
                        </div>
                    </a>
                    <a href="window-delete-profile.php?idProfile=<?php echo $profile['id'] ?>" class="button-profile-function-link">
                        <div class="button-profile-function">
                            <img src="img/svg/trash.svg" alt="" class="profile-funcktion-icon">
                            Удаление профиля
                        </div>
                    </a>
                    <?PHP
                }
                
                ?>
                </div>
            </div>
            <?PHP
            if($result->num_rows!=0){
            ?>
            <div class="search-block">
            <div class="search-content">
    <div class="search-content-nav">
            <?php
            for($i=($list/10)-2;$i<=$num_rows;$i++){
                if($i>=1){
                ?>
            <button class="search-content-nav-item"><a href="profile.php?window=<?php echo $i ."&idProfile=".$idProfile."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
                <?php
                if($i==($list/10)+3||$i==($list/10)+5){
                ?> 
                <button class="search-content-nav-item"><a href="profile.php?window=<?php echo $num_rows ."&idProfile=".$idProfile ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
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
                    }
                    ?>
                </div>
                <div class="search-content-nav">
            <?php
            for($i=($list/10)-2;$i<=$num_rows;$i++){
                if($i>=1){
                ?>
            <button class="search-content-nav-item"><a href="profile.php?window=<?php echo $i ."&idProfile=".$idProfile."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
                <?php
                if($i==($list/10)+3||$i==($list/10)+5){
                ?> 
                <button class="search-content-nav-item"><a href="profile.php?window=<?php echo $num_rows ."&idProfile=".$idProfile ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
                
            ?>
                </div>
                </div>
                </div>
                <?PHP 
                }
                ?>
</div>
</body>
</html>