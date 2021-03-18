
<?php 
    $aut_name=filter_var(trim($_POST['aut_name']),FILTER_SANITIZE_STRING);
    $year_create=$_POST['year_create'];
    $doc_name = filter_var(trim($_POST['doc_name']),FILTER_SANITIZE_STRING);
    $group_num=filter_var(trim($_POST['group_num']),FILTER_SANITIZE_STRING);
    $doc_num=filter_var(trim($_POST['doc_num']),FILTER_SANITIZE_STRING);
    $description=preg_split('/\\r\\n?|\\n/',$_POST['description']);
    $file=$_POST['file'];
    // это временная переменная
    $autor_public="Вася Иванов";
    print_r($description[0]);

    if(mb_strlen($aut_name) <5 || mb_strlen($aut_name)>90){
        echo "Недопустимая длина Имени автора";
        exit();
    } else if(mb_strlen($year_create) <10 || mb_strlen($year_create)>10){
        echo "Недопустимая длина Даты создания";
        exit();
    } else if(mb_strlen($doc_name) <7 || mb_strlen($year_create)>150){
        echo "Недопустимая длина Названия методички";
        exit();
    } else if(mb_strlen($group_num) <3 || mb_strlen($group_num)>30){
        echo "Недопустимая длина Номера группы";
        exit();
    } else if(mb_strlen($doc_num) <3 || mb_strlen($doc_num)>30){
        echo "Недопустимая длина Номера документа";
        exit();
    } 
    else if(mb_strlen($description[0]) <3 || mb_strlen($description[0])>400){
        echo "Недопустимая длина Описания";
        exit();
    }



    require ("connect.php"); 
    $mysql -> query(" INSERT INTO `manuals` (`autor`, `age`, `name`, `number_gr`, `description`, `file`, `number_doc`, `autor_public`) 
    VALUES('$aut_name', '$year_create', '$doc_name', '$group_num', '$description[0]', '$file', '$doc_num', '$autor_public') ");
    $mysql -> close();
?>