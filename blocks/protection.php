<?PHP
if($_SESSION["user"]["rule"]!="admin" && $_SESSION["user"]["rule"]!="superadmin"){
    header("Location: index.php");
}
?>