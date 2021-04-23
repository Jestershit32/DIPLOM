<?PHP
require 'connect.php';
$update_ID=trim($_POST['post-ID']);
$result_post= $mysql -> query(" SELECT * FROM `manuals`
        WHERE `id` = '$update_ID'
        ");
$post_manual=$result_post->fetch_assoc();
unlink($post_manual['file']);
$post_ID_1337= $mysql -> query(" DELETE FROM manuals
WHERE id='$update_ID'
");

header("Location: http://cursach/");
?>