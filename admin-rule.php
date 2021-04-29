<?PHP
$idProfile=$_GET['idProfile'];
$ruleProfile=$_GET['ruleProfile'];
require ("connect.php");
if($ruleProfile=="user"){
    $ruleProfile="admin";
}else{
    $ruleProfile="user";
}
$updateRule= $mysql -> query(" UPDATE `admins`
SET `rule`='$ruleProfile'
    WHERE `id`='$idProfile'
");
header("Location: admin-list.php?idProfile=1&window=1&num_rows=2&searchProfile=");
?>