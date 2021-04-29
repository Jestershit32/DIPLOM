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
    
    $aut_name=filter_var(trim($_POST['aut_name']),FILTER_SANITIZE_STRING);
    $year_create=$_POST['year_create'];
    $doc_name = filter_var(trim($_POST['doc_name']),FILTER_SANITIZE_STRING);
    $group_num=filter_var(trim($_POST['group_num']),FILTER_SANITIZE_STRING);
    $doc_num=filter_var(trim($_POST['doc_num']),FILTER_SANITIZE_STRING);
    $description=preg_split('/\\r\\n?|\\n/',$_POST['description']);
    $uploaddir='db/';
    $_FILES['file']['name']= date("d.m.y-H.i.s") . $_FILES['file']['name'];
    $_FILES = str_replace(" ", '', $_FILES);
    $uploadfile =  $uploaddir . basename($_FILES['file']['name']);

    // это временная переменная
    $autor_public=$_SESSION["user"]["id"];
    $warning=["Внимание","Вы добавили запись под названием ",false];
    if(mb_strlen($aut_name) <5 || mb_strlen($aut_name)>90){
        $warning=["Возникла ошибка","Недопустимая длина Имени автора ",true];
    } elseif(mb_strlen($year_create) <10 || mb_strlen($year_create)>10){
        $warning=["Возникла ошибка","Недопустимая длина Даты создания ",true];
    } elseif(mb_strlen($doc_name) <7 || mb_strlen($year_create)>150){
        $warning=["Возникла ошибка","Недопустимая длина Названия методички ",true];
    } elseif(mb_strlen($group_num) <3 || mb_strlen($group_num)>30){
        $warning=["Возникла ошибка","Недопустимая длина Номера группы ",true];
    } elseif(mb_strlen($doc_num) <3 || mb_strlen($doc_num)>30){
        $warning=["Возникла ошибка","Недопустимая длина Номера документации ",true];
    } 
    elseif(mb_strlen($description[0]) <3 || mb_strlen($description[0])>400){
        $warning=["Возникла ошибка","Недопустимая длина Описания",true];
    }
    elseif (mb_strlen($_FILES['file']['tmp_name']) <1){
        $warning=["Возникла ошибка","Отсутствует файл для добавления методички ",true];
    }
    elseif (mb_strlen($_FILES['file']['size']) >(40 * 1024)){
        $warning=["Возникла ошибка","Слишком большей файл  ",true];
    }

    require ("connect.php");
    if($warning[2]!=true){
    $mysql -> query(" INSERT INTO `manuals` (`autor`, `age`, `name`, `number_gr`, `description`, `file`, `number_doc`, `autor_public`) 
    VALUES('$aut_name', '$year_create', '$doc_name', '$group_num', '$description[0]', '$uploadfile', '$doc_num', '$autor_public') ");

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            // echo "Файл корректен и был успешно загружен.\n"; // позже допишу отображения окнами.
        } else {
            // echo "Возможная атака с помощью файловой загрузки!\n";
        }
    }
?>
    <div class="block-window-warning">
        <div class="window-warning">
            <h1 class="form-label-h1"><?PHP
            echo $warning[0];
                ?> 
            </h1>
            <p class="warning-inscription">
            <?PHP
            if($warning[2]){
            $doc_name=" И ЭТО ПЕЧАЛЬНО ";
            };


            echo $warning[1] .'" ' . $doc_name . ' "';
                ?>
            </p>
            <div class="button-warning-menu">
                    <button style="<?PHP if($warning[2]){
                        echo "display:none;";}; ?>" onclick="location.href='index.php';" class="post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/trash.svg" alt="">Ок</button>
                
                <button onclick="history.go(-1); return false;" class="post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/update.svg" alt="">Вернуться</button>
            </div>
        </div>
    </div>
    <?PHP 
        require 'blocks/footer.php';
        $mysql -> close();
    ?>
    </html>