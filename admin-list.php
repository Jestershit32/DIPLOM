<?php
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
    <title>Список пользователей</title>
</head>
<body>
<?php 
        require ("connect.php");
        require 'blocks/header.php';
            
        $nameProfile=$_GET["nameProfile"];
        $list_UP=$list-10;

        $result= $mysql -> query(" SELECT * FROM `admins` WHERE `name` LIKE '%$nameProfile%' LIMIT $list_UP, 10");
        $result1=$mysql -> query(" SELECT * FROM  `admins` WHERE `name` LIKE '%$nameProfile%' ");
        $num_rows=ceil(($result1->num_rows)/10);
            ?>
    <div class="block-search-profiles content">
                <h1 class="list-search-name">Поиск по имени</h1>
                <form class="profile-search-form" action="admin-list.php" method="get">
                    <input class="profile-search-form-input" name="nameProfile" type="text" placeholder="Имя пользователя">
                    <input style="display: none;" name="window" type="text" value="1" placeholder="Имя пользователя">
                    <input style="display: none;" name="num_rows" type="text" value="2" placeholder="Имя пользователя">
                    <button class="profile-search-form-submite" type="submit"><img src="img/svg/search.svg" alt=""></button>
                </form>
            </div>
            <div class="search-content-nav">
            <?php
            for($i=($list/10)-2;$i<=$num_rows;$i++){
                if($i>=1){
                ?>
            <button class="search-content-nav-item"><a href="admin-list.php?window=<?php echo $i ."&nameProfile=".$nameProfile."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
                <?php
                if($i==($list/10)+3||$i==($list/10)+5){
                ?> 
                <button class="search-content-nav-item"><a href="admin-list.php?window=<?php echo $num_rows ."&nameProfile=".$nameProfile ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
            ?>
                </div>
            <div class="block-search-profiles-list content">
                <?php
                while($profile = $result->fetch_assoc()){
                ?>
                <div class="profile-card">
                <a href="profile.php?idProfile=<?php echo $profile['id']?>&window=1&num_rows=2"><img src="<?PHP
                if($profile['avatar']!=""){
                    echo $profile['avatar'];
                }else{
                    echo "avatars\GOST.jpg";
                }
                ?>
                " alt="" class="profile-card-img"></a>
                    <div class="profile-card-info">
                    <h6 class="post-content-h6 ">Имя</h6>
                    <h2 class="post-content-h2"><?php echo $profile['name'] ?></h2>
                    <h6 class="post-content-h6">Логин</h6>
                    <h2 class="post-content-h2"><?php echo $profile['login'] ?></h2>
                    </div>
                    <?php
                    if($profile['rule']=="admin" && $_SESSION["user"]["rule"]=="superadmin"){
                        ?>
                        <a href="admin-rule.php?idProfile=<?php echo $profile['id'] ."&ruleProfile=".$profile['rule']?>" class="button-giv-admin admin-on">Забрать прова администратора</a>
                        <?php
                    }elseif($profile['rule']=="user" && $_SESSION["user"]["rule"]=="superadmin"){
                        ?>
                        <a href="admin-rule.php?idProfile=<?php echo $profile['id'] ."&ruleProfile=".$profile['rule']?>" class="button-giv-admin admin-on">Дать прова администратора</a>
                        <?php
                    }
                    ?>
                    
                    
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
            <button class="search-content-nav-item"><a href="admin-list.php?window=<?php echo $i ."&nameProfile=".$nameProfile."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($i==$list/10) echo " nav-item-activ" ?>"><?php echo $i ?></a></button>
                <?php
                if($i==($list/10)+3||$i==($list/10)+5){
                ?> 
                <button class="search-content-nav-item"><a href="admin-list.php?window=<?php echo $num_rows ."&nameProfile=".$nameProfile ."&num_rows=".$num_rows?>" class="search-content-nav-item-link <?php if($num_rows==$list/10) echo " nav-item-activ" ?>"><?php echo $num_rows ?></a></button>
                <?php   
                    break;
                }
                }
            }
                
            ?>
                </div>
</body>
</html>