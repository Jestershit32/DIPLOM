<?PHP
if($_SESSION["user"]["rule"]!="admin"){
    header("Location: index.php");
}
?>