<?PHP 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="/img/site-ico.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная - вход </title>
</head>
<?PHP
    require 'blocks/header.php';
    require 'connect.php';
    $postID=$_POST['post-ID'];
    $result_post= $mysql -> query(" SELECT * FROM `manuals`
        WHERE `id` = '$postID'
        ");
        $post_file=$result_post->fetch_assoc();
        
?>
<?PHP echo $post_file['file'] ?>
<iframe src="http://docs.google.com/gview?url=http://cursach/db/24.03.21%-%11.42.141.docx&embedded=true">
</iframe>

<!-- <iframe width="1440" height="800" src="https://docs.google.com/gview?url=D:\programm\open%server\openserver\domains\cursach\24.03.21%-%11.42.141.docx&embedded=true"></iframe> -->
</iframe>
<?PHP 
require 'blocks/footer.php';
?>